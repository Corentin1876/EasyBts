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
        // Charger depuis la base de données (backend via saved-data)
        const savedDataEl = document.getElementById('saved-data');
        console.log('Element saved-data:', savedDataEl);
        console.log('Valeur saved-data:', savedDataEl ? savedDataEl.value : 'non trouvé');
        
        if (savedDataEl && savedDataEl.value && savedDataEl.value !== '{}') {
            try { 
                merged = JSON.parse(savedDataEl.value);
                console.log('Données chargées depuis la base:', merged);
            } catch (e) { 
                console.warn('Parse session data error', e); 
            }
        } else {
            console.log('Aucune donnée sauvegardée trouvée');
        }

        if (merged.currentStep) {
            currentStep = parseInt(merged.currentStep);
            console.log('Reprise à l\'étape:', currentStep);
        }
        if (merged.formData) {
            console.log('Chargement des données du formulaire:', merged.formData);
            let fieldsLoaded = 0;
            let fieldsNotFound = [];
            
            // Attendre un peu plus que le DOM soit complètement rendu
            setTimeout(() => {
                Object.keys(merged.formData).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        const value = merged.formData[key];
                        if (input.type === 'checkbox') {
                            input.checked = value === '1' || value === true;
                            if (input.id === 'has_resp2' && input.checked) {
                                const event = new Event('change');
                                input.dispatchEvent(event);
                            }
                        } else if (input.type === 'radio') {
                            if (input.value === value) {
                                input.checked = true;
                            }
                        } else {
                            // Forcer la valeur de plusieurs façons
                            input.value = value;
                            input.setAttribute('value', value);
                            
                            // Déclencher les événements pour que les frameworks détectent le changement
                            input.dispatchEvent(new Event('change', { bubbles: true }));
                            input.dispatchEvent(new Event('input', { bubbles: true }));
                        }
                        fieldsLoaded++;
                        console.log(`✓ Champ "${key}" chargé avec valeur:`, value);
                    } else {
                        fieldsNotFound.push(key);
                    }
                });
                console.log(`${fieldsLoaded} champs chargés sur ${Object.keys(merged.formData).length}`);
                if (fieldsNotFound.length > 0) {
                    console.warn('Champs non trouvés:', fieldsNotFound);
                }
                
                // Forcer un re-render visuel
                console.log('Forçage du re-render visuel...');
                showStep(currentStep);
            }, 200); // Augmenter le délai à 200ms
        } else {
            showStep(currentStep);
        }
    }

    // Recharger les données de l'étape courante
    function reloadCurrentStepData() {
        const savedDataEl = document.getElementById('saved-data');
        if (!savedDataEl || !savedDataEl.value || savedDataEl.value === '{}') {
            return;
        }

        try {
            const data = JSON.parse(savedDataEl.value);
            if (data.formData) {
                console.log(`Rechargement des données pour l'étape ${currentStep}`);
                // Remplir uniquement les champs visibles de l'étape courante
                const currentStepEl = document.getElementById(`step-${currentStep}`);
                if (currentStepEl) {
                    Object.keys(data.formData).forEach(key => {
                        const input = currentStepEl.querySelector(`[name="${key}"]`);
                        if (input) {
                            const value = data.formData[key];
                            if (input.type === 'checkbox') {
                                input.checked = value === '1' || value === true;
                            } else if (input.type === 'radio') {
                                if (input.value === value) {
                                    input.checked = true;
                                }
                            } else {
                                input.value = value;
                                input.setAttribute('value', value);
                                input.dispatchEvent(new Event('change', { bubbles: true }));
                                input.dispatchEvent(new Event('input', { bubbles: true }));
                            }
                            console.log(`  ↻ Champ "${key}" rechargé: ${value}`);
                        }
                    });
                }
            }
        } catch (e) {
            console.warn('Erreur lors du rechargement des données:', e);
        }
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

        // Recharger les données de l'étape visible pour s'assurer qu'elles s'affichent
        setTimeout(() => {
            reloadCurrentStepData();
        }, 50);

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
        console.log('saveProgress() appelée');
        const data = {
            currentStep: currentStep,
            formData: getFormData()
        };
        console.log('Données à sauvegarder:', data);

        // Afficher un message de chargement
        btnSave.disabled = true;
        btnSave.innerHTML = '<span class="fr-icon-refresh-line fr-icon--sm fr-icon-spin" aria-hidden="true"></span> Sauvegarde en cours...';
        btnSave.classList.add('fr-btn--loading');

        console.log('Envoi vers:', `/bts/inscription/${specialisationId}/save`);

        fetch(`/bts/inscription/${specialisationId}/save`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            console.log('Réponse reçue:', response);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(result => {
            console.log('Résultat:', result);
            if (result.success) {
                // Message de succès avec animation
                console.log('Sauvegarde réussie en base de données');
                btnSave.classList.remove('fr-btn--loading');
                btnSave.classList.add('fr-btn--success');
                btnSave.innerHTML = '<span class="fr-icon-check-line fr-icon--sm" aria-hidden="true"></span> Sauvegardé avec succès !';
                
                // Afficher une notification toast
                showNotification('✓ Vos données ont été sauvegardées avec succès', 'success');
                
                // Mettre à jour saved-data avec les nouvelles données
                const savedDataEl = document.getElementById('saved-data');
                if (savedDataEl) {
                    const newData = {
                        currentStep: currentStep,
                        formData: data.formData
                    };
                    savedDataEl.value = JSON.stringify(newData);
                    console.log('✓ saved-data mis à jour avec:', newData);
                }
                
                // Réinitialiser le bouton après 3 secondes
                setTimeout(() => {
                    btnSave.innerHTML = '<span class="fr-icon-save-line fr-icon--sm" aria-hidden="true"></span> Sauvegarder et continuer plus tard';
                    btnSave.classList.remove('fr-btn--success');
                    btnSave.disabled = false;
                }, 3000);
            } else {
                throw new Error('Save failed');
            }
        })
        .catch(error => {
            console.error('Erreur lors de la sauvegarde:', error);
            btnSave.classList.remove('fr-btn--loading');
            btnSave.classList.add('fr-btn--error');
            showNotification('✗ Erreur lors de la sauvegarde. Veuillez réessayer.', 'error');
            btnSave.innerHTML = '<span class="fr-icon-save-line fr-icon--sm" aria-hidden="true"></span> Sauvegarder et continuer plus tard';
            setTimeout(() => {
                btnSave.classList.remove('fr-btn--error');
                btnSave.disabled = false;
            }, 2000);
        });
    }

    // Afficher une notification toast
    function showNotification(message, type = 'success') {
        // Créer l'élément de notification
        const notification = document.createElement('div');
        notification.className = `fr-alert fr-alert--${type} notification-toast`;
        notification.innerHTML = `
            <p class="fr-alert__title">${message}</p>
        `;
        
        // Ajouter au DOM
        document.body.appendChild(notification);
        
        // Animation d'entrée
        setTimeout(() => {
            notification.classList.add('show');
        }, 10);
        
        // Retirer après 4 secondes
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 4000);
    }

    // Gestion des boutons
    if (btnNext) {
        btnNext.addEventListener('click', function() {
            if (validateCurrentStep()) {
                // Sauvegarder PUIS changer d'étape
                console.log('Sauvegarde avant passage à l\'étape suivante...');
                const data = {
                    currentStep: currentStep,
                    formData: getFormData()
                };
                
                fetch(`/bts/inscription/${specialisationId}/save`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        console.log('✓ Sauvegarde réussie, passage à l\'étape suivante');
                        // Mettre à jour saved-data
                        const savedDataEl = document.getElementById('saved-data');
                        if (savedDataEl) {
                            savedDataEl.value = JSON.stringify({
                                currentStep: currentStep + 1,
                                formData: data.formData
                            });
                        }
                        currentStep++;
                        showStep(currentStep);
                    }
                })
                .catch(error => {
                    console.error('Erreur de sauvegarde, passage à l\'étape suivante quand même:', error);
                    currentStep++;
                    showStep(currentStep);
                });
            }
        });
    }

    if (btnPrevious) {
        btnPrevious.addEventListener('click', function() {
            // Sauvegarder avant de revenir en arrière
            const data = {
                currentStep: currentStep - 1,
                formData: getFormData()
            };
            
            fetch(`/bts/inscription/${specialisationId}/save`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    const savedDataEl = document.getElementById('saved-data');
                    if (savedDataEl) {
                        savedDataEl.value = JSON.stringify({
                            currentStep: currentStep - 1,
                            formData: data.formData
                        });
                    }
                }
            })
            .catch(error => console.error('Erreur de sauvegarde:', error));
            
            currentStep--;
            showStep(currentStep);
        });
    }

    if (btnSave) {
        console.log('Bouton sauvegarder trouvé et écouteur attaché');
        btnSave.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Clic sur sauvegarder détecté');
            saveProgress();
        });
    } else {
        console.error('Bouton btn-save non trouvé dans le DOM');
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

    // Charger les données au démarrage avec un délai pour s'assurer que le DOM est prêt
    setTimeout(() => {
        console.log('Chargement des données sauvegardées...');
        loadSavedData();
    }, 300); // Augmenter à 300ms

    // Sauvegarde "last-chance" avant de quitter la page
    window.addEventListener('beforeunload', function() {
        try {
            const data = {
                currentStep: currentStep,
                formData: getFormData()
            };
            const blob = new Blob([JSON.stringify(data)], { type: 'application/json' });
            navigator.sendBeacon(`/bts/inscription/${specialisationId}/save`, blob);
        } catch (e) {
            console.warn('Sauvegarde beforeunload échouée', e);
        }
    });
});
