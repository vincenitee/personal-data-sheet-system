import { deleteEmployee } from './api.js'
import { deleteButtons } from './employee-elements.js'
import { hideExtraNav } from './employee-util.js'

window.addEventListener('load', hideExtraNav)

deleteButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const container = button.closest('tr')
        const emp_id = container.dataset.employeeId
        deleteEmployee(emp_id)
    })
})
