import { selectById, selectAllSibling } from './utilities.js'

const setMultipleAttributes = (element, attribute) => {
    for (const [key, value] of Object.entries(attribute)) {
        element.setAttribute(key, value)
    }
}

// retrieves the current date and initializes it as a value to the passed input element
const getCurrentDate = (input) => {
    const currentDate = new Date()

    const day = currentDate.getDate() 
    const month = currentDate.getMonth() + 1 
    const year = currentDate.getFullYear()

    const formattedDate = `${year}-${month}-${day}`

    input.value = formattedDate
}

const closeDialog = (dialogElement) => {
    dialogElement.close()
}

const setTitleText = ({ input, titleId, defaultText }) => {
    const title = selectById(titleId)
    const inputContent = input.value
    title.textContent = inputContent === '' ? defaultText : inputContent
}

const deleteEntry = (button, parentAttribute) => {
    button.closest(`[${parentAttribute}]`).remove()
}

const validateSelection = (selectYes, selectNo) => {
    return (selectYes.checked && !selectNo.checked) || (!selectYes.checked && selectNo.checked)
}

function checkInputsValidity(inputs, selects) {
    const inputsValidity = inputs.every((input) => input.checkValidity())
    const selectsValidity = selects.every((select) => select.checkValidity())

    return inputsValidity && selectsValidity
}

function checkRadioButtonsProgress(step) {
    const totalRadioButtons = step.querySelectorAll('input[type=radio]').length
    const totalCheckedRadioButtons = step.querySelectorAll('input[type=radio]:checked').length

    const progress = Math.round((totalCheckedRadioButtons / totalRadioButtons) * 100 * 100) / 100
    return progress
}

const totalDataEntry = (parentContainer, childAttribute) => {
    return selectAllSibling(parentContainer, childAttribute).length
}

export { setMultipleAttributes, setTitleText, deleteEntry, validateSelection, checkInputsValidity, checkRadioButtonsProgress, totalDataEntry, getCurrentDate, closeDialog }
