import { errorContent, errorDialog, errorTitle } from "./form-element.js"

function addFileInputChangeListener(fileInput) {
    if (!fileInput) {
        console.error('Input not found.')
        return
    }

    fileInput.addEventListener('change', () => {
        var acceptedTypes = ['image/png', 'image/jpeg']

        if (!acceptedTypes.includes(fileInput.files[0].type)) {
            const dialogContent = {
                dialog: errorDialog,
                titleContainer: errorTitle,
                title: 'Invalid File Type',
                contentContainer: errorContent,
                content: 'Please select a PNG or JPEG image file.',
            }
            populateAndDisplayDialog(dialogContent)
            fileInput.value = ''
        }
    })
}

function populateAndDisplayDialog(dialogContent) {
    const { dialog, titleContainer, title, contentContainer, content } = dialogContent
    titleContainer.innerHTML = title
    contentContainer.innerHTML = content
    dialog.showModal()
}

export { addFileInputChangeListener, populateAndDisplayDialog }
