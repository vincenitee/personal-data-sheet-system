import { yearDropdowns, dateInputs, salaryGradeDropdown, salaryStepDropdown, appointmentStatusDropdown, trainingDropdown } from './dom-selection.js'

import { initDropdown, initDatePicker } from './component-init.js'

import setupEventHandlers from './event-handlers.js'

setupEventHandlers()

yearDropdowns.forEach((dropdown) => initDropdown(dropdown, 'year'))
dateInputs.forEach(initDatePicker)

initDropdown(appointmentStatusDropdown, 'appointmentStatus')
initDropdown(salaryStepDropdown, 'salaryStep')
initDropdown(salaryGradeDropdown, 'salaryGrade')
initDropdown(trainingDropdown, 'trainingType')