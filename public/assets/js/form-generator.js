import { initDropdown, initDatePicker } from './form-init.js'

import { childTotalEntry, civilTotalEntry, form, learningDevTotalEntry, membershipTotalEntry, recognitionTotalEntry, skillTotalEntry, volWorkExpTotalEntry, workExpTotalEntry } from './form-element.js'

import { appendChildren, createCalendarIcon, createCaption, createContainer, createDelButton, createSelectAttribute, createSelect, createInput, createInputAttributes } from './form-builder.js'

import { containerClasses, childInputData, civilInputData, civilCaptions, workInputCaptions, workSelectCaptions, workSelectData, workInputData, workVolInputCaptions, workVolInputData, trainingInputData, trainingSelectData, trainingInputCaptions, trainingSelectCaptions, membershipInputData, recognitionInputData, referenceInputData, skillInputData } from './form-config.js'

import { deleteEntry, setTitleText, totalDataEntry } from './form-util.js'

import { selectById } from './dom-util.js'

function addNewChildEntry() {
    const entryContainer = selectById('children-container')
    const secondChild = entryContainer.querySelectorAll('div')[1]
    const totalEntry = totalDataEntry(entryContainer, 'data-child')

    const inputs = childInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [childNameInput, childBdateInput] = inputs

    const childEntry = createContainer(containerClasses.childContainer, 'data-child')
    const childBdateInputContainer = createContainer(containerClasses.relativeContainer)
    const childBdateIconContainer = createContainer(containerClasses.iconContainer)
    const delButton = createDelButton('del-button')
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-child'))

    initDatePicker([childBdateInput])

    appendChildren(childBdateIconContainer, [createCalendarIcon()])
    appendChildren(childBdateInputContainer, [childBdateIconContainer])
    appendChildren(childBdateInputContainer, [childBdateInput])

    appendChildren(childEntry, [childNameInput, childBdateInputContainer, delButton])

    entryContainer.insertBefore(childEntry, secondChild)

    childTotalEntry.value = totalDataEntry(entryContainer, 'data-child')
    // alert(childTotalEntry.value);
}

function addNewCivilEntry() {
    const entryContainer = selectById('exam-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-exam')

    const inputs = civilInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [examNameInput, ratingInput, examDateInput, examPlaceInput, licenseNumInput, issueDateInput] = inputs

    const labels = civilCaptions.map((captionAttributes) => createCaption(captionAttributes))

    const titleLabel = createCaption({ type: 'h2', classes: ['text-lg', 'font-semibold'], id: `civil-title-${totalEntry + 1}`, text: 'Civil Service Entry' })
    labels.unshift(titleLabel)

    const [title, examNameLabel, ratingLabel, examDateLabel, examPlaceLabel, licenseNumLabel, issueDateLabel] = labels

    const delButton = createDelButton(['del-button'])

    const civilEntry = createContainer(containerClasses.civilContainer, 'data-exam')

    const titleContainer = createContainer(containerClasses.titleContainer)
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-exam'))
    appendChildren(titleContainer, [title, delButton])

    // examination name
    const examNameContainer = createContainer(containerClasses.inputContainerSpan2)
    examNameInput.addEventListener('keyup', () => setTitleText({ input: examNameInput, titleId: `civil-title-${totalEntry + 1}`, defaultText: 'Civil Service Entry' }))
    appendChildren(examNameContainer, [examNameLabel, examNameInput])

    // ratings
    const ratingContainer = createContainer(containerClasses.inputContainer)
    appendChildren(ratingContainer, [ratingLabel, ratingInput])

    initDatePicker([examDateInput, issueDateInput])

    // examination date
    const examDateContainer = createContainer(containerClasses.inputContainer)
    const examDateInputContainer = createContainer(containerClasses.relativeContainer)
    const examDateIconContainer = createContainer(containerClasses.iconContainer)

    appendChildren(examDateIconContainer, [createCalendarIcon()])
    appendChildren(examDateInputContainer, [examDateIconContainer, examDateInput])
    appendChildren(examDateContainer, [examDateLabel, examDateInputContainer])

    // examination place
    const examPlaceContainer = createContainer(containerClasses.inputContainerSpan2)
    appendChildren(examPlaceContainer, [examPlaceLabel, examPlaceInput])

    // license number
    const licenseNumContainer = createContainer(containerClasses.inputContainer)
    appendChildren(licenseNumContainer, [licenseNumLabel, licenseNumInput])

    // date issued
    const issueDateContainer = createContainer(containerClasses.inputContainer)
    const issueDateIconContainer = createContainer(containerClasses.iconContainer)
    const issueDateInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(issueDateIconContainer, [createCalendarIcon()])
    appendChildren(issueDateInputContainer, [issueDateIconContainer, issueDateInput])
    appendChildren(issueDateContainer, [issueDateLabel, issueDateInputContainer])

    appendChildren(civilEntry, [titleContainer, examNameContainer, ratingContainer, examDateContainer, examPlaceContainer, licenseNumContainer, issueDateContainer])

    entryContainer.prepend(civilEntry)

    civilTotalEntry.value = totalDataEntry(entryContainer, 'data-exam')
}

