import { fetchBaranggays, fetchMunicipalities } from './api.js'
import { nextBtn, prevBtn, addChildBtn, addCivilBtn, addWorkBtn, firstDelButtons, initialInput, parentAttributes, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn, addRefBtn, municipalitySelect, baranggaySelect, provinceSelect } from './dom-selection.js'
import { addNewChildEntry, addNewCivilEntry, addNewMembershipEntry, addNewRecognitionEntry, addNewRefEntry, addNewSkillEntry, addNewTrainingEntry, addNewVolWorkEntry, addNewWorkEntry } from './form-entry.js'
import { changeStep } from './form-navigation.js'
import { deleteEntry, setTitleText } from './helper-functions.js'

const setupEventHandlers = () => {
    const [residentProvince, permanentProvince] = provinceSelect
    const [residentMunicipality, permanentMunicipality] = municipalitySelect
    const [residentBaranggay, permanentBaranggay] = baranggaySelect

    nextBtn.addEventListener('click', () => changeStep(1))
    prevBtn.addEventListener('click', () => changeStep(-1))

    firstDelButtons.forEach((button, index) => {
        button.addEventListener('click', () => deleteEntry(button, parentAttributes[index]))
    })

    initialInput.forEach((inputObj) => {
        inputObj.input.addEventListener('keyup', () => setTitleText(inputObj))
    })

    residentProvince.addEventListener('change', () => fetchMunicipalities(residentProvince.value, residentMunicipality, residentBaranggay))
    residentMunicipality.addEventListener('change', () => fetchBaranggays(residentMunicipality.value, residentBaranggay))

    permanentProvince.addEventListener('change', () => fetchMunicipalities(permanentProvince.value, permanentMunicipality, permanentBaranggay))
    permanentMunicipality.addEventListener('change', () => fetchBaranggays(permanentMunicipality.value, permanentBaranggay))

    addChildBtn.addEventListener('click', addNewChildEntry)
    addCivilBtn.addEventListener('click', addNewCivilEntry)
    addWorkBtn.addEventListener('click', addNewWorkEntry)
    addWorkVolBtn.addEventListener('click', addNewVolWorkEntry)
    addTrainingBtn.addEventListener('click', addNewTrainingEntry)
    addSkillBtn.addEventListener('click', addNewSkillEntry)
    addRecogBtn.addEventListener('click', addNewRecognitionEntry)
    addOrgBtn.addEventListener('click', addNewMembershipEntry)
    addRefBtn.addEventListener('click', addNewRefEntry)
}

export default setupEventHandlers
