import { fetchBaranggays, fetchCountries, fetchMunicipalities } from './api.js'
import { nextBtn, prevBtn, addChildBtn, addCivilBtn, addWorkBtn, firstDelButtons, initialInput, parentAttributes, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn, addRefBtn, municipalitySelect, baranggaySelect, provinceSelect, missingInfoDialog, nationalityDropdown, provinceSelects, submitBtn, copyAddress, residentialAddress, permanentAddress, optionalFields, currentDateIndicator, openSidebarBtn, sidebar, closeSidebarBtn } from './dom-selection.js'
import { addNewChildEntry, addNewCivilEntry, addNewMembershipEntry, addNewRecognitionEntry, addNewRefEntry, addNewSkillEntry, addNewTrainingEntry, addNewVolWorkEntry, addNewWorkEntry, submitForm } from './form-entry.js'
import { changeStep } from './form-navigation.js'
import { closeDialog, deleteEntry, getCurrentDate, setTitleText } from './helper-functions.js'
import { selectById, selectSibling } from './utilities.js'

const setupEventHandlers = () => {
    const [residentProvince, permanentProvince] = provinceSelect
    const [residentMunicipality, permanentMunicipality] = municipalitySelect
    const [residentBaranggay, permanentBaranggay] = baranggaySelect

    nextBtn.addEventListener('click', () => changeStep(1))
    prevBtn.addEventListener('click', () => changeStep(-1))

    debugger;

    console.log(sidebar);

    openSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full')
    })

    closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    })

    firstDelButtons.forEach((button, index) => {
        button.addEventListener('click', () => deleteEntry(button, parentAttributes[index]))
    })

    initialInput.forEach((inputObj) => {
        inputObj.input.addEventListener('keyup', () => setTitleText(inputObj))
    })

    getCurrentDate(currentDateIndicator)

    optionalFields.forEach((field) => {
        field.addEventListener('focus', () => {
            if (field.value === 'N/A') {
                field.value = ''
            }
        })
        field.addEventListener('blur', () => {
            if (field.value === '') {
                field.value = 'N/A'
            }
        })
    })

    residentProvince.addEventListener('change', () => fetchMunicipalities(residentProvince.value, residentMunicipality, residentBaranggay))
    residentMunicipality.addEventListener('change', () => fetchBaranggays(residentMunicipality.value, residentBaranggay))

    permanentProvince.addEventListener('change', () => {
        fetchMunicipalities(permanentProvince.value, permanentMunicipality, permanentBaranggay)
    })

    permanentMunicipality.addEventListener('change', () => fetchBaranggays(permanentMunicipality.value, permanentBaranggay))

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

    submitBtn.addEventListener('click', () => submitForm())

    // copies the address from the residential to permanent

    copyAddress.addEventListener('change', () => {
        if (copyAddress.checked) {
            fetchMunicipalities(residentialAddress[3].value, permanentAddress[4], permanentAddress[5], () => {
                fetchBaranggays(residentialAddress[4].value, permanentAddress[5], () => {
                    for (let i = 0; i < residentialAddress.length; i++) {
                        permanentAddress[i].value = residentialAddress[i].value
                    }
                })
            })
        }
    })

    selectSibling(missingInfoDialog, 'button').addEventListener('click', () => closeDialog(missingInfoDialog))
}

export default setupEventHandlers
