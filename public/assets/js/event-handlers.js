import { nextBtn, prevBtn ,addChildBtn, addCivilBtn, addWorkBtn, firstDelButtons, initialInput, parentAttributes, initialTitle } from './dom-selection.js'
import { addNewChildEntry, addNewCivilEntry, addNewWorkEntry } from './form-entry.js'
import { changeStep } from './form-navigation.js'
import { deleteEntry, setTitleText } from './helper-functions.js'

const setupEventHandlers = () => {
    nextBtn.addEventListener('click', () => changeStep(1))
    prevBtn.addEventListener('click', () => changeStep(-1))

    firstDelButtons.forEach((button, index) => {
        button.addEventListener('click', () => deleteEntry(button, parentAttributes[index]))
    })
    initialInput.forEach((input, index) => {
        input.addEventListener('keyup', () => setTitleText(initialTitle[index]))
    })

    addChildBtn.addEventListener('click', addNewChildEntry);
    addCivilBtn.addEventListener('click', addNewCivilEntry);
    addWorkBtn.addEventListener('click', addNewWorkEntry);
}

export default setupEventHandlers
