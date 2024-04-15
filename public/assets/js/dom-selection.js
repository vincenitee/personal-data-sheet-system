import { select, selectAllSibling, selectByClass, selectById, selectSibling } from './utilities.js'

const confirmDialog = selectById('delete-dialog')
const multiStepForm = select('[data-multi-step]')
const nextBtn = selectById('next-btn')
const prevBtn = selectById('prev-btn')
const addChildBtn = selectById('add-child')
const addCivilBtn = selectById('add-civil-entry')
const addWorkBtn = selectById('add-work-entry')
const yearDropdowns = selectByClass('year')
const positionInput = selectById('position-1')
const examInput = selectById('exam-name-1');
const formSteps = selectAllSibling(multiStepForm, 'data-step')
const dateInputs = selectByClass('date-inputbox')
const salaryGradeDropdown = selectByClass('salary-grade')
const salaryStepDropdown = selectByClass('salary-step')
const civilInitalDeleteButton = selectSibling(selectById('exam-container'), 'button')
const workInitalDeleteButton = selectSibling(selectById('work-container'), 'button')

const initialTitle = [
    { input: selectById('position-1'), titleId: 'work-title-1', defaultText: 'Work Experience Entry' },
    { input: selectById('exam-name-1'), titleId: 'civil-title-1', defaultText: 'Civil Service Entry' },
]

const parentAttributes = ['data-exam', 'data-work']
const firstDelButtons = [civilInitalDeleteButton, workInitalDeleteButton]
const initialInput = [positionInput, examInput]

export {
    confirmDialog,
    multiStepForm,
    nextBtn,
    prevBtn,
    addChildBtn,
    addCivilBtn,
    addWorkBtn,
    yearDropdowns,
    formSteps,
    dateInputs,
    salaryGradeDropdown,
    salaryStepDropdown,
    initialTitle,
    initialInput,
    parentAttributes,
    firstDelButtons
};