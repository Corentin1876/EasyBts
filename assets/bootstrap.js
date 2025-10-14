import { startStimulusApp } from '@symfony/stimulus-bundle';
import AccordionController from './controllers/accordion_controller.js';

const app = startStimulusApp();
app.register('accordion', AccordionController);

// Initialisation DSFR (si nécessaire pour les composants) après chargement
document.addEventListener('DOMContentLoaded', () => {
	if (window.dsfr && window.dsfr.start) {
		try { window.dsfr.start(); } catch (e) { console.warn('DSFR init error', e); }
	}
});
