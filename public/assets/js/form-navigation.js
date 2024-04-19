// Import necessary DOM elements and other dependencies
import {nextBtn, prevBtn, formSteps} from './dom-selection.js';

let currentStep = formSteps.findIndex((step) => !step.classList.contains('hidden'));

function changeStep(stepChange) {
    currentStep += stepChange;
    console.log('Current Step: ', currentStep)
    showCurrentStep();
}

function showCurrentStep() {
    formSteps.forEach((step, index) => {
        if (index === currentStep) {
            step.classList.remove('hidden');
        } else {
            step.classList.add('hidden');
        }
    });

    const isFirstStep = currentStep === 0;
    prevBtn.classList.toggle('cursor-not-allowed', isFirstStep);
    prevBtn.classList.toggle('opacity-50', isFirstStep);
    prevBtn.disabled = isFirstStep;
}

export { changeStep };
