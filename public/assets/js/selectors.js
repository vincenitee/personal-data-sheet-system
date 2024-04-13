import './selectorUtils.js'
import { selectAllSibling } from './selectorUtils.js'

export const confirmDialog = select('#delete-dialog')
export const multiStepForm = select('[data-multi-step]')
export const nextBtn = select('#next-btn')
export const prevBtn = select('#prev-btn')
export const addChildBtn = select('#add-child')
export const yearDropdowns = selectAll('.year')
export const addCivilBtn = select('#add-civil-entry')
export const formSteps = Array.from(selectAllSibling(multiStepForm, '[data-step]'))
