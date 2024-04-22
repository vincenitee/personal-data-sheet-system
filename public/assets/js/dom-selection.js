import { select, selectAllSibling, selectByClass, selectById, selectSibling } from './utilities.js'

const multiStepForm = select('[data-multi-step]')
const menuContainer = selectById('menu-container');
const nextBtn = selectById('next-btn')
const prevBtn = selectById('prev-btn')

const addChildBtn = selectById('add-child')
const addCivilBtn = selectById('add-civil-entry')
const addWorkBtn = selectById('add-work-entry')
const addWorkVolBtn = selectById('add-work-vol-entry')
const addTrainingBtn = selectById('add-training-entry')
const addSkillBtn = selectById('add-skill-entry')
const addRecogBtn = selectById('add-recognition-entry')
const addOrgBtn = selectById('add-org-entry')
const addRefBtn = selectById('add-reference-entry')

const yearDropdowns = selectByClass('year')
const positionInput = selectById('position-1')
const examInput = selectById('exam-name-1')
const orgNameInput = selectById('org-name-1')
const trainingNameInput = selectById('training-name-1')
const formSteps = selectAllSibling(multiStepForm, 'data-step')
const menuSteps = selectAllSibling(menuContainer, 'data-item')
const dateInputs = selectByClass('date-inputbox')
const salaryGradeDropdown = selectById('salary-grade-1')
const salaryStepDropdown = selectById('salary-step-1')
const appointmentStatusDropdown = selectById('appointment-status-1')
const trainingDropdown = selectById('training-type-1');

const initialInput = [
    { input: positionInput, titleId: 'work-title-1', defaultText: 'Work Experience Entry' },
    { input: examInput, titleId: 'civil-title-1', defaultText: 'Civil Service Entry' },
    { input: orgNameInput, titleId: 'work-vol-title-1', defaultText: 'Voluntary Work Experience'},
    { input: trainingNameInput, titleId: 'training-title-1', defaultText: 'Learning and Developement Entry'},
    
]

const parentAttributes = ['data-child', 'data-exam', 'data-work', 'data-work-vol', 'data-training', 'data-skill', 'data-recognition', 'data-membership', 'data-reference']

const firstDelButtons = [
    selectSibling(selectById('children-container'), 'button'),
    selectSibling(selectById('exam-container'), 'button'), 
    selectSibling(selectById('work-container'), 'button'), 
    selectSibling(selectById('work-vol-container'), 'button'),
    selectSibling(selectById('training-container'), 'button'),
    selectSibling(selectById('skill-container'), 'button'),
    selectSibling(selectById('recognition-container'), 'button'),
    selectSibling(selectById('membership-container'), 'button'),
    selectSibling(selectById('reference-container'), 'button')
]

const provinceSelect = [
    selectById('res-province'),
    selectById('permanent-province')
]

const municipalitySelect = [
    selectById('res-municipality'),
    selectById('permanent-municipality')
]

const baranggaySelect = [
    selectById('res-brgy'),
    selectById('permanent-brgy')
]

export {
    multiStepForm,
    menuContainer,
    nextBtn,
    prevBtn,
    addChildBtn,
    addCivilBtn,
    addWorkVolBtn,
    addWorkBtn,
    addSkillBtn,
    addRecogBtn,
    addOrgBtn,
    addRefBtn,
    yearDropdowns,
    formSteps,
    menuSteps,
    dateInputs,
    salaryGradeDropdown,
    salaryStepDropdown,
    initialInput,
    parentAttributes,
    firstDelButtons,
    appointmentStatusDropdown,
    addTrainingBtn,
    trainingDropdown,
    provinceSelect,
    municipalitySelect,
    baranggaySelect,
};