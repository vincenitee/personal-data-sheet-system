import { createLabelObj } from './element-builder.js'

const containerClasses = {
    workContainer: ['grid', 'grid-cols-6', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    childContainer: ['grid', 'grid-cols-mod-3', 'gap-3'],
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

const selectCaptionClass = ['pointer-events-none', 'absolute', 'inset-x-2', 'inset-y-2.5', 'text-gray-500', 'transition-all', 'duration-100', 'ease-in', 'group-focus-within:inset-y-1', 'group-focus-within:text-xs']

const civilLabels = ['Examination Name', 'Ratings', 'Date of Examination', 'Place of Examination', 'License Number', 'Date of Issuance'];

const workInputLabels = ['Position/Title', 'Department/Agency', 'Monthly Salary', 'Start Date', 'End Date', 'Salary Grade', 'Salary Step', 'Status of Appointment', 'Government Service'];

const workSelectLabels = ['Select Grade', 'Select Step', 'Select Status', 'Select'];

const civilCaptions = civilLabels.map((text) => createLabelObj(inputCaptionClass, text));

const workInputCaptions = workInputLabels.map((text) => createLabelObj(inputCaptionClass, text));

const workSelectCaptions = workSelectLabels.map((text) => createLabelObj(selectCaptionClass, text));

const childInputData = [
    { type: 'text', namePrefix: 'child-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'child-bdate', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
]

const civilInputData = [
    { type: 'text', namePrefix: 'exam-name', classes: 'inputbox', autocomplete: 'off' },
    { type: 'number', namePrefix: 'exam-rating', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'exam-date', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
    { type: 'text', namePrefix: 'exam-place', classes: 'inputbox', autocomplete: 'off' },
    { type: 'number', namePrefix: 'license-number', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'issue-date', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' },
]

const workInputData = [
    { type: 'text', namePrefix: 'position', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'agency', classes: 'inputbox', autocomplete: 'off' },
    { type: 'number', namePrefix: 'salary', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'start-date', classes: 'date-inputbox', autocomplete: 'off', placeholder: 'Select Date' },
    { type: 'text', namePrefix: 'end-date', classes: 'date-inputbox', autocomplete: 'off' , placeholder: 'Select Date'},
]

const workSelectData = ['salary-grade', 'salary-step', 'appointment-status', 'government-service']

export { containerClasses, childInputData, civilInputData, civilCaptions, inputCaptionClass, workInputCaptions, workSelectCaptions, workSelectData, workInputData }
