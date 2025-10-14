import { Controller } from '@hotwired/stimulus';

// Controller pour activer l'ouverture/fermeture des sections FAQ
export default class extends Controller {
  static targets = [];

  toggle(event) {
    const btn = event.currentTarget;
    const panelId = btn.getAttribute('aria-controls');
    if (!panelId) return;
    const panel = document.getElementById(panelId);
    if (!panel) return;

    const expanded = btn.getAttribute('aria-expanded') === 'true';
    const newState = !expanded;
    btn.setAttribute('aria-expanded', newState ? 'true' : 'false');
    panel.classList.toggle('fr-collapse--expanded', newState);
    // Compatibilité si DSFR applique hidden
    if (newState) {
      panel.removeAttribute('hidden');
      panel.style.maxHeight = panel.scrollHeight + 'px';
    } else {
      panel.setAttribute('hidden', 'hidden');
      panel.style.maxHeight = null;
    }
  }
}