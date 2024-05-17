import { deleteEmployee } from './api.js'
import { actionButtons, closeEditDialog, editDialog, extraNav } from './employee-element.js'

const addEventHandler = () => {
    actionButtons.forEach((button) => {
        const action = button.getAttribute('data-action')
        const empId = button.getAttribute('data-emp-id')

        switch (action) {
            case 'edit':
                button.addEventListener('click', () => {
                    editDialog.showModal()
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

    closeEditDialog.addEventListener('click', () => {
        editDialog.close()
    })
}

export { addEventHandler }
