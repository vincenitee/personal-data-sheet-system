import { selectById, selectAllSibling } from "./utilities.js"

const setMultipleAttributes = (element, attribute) => {
    for(const [key, value] of Object.entries(attribute)){
        element.setAttribute(key, value)
    }
}

const setTitleText = ({input, titleId, defaultText}) => {
    const title = selectById(titleId)
    console.log(titleId)
    const inputContent = input.value
    title.textContent = inputContent === '' ? defaultText : inputContent 
}

const deleteEntry = (button, parentAttribute) => {
    button.closest(`[${parentAttribute}]`).remove()
}

const totalDataEntry = (parentContainer, childAttribute) => {
    return selectAllSibling(parentContainer, childAttribute).length
}

export { setMultipleAttributes, setTitleText, deleteEntry, totalDataEntry }