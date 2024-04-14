// DOM elements selection
const select = (element) => document.querySelector(element)
const selectAll = (element) => document.querySelectorAll(element)
const confirmDialog = select('#delete-dialog')
const multiStepForm = select('[data-multi-step]')
const nextBtn = select('#next-btn')
const prevBtn = select('#prev-btn')
const addChildBtn = select('#add-child')
const yearDropdowns = selectAll('.year')
const addCivilBtn = select('#add-civil-entry')
const formSteps = Array.from(multiStepForm.querySelectorAll('[data-step]'))

// Initialize dropdowns and date pickers
yearDropdowns.forEach(initYearDropDown)
const dateInputs = selectAll('.date-inputbox')
dateInputs.forEach(initDatePicker)

// Initialize current step
let currentStep = formSteps.findIndex((step) => !step.classList.contains('hidden'))

// Event listeners
nextBtn.addEventListener('click', () => changeStep(1))
prevBtn.addEventListener('click', () => changeStep(-1))
addChildBtn.addEventListener('click', () => addNewChildEntry())
addCivilBtn.addEventListener('click', () => addNewCivilEntry())

// Functions
function initYearDropDown(dropdown) {
    const startYear = 1924
    const currentYear = new Date().getFullYear()

    for (let year = currentYear; year >= startYear; year--) {
        dropdown.add(new Option(year, year))
    }
}

function initDatePicker(inputElement) {
    Array.isArray(inputElement) ? inputElement.forEach((element) => flatpickr(element, { dateFormat: 'm-d-Y' })) : flatpickr(inputElement, { dateFormat: 'm-d-Y' })
}

function changeStep(stepChange) {
    currentStep += stepChange
    showCurrentStep()
}

function showCurrentStep() {
    formSteps.forEach((step, index) => {
        index === currentStep ? step.classList.remove('hidden') : step.classList.add('hidden')
    })

    const isFirstStep = currentStep === 0
    prevBtn.classList.toggle('cursor-not-allowed', isFirstStep)
    prevBtn.classList.toggle('opacity-50', isFirstStep)
    prevBtn.disabled = isFirstStep
}

