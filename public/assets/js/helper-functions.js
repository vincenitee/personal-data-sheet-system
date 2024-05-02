import { selectById, selectAllSibling } from "./utilities.js"

const setMultipleAttributes = (element, attribute) => {
    for(const [key, value] of Object.entries(attribute)){
        element.setAttribute(key, value)
    }
}

const closeDialog = (dialogElement) => {
    dialogElement.close()
}

const setTitleText = ({input, titleId, defaultText}) => {
    const title = selectById(titleId)
    const inputContent = input.value
    title.textContent = inputContent === '' ? defaultText : inputContent 
}

const deleteEntry = (button, parentAttribute) => {
    button.closest(`[${parentAttribute}]`).remove()
}

const validateSelection = (selectYes, selectNo) => {
    return (selectYes.checked && !selectNo.checked) || (!selectYes.checked && selectNo.checked);
}

function checkInputsValidity(inputs, selects) {
    const inputsValidity = inputs.every((input) => input.checkValidity())
    const selectsValidity = selects.every((select) => select.checkValidity())

    return inputsValidity && selectsValidity
}

const totalDataEntry = (parentContainer, childAttribute) => {
    return selectAllSibling(parentContainer, childAttribute).length
}

function enableSelect(select) {
    const container = select.closest('div')
    select.classList.remove('pointer-events-none')
    container.classList.remove('opacity-50')
}

function disableSelect(select) {
    const container = select.closest('div')
    select.classList.add('pointer-events-none')
    container.classList.add('opacity-50')
}

export { setMultipleAttributes, setTitleText, deleteEntry, validateSelection, checkInputsValidity, totalDataEntry, closeDialog, enableSelect, disableSelect }