import { select, selectAll, selectById } from "./dom-util.js";

const actionButtons = selectAll('[data-action]')
const editDialog = select('dialog')
const closeEditDialog = selectById('close-edit-dialog')
const extraNav = selectById('form-steps')

export { actionButtons, editDialog, closeEditDialog, extraNav }