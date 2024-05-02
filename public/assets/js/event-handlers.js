import { fetchBaranggays, fetchCountries, fetchMunicipalities } from './api.js'
import { nextBtn, prevBtn, addChildBtn, addCivilBtn, addWorkBtn, firstDelButtons, initialInput, parentAttributes, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn, addRefBtn, municipalitySelect, baranggaySelect, provinceSelect, missingInfoDialog, nationalityDropdown, provinceSelects } from './dom-selection.js'
import { addNewChildEntry, addNewCivilEntry, addNewMembershipEntry, addNewRecognitionEntry, addNewRefEntry, addNewSkillEntry, addNewTrainingEntry, addNewVolWorkEntry, addNewWorkEntry } from './form-entry.js'
import { changeStep } from './form-navigation.js'
import { closeDialog, deleteEntry, disableSelect, enableSelect, setTitleText } from './helper-functions.js'
import { selectById, selectSibling } from './utilities.js'

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

    provinceSelects.forEach((select) => {
        const selectId = select.id

        select.addEventListener('change', () => {
            const municipalitySelect = selectById(`${selectId.split('-', 1)}-municipality`)
            const brgySelect = selectById(`${selectId.split('-', 1)}-brgy`)

            if(select.value != ''){
                enableSelect(municipalitySelect)
                enableSelect(brgySelect)
            } else{
                disableSelect(municipalitySelect)
                disableSelect(brgySelect)
            }
        })
    })

    nationalityDropdown.addEventListener('change', () => fetchCountries(nationalityDropdown))

    addChildBtn.addEventListener('click', addNewChildEntry)
    addCivilBtn.addEventListener('click', addNewCivilEntry)
    addWorkBtn.addEventListener('click', addNewWorkEntry)
    addWorkVolBtn.addEventListener('click', addNewVolWorkEntry)
    addTrainingBtn.addEventListener('click', addNewTrainingEntry)
    addSkillBtn.addEventListener('click', addNewSkillEntry)
    addRecogBtn.addEventListener('click', addNewRecognitionEntry)
    addOrgBtn.addEventListener('click', addNewMembershipEntry)
    addRefBtn.addEventListener('click', addNewRefEntry)

    selectSibling(missingInfoDialog, 'button').addEventListener('click', () => closeDialog(missingInfoDialog))
}

export default setupEventHandlers
