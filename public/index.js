const delButtons = document.querySelectorAll('.del-button');
const civilContainer = document.querySelector('#civil-container');
        console.log(civilContainer)
delButtons.forEach(button => {
    button.addEventListener('click', () => {
        const entry = button.closest('.civil-entry');
        civilContainer.removeChild(entry);
    })
})