// form entry functions
function addNewChildEntry() {
    const entryContainer = select('#children-container')
    const totalEntry = totalDataEntries('children-container', 'data-child')

    const containerClasses = {
        mainContainer: ['grid', 'grid-cols-mod-3', 'gap-3'],
        relativeContainer: ['relative'],
        iconContainer: ['pointer-events-none', 'absolute', 'inset-y-0', 'flex', 'items-center', 'ps-3.5'],
    }

    const inputData = [
        { type: 'text', namePrefix: `child-name`, className: 'inputbox', autocomplete: 'off' },
        { type: 'text', namePrefix: 'child-bdate', className: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
    ]

    // childname input type is undefined: to be fixed!!!
    const inputs = inputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [childNameInput, childBdateInput] = inputs

    const childEntry = createContainer(containerClasses.mainContainer, 'data-child')
    const childBdateInputContainer = createContainer(containerClasses.relativeContainer)
    const childBdateIconContainer = createContainer(containerClasses.iconContainer)
    const delButton = createDelButton('del-button')

    initDatePicker(childBdateInput)

    appendChildren(childBdateIconContainer, [createCalendarIcon()])
    appendChildren(childBdateInputContainer, [childBdateIconContainer])
    appendChildren(childBdateInputContainer, [childBdateInput])

    appendChildren(childEntry, [childNameInput, childBdateInputContainer, delButton])
    
    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-child'))
    entryContainer.appendChild(childEntry)
}

function addNewCivilEntry() {
    const entryContainer = select('#exam-container')
    const totalEntry = totalDataEntries('exam-container', 'data-exam')

    const captionClasses = ['block', 'text-sm', 'font-medium', 'text-gray-700']

    const containerClasses = {
        mainContainer: ['mt-3', 'grid', 'grid-cols-4', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
        titleContainer: ['col-span-full', 'flex', 'justify-between', 'p-2'],
        inputContainer: ['space-y-1'],
        inputContainerSpan: ['col-span-2', 'space-y-1'],
        relativeContainer: ['relative'],
        iconContainer: ['pointer-events-none', 'absolute', 'inset-y-0', 'flex', 'items-center', 'ps-3.5'],
    }

    const captionData = [
        {
            type: 'h2',
            classes: ['col-span-3', 'text-lg', 'font-semibold'],
            id: `title-${totalEntry + 1}`,
            text: 'Civil Service Entry',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'Examination Name',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'Ratings',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'Date of Examination',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'Place of Examination',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'License Number',
        },
        {
            type: 'label',
            classes: captionClasses,
            id: '',
            text: 'Date of Issuance',
        },
    ]

    const inputData = [
        { type: 'text', namePrefix: 'exam-name', className: 'inputbox', autocomplete: 'off' },
        { type: 'number', namePrefix: 'exam-rating', className: 'inputbox', autocomplete: 'off' },
        { type: 'text', namePrefix: 'exam-date', className: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
        { type: 'text', namePrefix: 'exam-place', className: 'inputbox', autocomplete: 'off' },
        { type: 'number', namePrefix: 'license-number', className: 'inputbox', autocomplete: 'off' },
        { type: 'text', namePrefix: 'issue-date', className: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
    ]

    const inputs = inputData.map((data) => createInput(createInputAttributes(data, totalEntry)))
    const [examNameInput, ratingInput, examDateInput, examPlaceInput, licenseNumInput, issueDateInput] = inputs

    const labels = captionData.map(({ type, classes, id, text }) => createCaption(type, classes, id, text))
    const [title, examNameLabel, ratingLabel, examDateLabel, examPlaceLabel, licenseNumLabel, issueDateLabel] = labels

    const civilEntry = createContainer(containerClasses.mainContainer, 'data-exam')
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
    examNameInput.addEventListener('keyup', () => setTitleText(examNameInput, `title-${totalEntry + 1}`))

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

    entryContainer.appendChild(civilEntry)
}

// element builder functions
function appendChildren(container, children) {
    children.forEach((child) => container.appendChild(child))
}

function createInput(attributes) {
    const { type, name, id, className, placeholder = '', autocomplete } = attributes

    const input = document.createElement('input')

    input.type = type
    input.name = name
    input.id = id
    input.className = className
    input.placeholder = placeholder
    input.autocomplete = autocomplete

    if (type === 'number') {
        input.setAttribute('min', 0)
        input.setAttribute('step', 'any')
    }

    input.setAttribute('required', '')
    return input
}

function createInputAttributes({ type, namePrefix, className, autocomplete, placeholder }, totalEntry) {
    return {
        type,
        name: `${namePrefix}-${totalEntry + 1}`,
        id: `${namePrefix}-${totalEntry + 1}`,
        className,
        autocomplete,
        placeholder,
    }
}

function createContainer(classNames, attribute = '') {
    const container = document.createElement('div')
    container.classList.add(...classNames)
    if (attribute) container.setAttribute(attribute, '')
    return container
}

function createDelButton(className) {
    const button = document.createElement('button')
    const icon = createDeleteIcon()
    button.type = 'button'
    button.className = className
    button.append(icon)
    return button
}

function createCaption(type, classNames, id = '', text) {
    const caption = document.createElement(type)
    caption.classList.add(...classNames)
    caption.id = id
    caption.textContent = text
    return caption
}

function createCalendarIcon() {
    const svgNamespace = 'http://www.w3.org/2000/svg'
    const svgElement = document.createElementNS(svgNamespace, 'svg')

    svgElement.setAttribute('xmlns', svgNamespace)
    svgElement.setAttribute('fill', 'none')
    svgElement.setAttribute('stroke', 'currentColor')
    svgElement.setAttribute('stroke-width', '1.5')
    svgElement.setAttribute('class', 'h-6 w-6 text-gray-600')
    svgElement.setAttribute('viewBox', '0 0 24 24')

    const pathElement = document.createElementNS(svgNamespace, 'path')

    pathElement.setAttribute('stroke-linecap', 'round')
    pathElement.setAttribute('stroke-linejoin', 'round')
    pathElement.setAttribute('d', 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z')
    svgElement.appendChild(pathElement)

    return svgElement
}

function createDeleteIcon() {
    const svgNamespace = 'http://www.w3.org/2000/svg'
    const svgElement = document.createElementNS(svgNamespace, 'svg')

    svgElement.setAttribute('fill', 'none')
    svgElement.setAttribute('viewBox', '0 0 24 24')
    svgElement.setAttribute('stroke-width', '2')
    svgElement.setAttribute('stroke', 'currentColor')
    svgElement.setAttribute('class', 'w-5 h-5 text-white')

    const pathElement = document.createElementNS(svgNamespace, 'path')

    pathElement.setAttribute('stroke-linecap', 'round')
    pathElement.setAttribute('stroke-linejoin', 'round')
    pathElement.setAttribute('d', 'm14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0')
    svgElement.appendChild(pathElement)

    return svgElement
}

// helper functions
function setTitleText(input, titleId) {
    const entryTitle = select(`#${titleId}`)
    console.log(entryTitle)
    entryTitle.textContent = input.value != '' ? input.value : 'Civil Service Entry'
}

function deleteEntry(button, parentAttribute) {
    const parentEntry = button.closest(`[${parentAttribute}]`)
    parentEntry.remove()
}

function totalDataEntries(containerId, dataEntry) {
    const container = document.getElementById(containerId)
    return [...container.querySelectorAll(`[${dataEntry}]`)].length
}
