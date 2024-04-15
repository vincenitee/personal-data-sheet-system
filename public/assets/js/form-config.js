import { createLabelObj } from "./element-builder.js"

const containerClasses = {
    childContainer: ['grid', 'grid-cols-mod-3', 'gap-3'],
    civilContainer: ['mt-3', 'grid', 'grid-cols-4', 'gap-3', 'border-2', 'border-dashed', 'border-gray-500', 'p-3'],
    titleContainer: ['col-span-full', 'flex', 'justify-between', 'p-2'],
    inputContainer: ['space-y-1'],
    inputContainerSpan: ['col-span-2', 'space-y-1'],
    relativeContainer: ['relative'],
    iconContainer: ['pointer-events-none', 'absolute', 'inset-y-0', 'flex', 'items-center', 'ps-3.5'],
}

const captionClasses = ['block', 'text-sm', 'font-medium', 'text-gray-700']

const civilLabelTexts = ['Examination Name', 'Ratings', 'Date of Examination', 'Place of Examination', 'License Number', 'Date of Issuance']

const workLabelText = ['Position/Title', 'Department/Agency', 'Monthly Salary', 'Start Date', 'End Date', 'Salary Grade', 'Salary Step', 'Status of Appointment', 'Government Service']

const civilCaptionData = civilLabelTexts.map((text) => createLabelObj(captionClasses, text))

const workCaptionData = workLabelText.map((text) => createLabelObj(text))

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
    { type: 'text', namePrefix: 'start-date', classes: 'inputbox', autocomplete: 'off' },
    { type: 'text', namePrefix: 'end-date', classes: 'inputbox', autocomplete: 'off' },
]

export { containerClasses, childInputData, civilInputData, civilCaptionData, captionClasses, workInputData, workCaptionData }
