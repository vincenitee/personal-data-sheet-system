const select = (element) => document.querySelector(element);
const confirmDialog = select('#delete-dialog');
const deleteBtn = select('#confirm-delete');

function deleteEntry(entryName, button) {
    var entry = button.closest(`.${entryName}`);
    if (entry) {
        
        confirmDialog.showModal();
        deleteBtn.addEventListener('click', function() {
            entry.remove();

            confirmDialog.close();
        });
    }
}

function closeDialog(){
    confirmDialog.close();
}