function addNewWorkEntry() {
    const entryContainer = selectById('work-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-work')

    const inputs = workInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [positionInput, departmentInput, salaryInput, startDateInput, endDateInput] = inputs

    const selectCollection = workSelectData.map((data) => createSelect(createSelectAttribute(data, totalEntry)))
    const [gradeSelect, stepSelect, appointmentSelect, govSelect] = selectCollection

    const inputLabels = workInputCaptions.map((captionAttributes) => createCaption(captionAttributes))

    const selectLabels = workSelectCaptions.map((captionAttributes) => createCaption(captionAttributes))

    const titleLabel = createCaption({ type: 'h2', classes: ['text-lg', 'font-semibold'], id: `work-title-${totalEntry + 1}`, text: 'Work Experience Entry' })
    inputLabels.unshift(titleLabel)

    const [title, positionLabel, departmentLabel, salaryLabel, startDateLabel, endDateLabel, salaryGradeLabel, salaryStepLabel, appointmentLabel, govServiceLabel] = inputLabels

    const [gradeSelectLabel, stepSelectLabel, appointmentSelectLabel, govSelectLabel] = selectLabels

    const workEntry = createContainer(containerClasses.workContainer, 'data-work')

    const delButton = createDelButton('del-button')

    // title
    const titleContainer = createContainer(containerClasses.titleContainer)
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-work'))

    appendChildren(titleContainer, [title, delButton])

    // position
    const positionContainer = createContainer(containerClasses.inputContainerSpan2)
    positionInput.addEventListener('keyup', () => setTitleText({ input: positionInput, titleId: `work-title-${totalEntry + 1}`, defaultText: 'Work Experience Entry' }))

    appendChildren(positionContainer, [positionLabel, positionInput])

    // department
    const departmentContainer = createContainer(containerClasses.inputContainerSpan3)
    appendChildren(departmentContainer, [departmentLabel, departmentInput])

    // salary
    const salaryContainer = createContainer(containerClasses.inputContainer)
    appendChildren(salaryContainer, [salaryLabel, salaryInput])

    initDatePicker([startDateInput, endDateInput])

    // start date datepicker
    const startDateContainer = createContainer(containerClasses.inputContainer)
    const startDateInputContainer = createContainer(containerClasses.relativeContainer)
    const startDateIconContainer = createContainer(containerClasses.iconContainer)

    appendChildren(startDateIconContainer, [createCalendarIcon()])
    appendChildren(startDateInputContainer, [startDateIconContainer, startDateInput])
    appendChildren(startDateContainer, [startDateLabel, startDateInputContainer])

    // end date datepicker
    const endDateContainer = createContainer(containerClasses.inputContainer)
    const endDateIconContainer = createContainer(containerClasses.iconContainer)
    const endDateInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(endDateIconContainer, [createCalendarIcon()])
    appendChildren(endDateInputContainer, [endDateIconContainer, endDateInput])
    appendChildren(endDateContainer, [endDateLabel, endDateInputContainer])

    // salary grade
    initDropdown(gradeSelect, 'salaryGrade')
    const salaryGradeContainer = createContainer(containerClasses.inputContainer)
    const salarySelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(salarySelectContainer, [gradeSelect, gradeSelectLabel])
    appendChildren(salaryGradeContainer, [salaryGradeLabel, salarySelectContainer])

    // salary step
    initDropdown(stepSelect, 'salaryStep')
    const salaryStepContainer = createContainer(containerClasses.inputContainer)
    const stepSelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(stepSelectContainer, [stepSelect, stepSelectLabel])
    appendChildren(salaryStepContainer, [salaryStepLabel, stepSelectContainer])

    // appointment status
    initDropdown(appointmentSelect, 'appointmentStatus')
    const appointmentStatusContainer = createContainer(containerClasses.inputContainer)
    const appointmentSelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(appointmentSelectContainer, [appointmentSelect, appointmentSelectLabel])
    appendChildren(appointmentStatusContainer, [appointmentLabel, appointmentSelectContainer])

    // government service
    initDropdown(govSelect, 'governmentService')
    const govServiceContainer = createContainer(containerClasses.inputContainer)
    const govSelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(govSelectContainer, [govSelect, govSelectLabel])
    appendChildren(govServiceContainer, [govServiceLabel, govSelectContainer])

    appendChildren(workEntry, [titleContainer, positionContainer, departmentContainer, salaryContainer, startDateContainer, endDateContainer, salaryGradeContainer, salaryStepContainer, appointmentStatusContainer, govServiceContainer])

    entryContainer.prepend(workEntry)

    workExpTotalEntry.value = totalDataEntry(entryContainer, 'data-work')
}

