import { nextBtn, prevBtn ,addChildBtn, addCivilBtn, addWorkBtn, firstDelButtons, initialInput, parentAttributes, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn } from './dom-selection.js'
import { addNewChildEntry, addNewCivilEntry, addNewMembershipEntry, addNewRecognitionEntry, addNewSkillEntry, addNewTrainingEntry, addNewVolWorkEntry, addNewWorkEntry } from './form-entry.js'
import { changeStep } from './form-navigation.js'
import { deleteEntry, setTitleText } from './helper-functions.js'

const setupEventHandlers = () => {
    nextBtn.addEventListener('click', () => changeStep(1))
    prevBtn.addEventListener('click', () => changeStep(-1))

    firstDelButtons.forEach((button, index) => {
        button.addEventListener('click', () => deleteEntry(button, parentAttributes[index]))
    })

    initialInput.forEach((inputObj) => {
        inputObj.input.addEventListener('keyup', () => setTitleText(inputObj))
    })

    addChildBtn.addEventListener('click', addNewChildEntry)
    addCivilBtn.addEventListener('click', addNewCivilEntry)
    addWorkBtn.addEventListener('click', addNewWorkEntry)
    addWorkVolBtn.addEventListener('click', addNewVolWorkEntry)
    addTrainingBtn.addEventListener('click', addNewTrainingEntry)
    addSkillBtn.addEventListener('click', addNewSkillEntry)
    addRecogBtn.addEventListener('click', addNewRecognitionEntry)
    addOrgBtn.addEventListener('click', addNewMembershipEntry)

    
}

export default setupEventHandlers
