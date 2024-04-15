import { initDatePicker } from "./component-init.js"
import { appendChildren, createCalendarIcon, createCaption, createContainer, createDelButton, createInput, createInputAttributes } from "./element-builder.js"
import { childInputData, civilCaptionData, civilInputData, containerClasses, workCaptionData, workInputData } from "./form-config.js"
import { deleteEntry, setTitleText, totalDataEntry } from "./helper-functions.js"
import { selectById } from "./utilities.js"

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

    const labels = civilCaptionData.map((captionAttributes) => createCaption(captionAttributes))

    const titleLabel = createCaption({type: 'h2', classes:['text-lg', 'font-semibold'], id: `civil-title-${totalEntry + 1}`, text: 'Civil Service Entry'})
    labels.unshift(titleLabel)

    const [title, examNameLabel, ratingLabel, examDateLabel, examPlaceLabel, licenseNumLabel, issueDateLabel] = labels

    const civilEntry = createContainer(containerClasses.civilContainer, 'data-exam')
    const titleContainer = createContainer(containerClasses.titleContainer)
    const examNameContainer = createContainer(containerClasses.inputContainerSpan)
    const ratingContainer = createContainer(containerClasses.inputContainer)
    const examDateContainer = createContainer(containerClasses.inputContainer)
    const examPlaceContainer = createContainer(containerClasses.inputContainerSpan)
    const licenseNumContainer = createContainer(containerClasses.inputContainer)
    const examDateIconContainer = createContainer(containerClasses.iconContainer)
    const issueDateContainer = createContainer(containerClasses.inputContainer)
    const issueDateInputContainer = createContainer(containerClasses.relativeContainer)
    const issueDateIconContainer = createContainer(containerClasses.iconContainer)
    const examDateInputContainer = createContainer(containerClasses.relativeContainer)

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

function addNewWorkEntry(){
    const entryContainer = selectById('work-container')
    const totalEntry = totalDataEntry(entryContainer, 'data-work');
    
    const inputs = workInputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [positionInput, departmentInput, salaryInput, startDateInput, endDateInput] = inputs

    const labels = workCaptionData.map((captionAttributes) => createCaption(captionAttributes))

    const titleLabel = createCaption({type: 'h2', classes:['text-lg', 'font-semibold'], id: `work-title-${totalEntry + 1}`, text: 'Work Experience Entry'})
    labels.unshift(titleLabel)

    // to be continued tomorrow
}

export { addNewChildEntry, addNewCivilEntry, addNewWorkEntry }