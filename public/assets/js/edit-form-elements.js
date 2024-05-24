import { select, selectAll, selectByClass, selectById } from "./dom-util.js";

const inputs = [...selectAll('input')]
const selects = [...selectAll('select')]
const dialog = select('dialog');
const editChangeBtn = selectById('edit-changes');
const editForm = select('form')
const yearSelects = [...selectAll('.year')];
const datePickers = [...selectAll('.date-inputbox')]

export { inputs, selects, dialog, editChangeBtn, editForm, yearSelects, datePickers }  

