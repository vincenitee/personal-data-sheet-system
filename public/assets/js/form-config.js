import { createLabelObj } from './element-builder.js'

const containerClasses = {
    referenceContainer: ['grid', 'grid-cols-mod-4', 'gap-2'],
    otherInfoContainer: ['grid', 'grid-cols-mod-2', 'gap-1'],
    trainingContainer: ['mt-3', 'grid', 'grid-cols-4', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    workVolContainer: ['mt-3', 'grid', 'grid-cols-mod-7', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    workContainer: ['mt-3', 'grid', 'grid-cols-6', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    childContainer: ['mt-3', 'grid', 'grid-cols-mod-3', 'gap-3'],
    civilContainer: ['mt-3', 'grid', 'grid-cols-4', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    titleContainer: ['col-span-full', 'flex', 'justify-between', 'p-2'],
    inputContainer: ['space-y-1'],
    inputContainerSpan2: ['col-span-2', 'space-y-1'],
    inputContainerSpan3: ['col-span-3', 'space-y-1'],
    selectContainer: ['group', 'relative'],
    relativeContainer: ['relative'],
    iconContainer: ['pointer-events-none', 'absolute', 'inset-y-0', 'flex', 'items-center', 'ps-3.5'],
}

const inputCaptionClass = ['block', 'text-sm', 'font-medium', 'text-gray-700']
const selectCaptionClass = ['pointer-events-none', 'text-sm', 'absolute', 'inset-x-2', 'inset-y-3', 'text-gray-500', 'transition-all', 'duration-100', 'ease-in', 'group-focus-within:inset-y-1', 'group-focus-within:text-xs']

// labels
const civilLabels = ['Examination Name', 'Ratings', 'Date of Examination', 'Place of Examination', 'License Number', 'Date of Issuance']

const workInputLabels = ['Position/Title', 'Department/Agency', 'Monthly Salary', 'Start Date', 'End Date', 'Salary Grade', 'Salary Step', 'Appointment Status', 'Government Service']

const workSelectLabels = ['Select Grade', 'Select Step', 'Select Status', 'Select']

const workVolInputLabels = ['Number & Address of Organization', 'Position/Nature of Work', 'Start Date', 'End Date', 'Total Hours']

const trainingInputLabels = ['Learning and Development Training Title', 'Sponsored/Conducted By', 'Start Date', 'End Date', 'Type', 'Total Hours']

const trainingSelectLabels = ['Select Type']

// captions
const civilCaptions = civilLabels.map((text) => createLabelObj(inputCaptionClass, text))

const workInputCaptions = workInputLabels.map((text) => createLabelObj(inputCaptionClass, text))

const workSelectCaptions = workSelectLabels.map((text) => createLabelObj(selectCaptionClass, text))

const workVolInputCaptions = workVolInputLabels.map((text) => createLabelObj(inputCaptionClass, text))

const trainingSelectCaptions = trainingSelectLabels.map((text) => createLabelObj(selectCaptionClass, text))

const trainingInputCaptions = trainingInputLabels.map((text) => createLabelObj(inputCaptionClass, text))

// input & select data
const childInputData = [
    { type: 'text', namePrefix: 'child-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'child-bdate', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
]

const civilInputData = [
    { type: 'text', namePrefix: 'exam-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'number', namePrefix: 'exam-rating', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'exam-date', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
    { type: 'text', namePrefix: 'exam-place', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'license-number', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'issue-date', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
]

const workInputData = [
    { type: 'text', namePrefix: 'position', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'agency', classes: 'inputbox', autocomplete: 'off' },
    { type: 'number', namePrefix: 'salary', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'work-start', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'text', namePrefix: 'work-end', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
]

const workVolInputData = [
    { type: 'text', namePrefix: 'org-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'nature-of-work', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'work-vol-start', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'text', namePrefix: 'work-vol-end', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'number', namePrefix: 'work-vol-hours', classes: 'inputbox', autocomplete: 'off' },
]

const workSelectData = ['salary-grade', 'salary-step', 'appointment-status', 'government-service']

const trainingInputData = [
    { type: 'text', namePrefix: 'training-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'training-sponsor', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'training-start', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'text', namePrefix: 'training-end', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'number', namePrefix: 'training-hours', classes: 'inputbox', autocomplete: 'off' },
]

const trainingSelectData = ['training-type']

const skillInputData = [{ type: 'text', namePrefix: 'skill', classes: 'inputbox', autocomplete: 'off' }]

const recognitionInputData = [{ type: 'text', namePrefix: 'recognition', classes: 'inputbox', autocomplete: 'off' }]

const membershipInputData = [{ type: 'text', namePrefix: 'membership', classes: 'inputbox', autocomplete: 'off' }]

const referenceInputData = [
    { type: 'text', namePrefix: 'reference-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'reference-address', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'reference-telno', classes: 'inputbox', autocomplete: 'off' },
]

export { containerClasses, childInputData, civilInputData, civilCaptions, inputCaptionClass, workInputCaptions, workSelectCaptions, workSelectData, workInputData, workVolInputCaptions, workVolInputData, trainingSelectCaptions, trainingInputCaptions, trainingInputData, trainingSelectData, skillInputData, recognitionInputData, membershipInputData, referenceInputData }
