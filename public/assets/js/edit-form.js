import { dialog, editChangeBtn, editForm, inputs, selects } from './edit-form-elements.js'

document.addEventListener('DOMContentLoaded', () => {
    dialog.showModal()

    editChangeBtn.addEventListener('click', () => {
        submitForm()
    })
    
    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            enableSubmitButton()
        })
    })

    selects.forEach((select) => {
        select.addEventListener('change', () => {
            enableSubmitButton();
        })
    })

    document.getElementById('close-edit-dialog').addEventListener('click', () => {
        window.location = 'employee_list.php'
    })
})

function enableSubmitButton() {
    editChangeBtn.classList.remove('pointer-events-none', 'opacity-50')
}

function submitForm() {
    editForm.submit();
}
