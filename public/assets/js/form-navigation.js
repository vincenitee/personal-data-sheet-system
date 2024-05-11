// Import necessary DOM elements and other dependencies
import { nextBtn, prevBtn, formSteps, missingInfoDialog, submitBtn } from './form-element.js'
import { appendChildren, createWarningMessage } from './form-builder.js'
import { checkInputsValidity } from './form-util.js'

// initial value 0, points to the first step
let currentStep = formSteps.findIndex((step) => !step.classList.contains('hidden'))
// console.log('Current Step before function Change Step: ', currentStep)

// stepChange value depends on what button is clicked, nextBtn = 1 prevBtn = -1
function changeStep(stepChange) {

    // selects all the inputs and select tags within the current step to ensure that all is filled up correctly based on their constraints
    const inputs = [...formSteps[currentStep].querySelectorAll('input')]
    const selects = [...formSteps[currentStep].querySelectorAll('select')]

    // let allValid = true
    let allValid = checkInputsValidity(inputs, selects)

    if (allValid) {
        currentStep += stepChange
        console.log('Current Step after function Change Step: ', currentStep)
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
        if (currentStep < 10) {
            if (index === currentStep) {
                step.classList.remove('hidden')
            } else {
                step.classList.add('hidden')
            }
        }

        if (currentStep === 9) {
            nextBtn.classList.add('hidden')
            submitBtn.classList.remove('hidden')
        } else {
            nextBtn.classList.remove('hidden')
            submitBtn.classList.add('hidden')
        }

        step.scrollIntoView({ behavior: 'smooth', block: 'start' })
    })

    const isFirstStep = currentStep === 0
    prevBtn.classList.toggle('cursor-not-allowed', isFirstStep)
    prevBtn.classList.toggle('opacity-50', isFirstStep)
    prevBtn.disabled = isFirstStep
}

export { changeStep }
