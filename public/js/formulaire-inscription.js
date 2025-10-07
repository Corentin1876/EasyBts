// Gestion du formulaire multi-étapes avec sauvegarde
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('inscription-form');
    if (!form) return;

    const btnPrevious = document.getElementById('btn-previous');
    const btnNext = document.getElementById('btn-next');
    const btnSave = document.getElementById('btn-save');
    const btnSubmit = document.getElementById('btn-submit');
    const currentStepEl = document.getElementById('current-step');
    const stepTitleEl = document.getElementById('step-title');
    const specialisationIdEl = document.getElementById('specialisation-id');
    const userIdEl = document.getElementById('user-id');

    if (!specialisationIdEl) {
        console.error('specialisation-id element not found');
        return;
    }

    const specialisationId = specialisationIdEl.value;
    const userId = userIdEl ? userIdEl.value : 'anon';
    const localStorageKey = `bts_form_${userId}_${specialisationId}`;

    const stepTitles = [
        'Identité de l\'étudiant',
        'Scolarité de l\'année d\'inscription',
        'Scolarité des 2 années antérieures',
        'Identité des responsables légaux',
        'Validation du dossier'
    ];

    let currentStep = 1;
    const totalSteps = 5;

    // Charger les données sauvegardées
    function loadSavedData() {
        let merged = {};
        // 1. Charger depuis la session (backend)
        const savedDataEl = document.getElementById('saved-data');
        if (savedDataEl && savedDataEl.value && savedDataEl.value !== '{}') {
            try { merged = JSON.parse(savedDataEl.value); } catch (e) { console.warn('Parse session data error', e); }
        }
        // 2. Charger depuis localStorage (prioritaire pour l'étape)
        try {
            const localRaw = localStorage.getItem(localStorageKey);
            if (localRaw) {
                const localData = JSON.parse(localRaw);
                // Fusion simple : les données locales écrasent celles de session
                merged = Object.assign({}, merged, localData);
            }
        } catch (e) { console.warn('LocalStorage read error', e); }

        if (merged.currentStep) {
            currentStep = parseInt(merged.currentStep);
        }
        if (merged.formData) {
            Object.keys(merged.formData).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = merged.formData[key] === '1' || merged.formData[key] === true;
                        if (input.id === 'has_resp2' && input.checked) {
                            const event = new Event('change');
                            input.dispatchEvent(event);
                        }
                    } else {
                        input.value = merged.formData[key];
                    }
                }
            });
        }
        showStep(currentStep);
    }

    // Afficher une étape
    function showStep(step) {
        // Cacher toutes les étapes
        for (let i = 1; i <= totalSteps; i++) {
            const stepEl = document.getElementById(`step-${i}`);
            if (stepEl) {
                stepEl.style.display = i === step ? 'block' : 'none';
            }
        }

        currentStepEl.textContent = step;
        stepTitleEl.textContent = stepTitles[step - 1];

        // Mettre à jour l'indicateur de progression
        const stepper = document.querySelector('.fr-stepper__steps');
        if (stepper) {
            stepper.setAttribute('data-fr-current-step', step);
        }

        // Gérer l'affichage des boutons
        btnPrevious.style.display = step > 1 ? 'inline-block' : 'none';
        btnNext.style.display = step < totalSteps ? 'inline-block' : 'none';
        btnSubmit.style.display = step === totalSteps ? 'inline-block' : 'none';

        // Scroll vers le haut
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Valider l'étape courante
    function validateCurrentStep() {
        const currentStepDiv = document.getElementById(`step-${currentStep}`);
        if (!currentStepDiv) return true;

        const requiredInputs = currentStepDiv.querySelectorAll('[required]');

        for (let input of requiredInputs) {
            if (!input.value || (input.type === 'checkbox' && !input.checked)) {
                input.focus();
                alert('Veuillez remplir tous les champs obligatoires avant de continuer.');
                return false;
            }
        }
        return true;
    }

    // Collecter les données du formulaire
    function getFormData() {
        const formData = {};
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            if (input.name && input.id !== 'saved-data' && input.id !== 'specialisation-id') {
                if (input.type === 'checkbox') {
                    formData[input.name] = input.checked ? '1' : '0';
                } else {
                    formData[input.name] = input.value;
                }
            }
        });
        return formData;
    }

    // Sauvegarder la progression
    function saveProgress() {
        const data = {
            currentStep: currentStep,
            formData: getFormData()
        };

        // Sauvegarde locale immédiate (pour reprise après déconnexion)
        try {
            localStorage.setItem(localStorageKey, JSON.stringify(data));
        } catch (e) {
            console.warn('LocalStorage write error', e);
        }

        // Afficher un message de chargement
        btnSave.disabled = true;
        btnSave.innerHTML = '<span class="fr-icon-refresh-line fr-icon--sm" aria-hidden="true"></span> Sauvegarde...';

        fetch(`/bts/inscription/${specialisationId}/save`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(result => {
            if (result.success) {
                // Message de succès
                btnSave.innerHTML = '<span class="fr-icon-check-line fr-icon--sm" aria-hidden="true"></span> Sauvegardé !';
                setTimeout(() => {
                    btnSave.innerHTML = '<span class="fr-icon-save-line fr-icon--sm" aria-hidden="true"></span> Sauvegarder et continuer plus tard';
                    btnSave.disabled = false;
                }, 2000);
            } else {
                throw new Error('Save failed');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Erreur lors de la sauvegarde. Veuillez réessayer.');
            btnSave.innerHTML = '<span class="fr-icon-save-line fr-icon--sm" aria-hidden="true"></span> Sauvegarder et continuer plus tard';
            btnSave.disabled = false;
        });
    }

    // Gestion des boutons
    if (btnNext) {
        btnNext.addEventListener('click', function() {
            if (validateCurrentStep()) {
                saveProgress(); // Sauvegarde automatique (local + serveur)
                currentStep++;
                showStep(currentStep);
            }
        });
    }

    if (btnPrevious) {
        btnPrevious.addEventListener('click', function() {
            currentStep--;
            showStep(currentStep);
            saveProgress(); // Mémoriser l'étape courante en revenant en arrière
        });
    }

    if (btnSave) {
        btnSave.addEventListener('click', function(e) {
            e.preventDefault();
            saveProgress();
        });
    }

    // Toggle responsable 2
    const hasResp2 = document.getElementById('has_resp2');
    if (hasResp2) {
        hasResp2.addEventListener('change', function() {
            const section = document.getElementById('responsable2_section');
            if (section) {
                section.style.display = this.checked ? 'block' : 'none';
            }
        });
    }

    // Charger les données au démarrage
    loadSavedData();

    // Sauvegarde automatique périodique (toutes les 30s)
    setInterval(() => {
        saveProgress();
    }, 30000);
});
