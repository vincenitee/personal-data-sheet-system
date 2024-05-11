import { select, selectAllSibling, selectByClass, selectById, selectSibling } from "./dom-util.js"

const form = select('form')
const currentDateIndicator = selectById('date-accomplished')
const copyAddress = selectById('copy-address')

const childTotalEntry = selectById('child-total-entry')
const civilTotalEntry = selectById('cs-total-entry')
const workExpTotalEntry = selectById('work-exp-total')
const learningDevTotalEntry = selectById('learning-development-total')
const volWorkExpTotalEntry = selectById('voluntary-work-total')
const skillTotalEntry = selectById('skills-total-entry')
const recognitionTotalEntry = selectById('recognition-total-entry')
const membershipTotalEntry = selectById('membership-total-entry')
const referencesTotalEntry = select('reference-total-entry')

const multiStepForm = select('[data-multi-step]')
const menuContainer = selectById('menu-container')
const nextBtn = selectById('next-btn')
const prevBtn = selectById('prev-btn')
const submitBtn = selectById('submit-btn')

const missingInfoDialog = selectById('missing-info-dialog')
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
const trainingDropdown = selectById('training-type-1')
const nationalityDropdown = selectById('nationality')
const provinceSelects = [selectById('res-province'), selectById('permanent-province')]

const residentialAddress = [selectById('res-house-no'), selectById('res-street'), selectById('res-village'), selectById('res-province'), selectById('res-municipality'), selectById('res-brgy'), selectById('res-zip')]

const permanentAddress = [selectById('permanent-house-no'), selectById('permanent-street'), selectById('permanent-village'), selectById('permanent-province'), selectById('permanent-municipality'), selectById('permanent-brgy'), selectById('permanent-zip')]

const optionalFields = [selectById('gsis-id'), selectById('pagibig-id'), selectById('philhealth-id'), selectById('sss-id'), selectById('tin-id'), selectById('agency-no'), selectById('spouse-firstname'), selectById('spouse-middlename'), selectById('spouse-surname'), selectById('spouse-occupation'), selectById('spouse-business'), selectById('business-addr'), selectById('spouse-telno'), selectById('elementary-highest-unit'), selectById('secondary-highest-unit'), selectById('vocational-highest-unit'), selectById('college-highest-unit'), selectById('graduate-highest-unit'), selectById('gov-id-issuance-place'), selectById('gov-issued-id'), selectById('gov-issued-id-no')]

const initialInputs = [
    { input: positionInput, titleId: 'work-title-1', defaultText: 'Work Experience Entry' },
    { input: examInput, titleId: 'civil-title-1', defaultText: 'Civil Service Entry' },
    { input: orgNameInput, titleId: 'work-vol-title-1', defaultText: 'Voluntary Work Experience' },
    { input: trainingNameInput, titleId: 'training-title-1', defaultText: 'Learning and Developement Entry' },
]

const parentAttributes = ['data-child', 'data-exam', 'data-work', 'data-work-vol', 'data-training', 'data-skill', 'data-recognition', 'data-membership', 'data-reference']

const initialDelButtons = [selectSibling(selectById('children-container'), 'button'), selectSibling(selectById('exam-container'), 'button'), selectSibling(selectById('work-container'), 'button'), selectSibling(selectById('work-vol-container'), 'button'), selectSibling(selectById('training-container'), 'button'), selectSibling(selectById('skill-container'), 'button'), selectSibling(selectById('recognition-container'), 'button'), selectSibling(selectById('membership-container'), 'button'), selectSibling(selectById('reference-container'), 'button')]

const provinceSelect = [selectById('res-province'), selectById('permanent-province')]

const municipalitySelect = [selectById('res-municipality'), selectById('permanent-municipality')]

const baranggaySelect = [selectById('res-brgy'), selectById('permanent-brgy')]

export { form, currentDateIndicator, copyAddress, childTotalEntry, civilTotalEntry, workExpTotalEntry, learningDevTotalEntry, volWorkExpTotalEntry, skillTotalEntry, recognitionTotalEntry, membershipTotalEntry, referencesTotalEntry, multiStepForm, menuContainer, nextBtn, prevBtn, submitBtn, missingInfoDialog, addChildBtn, addCivilBtn, addWorkBtn, addWorkVolBtn, addTrainingBtn, addSkillBtn, addRecogBtn, addOrgBtn, addRefBtn, yearDropdowns, positionInput, examInput, orgNameInput, trainingNameInput, formSteps, menuSteps, dateInputs, salaryGradeDropdown, salaryStepDropdown, appointmentStatusDropdown, trainingDropdown, nationalityDropdown, provinceSelects, residentialAddress, permanentAddress, optionalFields, initialInputs, parentAttributes, initialDelButtons, provinceSelect, municipalitySelect, baranggaySelect }
