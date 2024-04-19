import { yearDropdowns, dateInputs, salaryGradeDropdown, salaryStepDropdown, appointmentStatusDropdown, trainingDropdown } from './assets/js/dom-selection.js'

import { initDropdown, initDatePicker } from './assets/js/component-init.js'

import setupEventHandlers from './assets/js/event-handlers.js'

setupEventHandlers()

yearDropdowns.forEach((dropdown) => initDropdown(dropdown, 'year'))
dateInputs.forEach(initDatePicker)

initDropdown(appointmentStatusDropdown, 'appointmentStatus')
initDropdown(salaryStepDropdown, 'salaryStep')
initDropdown(salaryGradeDropdown, 'salaryGrade')
initDropdown(trainingDropdown, 'trainingType')