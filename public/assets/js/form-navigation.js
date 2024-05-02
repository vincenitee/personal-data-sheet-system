// Import necessary DOM elements and other dependencies
import { nextBtn, prevBtn, formSteps, missingInfoDialog } from './dom-selection.js'
import { appendChildren, createWarningMessage } from './element-builder.js'
import { checkInputsValidity } from './helper-functions.js'

let currentStep = formSteps.findIndex((step) => !step.classList.contains('hidden'))

function changeStep(stepChange) {
    console.log('Current Step: ', currentStep)

    const inputs = [...formSteps[currentStep].querySelectorAll('input')]
    const selects = [...formSteps[currentStep].querySelectorAll('select')]
    const allValid = true
    // const allValid = checkInputsValidity(inputs, selects)

    if (allValid) {
        currentStep += stepChange
        showCurrentStep()
    } else {
        missingInfoDialog.showModal()
        inputs.forEach(displayWarningMessage)
        selects.forEach(displayWarningMessage)
    }
}

function displayWarningMessage(input) {
    if (input.id === 'bdate' && input.value === '') {
        const container = input.closest('.space-y-1')
        const warningMessages = container.querySelectorAll('span')
        if (warningMessages.length === 0) {
            const warningMessage = createWarningMessage('This field is required')
            appendChildren(container, [warningMessage])
            input.addEventListener('input', () => container.removeChild(warningMessage))
        }
    }
    if (!input.checkValidity()) {
        if (input.type === 'number') console.log(input)

        const container = input.closest('div')
        const warningMessages = container.querySelectorAll('span')

        if (warningMessages.length === 0) {
            const warningMessage = createWarningMessage('This field is required')
            appendChildren(container, [warningMessage])

            if (input.type === 'text' || input.type === 'number') {
                input.addEventListener('input', () => container.removeChild(warningMessage))
                // input.addEventListener('change', () => container.removeChild(warningMessage))
            } else if (input.type === 'email') {
                input.addEventListener('input', () => {
                    if (input.checkValidity()) container.removeChild(warningMessage)
                })
            } else {
                input.addEventListener('change', () => container.removeChild(warningMessage))
            }
        }
    }
}

function showCurrentStep() {
    formSteps.forEach((step, index) => {
        if (currentStep <= 10) {
            index === currentStep ? step.classList.remove('hidden') : step.classList.add('hidden')
        }

        step.scrollIntoView({ behavior: 'smooth', block: 'start' })
    })

    const isFirstStep = currentStep === 0
    prevBtn.classList.toggle('cursor-not-allowed', isFirstStep)
    prevBtn.classList.toggle('opacity-50', isFirstStep)
    prevBtn.disabled = isFirstStep
}

export { changeStep }