function addNewVolWorkEntry() {
    const entryContainer = selectById('work-vol-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-work-vol')
    const workVolEntry = createContainer(containerClasses.workVolContainer, 'data-work-vol')
    const delButton = createDelButton('del-button')

    const inputs = workVolInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [orgNameInput, positionInput, workVolStartInput, workVolEndInput, totalHoursInput] = inputs
    const inputLabels = workVolInputCaptions.map((captionAttributes) => createCaption(captionAttributes, totalEntry))
    const titleLabel = createCaption({ type: 'h2', classes: ['text-lg', 'font-semibold'], id: `work-vol-title-${totalEntry + 1}`, text: 'Voluntary Work Experience Entry' })
    inputLabels.unshift(titleLabel)

    const [title, orgNameLabel, positionLabel, workVolStartLabel, workVolEndLabel, totalHoursLabel] = inputLabels

    // title
    const titleContainer = createContainer(containerClasses.titleContainer)
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-work-vol'))
    appendChildren(titleContainer, [title, delButton])

    // org name and address
    const orgNameContainer = createContainer(containerClasses.inputContainerSpan2)
    orgNameInput.addEventListener('keyup', () => setTitleText({ input: orgNameInput, titleId: `work-vol-title-${totalEntry + 1}`, defaultText: 'Voluntary Work Experience Entry' }))
    appendChildren(orgNameContainer, [orgNameLabel, orgNameInput])

    // position / nature of work
    const positionContainer = createContainer(containerClasses.inputContainerSpan2)
    appendChildren(positionContainer, [positionLabel, positionInput])

    initDatePicker([workVolStartInput, workVolEndInput])

    // voluntary work start
    const workVolStartDateContainer = createContainer(containerClasses.inputContainer)
    const workVolStartDateIconContainer = createContainer(containerClasses.iconContainer)
    const workVolStartDateInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(workVolStartDateIconContainer, [createCalendarIcon()])
    appendChildren(workVolStartDateInputContainer, [workVolStartDateIconContainer, workVolStartInput])
    appendChildren(workVolStartDateContainer, [workVolStartLabel, workVolStartDateInputContainer])

    // voluntary work end
    const workVolEndDateContainer = createContainer(containerClasses.inputContainer)
    const workVolEndDateIconContainer = createContainer(containerClasses.iconContainer)
    const workVolEndDateInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(workVolEndDateIconContainer, [createCalendarIcon()])
    appendChildren(workVolEndDateInputContainer, [workVolEndDateIconContainer, workVolEndInput])
    appendChildren(workVolEndDateContainer, [workVolEndLabel, workVolEndDateInputContainer])

    // total hours
    const totalHoursContainer = createContainer(containerClasses.inputContainer)
    appendChildren(totalHoursContainer, [totalHoursLabel, totalHoursInput])

    appendChildren(workVolEntry, [titleContainer, orgNameContainer, positionContainer, workVolStartDateContainer, workVolEndDateContainer, totalHoursContainer])

    entryContainer.prepend(workVolEntry)

    volWorkExpTotalEntry.value = totalDataEntry(entryContainer, 'data-work-vol')
    alert(volWorkExpTotalEntry.value)
}

