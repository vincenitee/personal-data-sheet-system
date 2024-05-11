import { closeSidebarBtn, openSidebarBtn, sidebar } from "./sidebar-element.js"

openSidebarBtn.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full')
})

closeSidebarBtn.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full')
})
