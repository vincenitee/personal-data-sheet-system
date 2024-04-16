import { initDatePicker, initSalaryGrade, initSalaryStep } from './component-init.js'
import { appendChildren, createCalendarIcon, createCaption, createContainer, createDelButton, createSelectAttribute, createSelect, createInput, createInputAttributes } from './element-builder.js'
import { containerClasses, childInputData, civilInputData, civilCaptions, workInputCaptions, workSelectCaptions, workSelectData, workInputData } from './form-config.js'
import { deleteEntry, setTitleText, totalDataEntry } from './helper-functions.js'
import { selectById } from './utilities.js'

function addNewChildEntry() {
    const entryContainer = selectById('children-container')
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

    appendChildren(entryContainer, [childEntry])
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

    const civilEntry = createContainer(containerClasses.civilContainer, 'data-exam')
    const titleContainer = createContainer(containerClasses.titleContainer)
    const examNameContainer = createContainer(containerClasses.inputContainerSpan2)
    const ratingContainer = createContainer(containerClasses.inputContainer)
    const examPlaceContainer = createContainer(containerClasses.inputContainerSpan2)
    
    const licenseNumContainer = createContainer(containerClasses.inputContainer)
    
    // exam date
    const examDateContainer = createContainer(containerClasses.inputContainer)
    const examDateInputContainer = createContainer(containerClasses.relativeContainer)
    const examDateIconContainer = createContainer(containerClasses.iconContainer)
    
    // date issued
    const issueDateContainer = createContainer(containerClasses.inputContainer)
    const issueDateIconContainer = createContainer(containerClasses.iconContainer)
    const issueDateInputContainer = createContainer(containerClasses.relativeContainer)

    const delButton = createDelButton(['del-button'])
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-exam'))

    const calendarIcon = createCalendarIcon()

    examNameInput.addEventListener('keyup', () => setTitleText({ input: examNameInput, titleId: `civil-title-${totalEntry + 1}`, defaultText: 'Civil Service Entry' }))

    initDatePicker([examDateInput, issueDateInput])

    // appends the elements to containers
    appendChildren(titleContainer, [title, delButton])
    appendChildren(examNameContainer, [examNameLabel, examNameInput])
    appendChildren(ratingContainer, [ratingLabel, ratingInput])

    appendChildren(examDateIconContainer, [calendarIcon])
    appendChildren(examDateInputContainer, [examDateIconContainer, examDateInput])
    appendChildren(examDateContainer, [examDateLabel, examDateInputContainer])

    appendChildren(examPlaceContainer, [examPlaceLabel, examPlaceInput])
    appendChildren(licenseNumContainer, [licenseNumLabel, licenseNumInput])

    appendChildren(issueDateIconContainer, [calendarIcon.cloneNode(true)])
    appendChildren(issueDateInputContainer, [issueDateIconContainer, issueDateInput])
    appendChildren(issueDateContainer, [issueDateLabel, issueDateInputContainer])

    appendChildren(civilEntry, [titleContainer, examNameContainer, ratingContainer, examDateContainer, examPlaceContainer, licenseNumContainer, issueDateContainer])

    appendChildren(entryContainer, [civilEntry])
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

    const titleContainer = createContainer(containerClasses.titleContainer)
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-work'))

    appendChildren(titleContainer, [title, delButton])

    const positionContainer = createContainer(containerClasses.inputContainerSpan2)
    positionInput.addEventListener('keyup', () => setTitleText({input: positionInput, titleId: `work-title-${totalEntry + 1}`, defaultText: 'Work Experience Entry'}))

    appendChildren(positionContainer, [positionLabel, positionInput])

    const departmentContainer = createContainer(containerClasses.inputContainerSpan3)
    appendChildren(departmentContainer, [departmentLabel, departmentInput])

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
    initSalaryGrade(gradeSelect)
    const salaryGradeContainer = createContainer(containerClasses.inputContainer)
    const salarySelectContainer = createContainer(containerClasses.selectContainer)
    
    appendChildren(salarySelectContainer, [gradeSelect, gradeSelectLabel])
    appendChildren(salaryGradeContainer, [salaryGradeLabel, salarySelectContainer])

    // salary step
    initSalaryStep(stepSelect)
    const salaryStepContainer = createContainer(containerClasses.inputContainer)
    const stepSelectContainer = createContainer(containerClasses.selectContainer)

    appendChildren(stepSelectContainer, [stepSelect, stepSelectLabel])
    appendChildren(salaryStepContainer, [salaryStepLabel, stepSelectContainer])


    // appointment status

    // government service

    
    appendChildren(workEntry, [
        titleContainer,
        positionContainer,
        departmentContainer,
        salaryContainer,
        startDateContainer,
        endDateContainer,
        salaryGradeContainer,
        salaryStepContainer
    ])

    appendChildren(entryContainer, [workEntry])
}

export { addNewChildEntry, addNewCivilEntry, addNewWorkEntry }
