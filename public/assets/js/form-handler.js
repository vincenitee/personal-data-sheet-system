import { fetchBaranggays, fetchCountries, fetchMunicipalities } from './api.js'

import { dateInputs, yearDropdowns, nextBtn, prevBtn, addChildBtn, addCivilBtn, addWorkBtn, initialDelButtons, initialInputs, parentAttributes, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn, addRefBtn, missingInfoDialog, nationalityDropdown, submitBtn, copyAddress, residentialAddress, permanentAddress, optionalFields, currentDateIndicator, appointmentStatusDropdown, salaryStepDropdown, salaryGradeDropdown, trainingDropdown } from './form-element.js'

import { addNewChildEntry, addNewCivilEntry, addNewMembershipEntry, addNewRecognitionEntry, addNewRefEntry, addNewSkillEntry, addNewTrainingEntry, addNewVolWorkEntry, addNewWorkEntry, submitForm } from './form-generator.js'

import { changeStep } from './form-navigation.js'

import { closeDialog, deleteEntry, getCurrentDate, setTitleText } from './form-util.js'

import { selectSibling } from './dom-util.js'

import { initDropdown, initDatePicker } from './form-init.js' 

const setupEventHandlers = () => {

    const [ residentHouse, residentStreet, residentVillage, residentProvince, residentMunicipality, residentBarangay, residentZip ] = residentialAddress;

    const [ permanentHouse, permanentStreet, permanentVillage, permanentProvince, permanentMunicipality, permanentBarangay, permanentZip ] = permanentAddress;

    // Navigation buttons
    nextBtn.addEventListener('click', () => changeStep(1))
    prevBtn.addEventListener('click', () => changeStep(-1))

    // Deletion buttons
    initialDelButtons.forEach((button, index) => {
        button.addEventListener('click', () => deleteEntry(button, parentAttributes[index]))
    })

    // Input title text on keyup
    initialInputs.forEach((inputObj) => {
        inputObj.input.addEventListener('keyup', () => setTitleText(inputObj))
    })

    // Set current date
    getCurrentDate(currentDateIndicator)

    // Handle optional fields
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

    // Initialize dropdowns and date pickers
    yearDropdowns.forEach((dropdown) => initDropdown(dropdown, 'year'))
    dateInputs.forEach(initDatePicker)
    initDropdown(appointmentStatusDropdown, 'appointmentStatus')
    initDropdown(salaryStepDropdown, 'salaryStep')
    initDropdown(salaryGradeDropdown, 'salaryGrade')
    initDropdown(trainingDropdown, 'trainingType')

    // Handle province, municipality, and baranggay dropdowns
    residentProvince.addEventListener('change', () => fetchMunicipalities(residentProvince.value, residentMunicipality, residentBarangay))

    residentMunicipality.addEventListener('change', () => fetchBaranggays(residentMunicipality.value, residentBarangay))
    permanentProvince.addEventListener('change', () => fetchMunicipalities(permanentProvince.value, permanentMunicipality, permanentBarangay))

    permanentMunicipality.addEventListener('change', () => fetchBaranggays(permanentMunicipality.value, permanentBarangay))

    // Handle nationality dropdown
    nationalityDropdown.addEventListener('change', () => fetchCountries(nationalityDropdown))

    // Add new entries
    addChildBtn.addEventListener('click', addNewChildEntry)
    addCivilBtn.addEventListener('click', addNewCivilEntry)
    addWorkBtn.addEventListener('click', addNewWorkEntry)
    addWorkVolBtn.addEventListener('click', addNewVolWorkEntry)
    addTrainingBtn.addEventListener('click', addNewTrainingEntry)
    addSkillBtn.addEventListener('click', addNewSkillEntry)
    addRecogBtn.addEventListener('click', addNewRecognitionEntry)
    addOrgBtn.addEventListener('click', addNewMembershipEntry)
    addRefBtn.addEventListener('click', addNewRefEntry)

    // Submit form
    submitBtn.addEventListener('click', () => submitForm())

    // copy address from residential to permanent
    copyAddress.addEventListener('change', () => {

        if(copyAddress.checked){
            for(let i = 0; i < residentialAddress.length; i++){
                if(residentialAddress[i].tagName.toLowerCase() === 'select'){
                    copyOptions(residentialAddress[i], permanentAddress[i])
                    permanentAddress[i].value = residentialAddress[i].value
                } else{
                    permanentAddress[i].value = residentialAddress[i].value
                }
            }
        }
        else{
            permanentAddress.forEach((field) => {
                // clears all the copies value from resident inputs (house, street, village)
                if(field.tagName.toLowerCase() === 'input'){
                    field.value = ''
                }
                // clears all the copied values from resident select (province, municipality, barangay)
                else {
                    if(field.id === 'permanent-province'){
                        field.selectedIndex = 0
                    } else{
                        field.innerHTML = ''
                    }
                }
            })
        }
    })

    // Handle missing info dialog
    selectSibling(missingInfoDialog, 'button').addEventListener('click', () => closeDialog(missingInfoDialog))
}

const copyOptions = (source, target) =>{
    target.innerHTML = ''

    for(let i = 0; i < source.options.length; i++){
        const option = source.options[i]
        target.appendChild(new Option (option.textContent, option.value))
    }
}

export default setupEventHandlers
