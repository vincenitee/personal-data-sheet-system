import { select } from "./dom-util.js";

const table = select('table');
const deleteButtons = [...table.querySelectorAll('.delete-emp')]
const updateButtons = [...table.querySelectorAll('.update-emp')]
const printButtons = [...table.querySelectorAll('.print-emp')]

export { table, deleteButtons, updateButtons, printButtons }