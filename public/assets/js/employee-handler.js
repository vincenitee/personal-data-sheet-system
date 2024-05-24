import { deleteEmployee } from './api.js'
import { actionButtons, clearSearchBtn, searchInput } from './employee-element.js'

const addEventHandler = () => {
    actionButtons.forEach((button) => {
        const action = button.getAttribute('data-action')
        const empId = button.getAttribute('data-emp-id')

        switch (action) {
            case 'edit':
                button.addEventListener('click', () => {
                    const empId = button.closest('tr').dataset.employeeId
                    window.location = `../public/edit_form.php?empId=${empId}`
                })
                break

            case 'delete':
                button.addEventListener('click', () => {
                    deleteEmployee(empId)
                })
                break

            case 'print':
                break
        }
    })

    clearSearchBtn.addEventListener('click', () => {
        searchInput.value = ''
    })
}


export { addEventHandler }
