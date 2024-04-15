import { yearDropdowns, dateInputs, salaryGradeDropdown, salaryStepDropdown } from './assets/js/dom-selection.js'

import { initYearDropDown, initSalaryGrade, initSalaryStep, initDatePicker } from './assets/js/component-init.js'

import setupEventHandlers from './assets/js/event-handlers.js'

setupEventHandlers()

salaryStepDropdown.forEach(initSalaryStep)
salaryGradeDropdown.forEach(initSalaryGrade)
yearDropdowns.forEach(initYearDropDown)
dateInputs.forEach(initDatePicker)