function addNewTrainingEntry() {
    const entryContainer = selectById('training-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-training')
    const trainingEntry = createContainer(containerClasses.trainingContainer, 'data-training')
    const delButton = createDelButton('del-button')

    // inputs
    const inputs = trainingInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const inputLabels = trainingInputCaptions.map((captionAttributes) => createCaption(captionAttributes))
    const [trainingTitleInput, trainingSponsorInput, trainingStartInput, trainingEndInput, trainingHoursInput] = inputs

    // dropdowns
    const selectCollection = trainingSelectData.map((data) => createSelect(createSelectAttribute(data, totalEntry)))
    const [trainingTypeSelect] = selectCollection
    const selectLabels = trainingSelectCaptions.map((captionAttributes) => createCaption(captionAttributes))
    const [trainingTypeSelectLabel] = selectLabels

    // title
    const titleLabel = createCaption({ type: 'h2', classes: ['text-lg', 'font-semibold'], id: `training-title-${totalEntry + 1}`, text: 'Learning and Developement Entry' })
    inputLabels.unshift(titleLabel)

    const [title, trainingTitleLabel, trainingSponsorLabel, trainingStartLabel, trainingEndLabel, trainingTypeLabel, trainingHoursLabel] = inputLabels

    // title container
    const titleContainer = createContainer(containerClasses.titleContainer)
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-training'))
    appendChildren(titleContainer, [title, delButton])

    // training title
    const trainingTitleContainer = createContainer(containerClasses.inputContainerSpan2)
    trainingTitleInput.addEventListener('keyup', () => setTitleText({ input: trainingTitleInput, titleId: `training-title-${totalEntry + 1}`, defaultText: 'Learning and Development ENtry' }))
    appendChildren(trainingTitleContainer, [trainingTitleLabel, trainingTitleInput])

    // training sponsor
    const trainingSponsorContainer = createContainer(containerClasses.inputContainerSpan2)
    appendChildren(trainingSponsorContainer, [trainingSponsorLabel, trainingSponsorInput])

    initDatePicker([trainingStartInput, trainingEndInput])

    // training start date
    const trainingStartContainer = createContainer(containerClasses.inputContainer)
    const trainingStartIconContainer = createContainer(containerClasses.iconContainer)
    const trainingStartInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(trainingStartIconContainer, [createCalendarIcon()])
    appendChildren(trainingStartInputContainer, [trainingStartIconContainer, trainingStartInput])
    appendChildren(trainingStartContainer, [trainingStartLabel, trainingStartInputContainer])

    // training end date
    const trainingEndContainer = createContainer(containerClasses.inputContainer)
    const trainingEndIconContainer = createContainer(containerClasses.iconContainer)
    const trainingEndInputContainer = createContainer(containerClasses.relativeContainer)

    appendChildren(trainingEndIconContainer, [createCalendarIcon()])
    appendChildren(trainingEndInputContainer, [trainingEndIconContainer, trainingEndInput])
    appendChildren(trainingEndContainer, [trainingEndLabel, trainingEndInputContainer])

    // training type
    initDropdown(trainingTypeSelect, 'trainingType')
    const trainingTypeContainer = createContainer(containerClasses.inputContainer)
    const trainingTypeSelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(trainingTypeSelectContainer, [trainingTypeSelect, trainingTypeSelectLabel])
    appendChildren(trainingTypeContainer, [trainingTypeLabel, trainingTypeSelectContainer])

    // training hours
    const trainingHoursContainer = createContainer(containerClasses.inputContainer)
    appendChildren(trainingHoursContainer, [trainingHoursLabel, trainingHoursInput])

    appendChildren(trainingEntry, [titleContainer, trainingTitleContainer, trainingSponsorContainer, trainingStartContainer, trainingEndContainer, trainingTypeContainer, trainingHoursContainer])

    entryContainer.prepend(trainingEntry)
    learningDevTotalEntry.value = totalDataEntry(entryContainer, 'data-training')
}

function addNewSkillEntry() {
    const entryContainer = selectById('skill-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-skill')

    const skillEntry = createContainer(containerClasses.otherInfoContainer, 'data-skill')
    const inputs = skillInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [skillInput] = inputs

    const delButton = createDelButton('del-button')
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-skill'))

    appendChildren(skillEntry, [skillInput, delButton])

    entryContainer.prepend(skillEntry)

    skillTotalEntry.value = totalDataEntry(entryContainer, 'data-skill')
}

function addNewRecognitionEntry() {
    const entryContainer = selectById('recognition-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-recognition')

    const recognitionEntry = createContainer(containerClasses.otherInfoContainer, 'data-recognition')
    const inputs = recognitionInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [recognitionInput] = inputs

    const delButton = createDelButton('del-button')
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-recognition'))

    appendChildren(recognitionEntry, [recognitionInput, delButton])

    entryContainer.prepend(recognitionEntry)
    recognitionTotalEntry.value = totalDataEntry(entryContainer, 'data-recognition')
}

function addNewMembershipEntry() {
    const entryContainer = selectById('membership-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-membership')

    const membershipEntry = createContainer(containerClasses.otherInfoContainer, 'data-membership')
    const inputs = membershipInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [membershipInput] = inputs

    const delButton = createDelButton('del-button')
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-membership'))

    appendChildren(membershipEntry, [membershipInput, delButton])

    entryContainer.prepend(membershipEntry)
    membershipTotalEntry.value = totalDataEntry(entryContainer, 'data-membership')
}

function addNewRefEntry() {
    const entryContainer = selectById('reference-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-reference')
    const firstEntry = entryContainer.querySelector('[data-reference]')

    const refEntry = createContainer(containerClasses.referenceContainer, 'data-reference')
    const delButton = createDelButton('del-button')
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-reference'))

    const inputs = referenceInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [refNameInput, refAddressInput, refTelInput] = inputs

    appendChildren(refEntry, [refNameInput, refAddressInput, refTelInput, delButton])

    entryContainer.insertBefore(refEntry, firstEntry)
}

function submitForm() {
    form.submit()
}

export { addNewChildEntry, addNewCivilEntry, addNewWorkEntry, addNewVolWorkEntry, addNewTrainingEntry, addNewSkillEntry, addNewRecognitionEntry, addNewMembershipEntry, addNewRefEntry, submitForm }
