import { closeSidebarBtn, openSidebarBtn, sidebar, sidebarItems } from './sidebar-element.js'
import { initActiveItem, setActiveItem } from './sidebar-utils.js'

openSidebarBtn.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full')
})

closeSidebarBtn.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full')
})

sidebarItems.forEach((item) => {
    item.addEventListener('click', () => {
        setActiveItem(item)
    })
})

window.addEventListener('load', () => {
    initActiveItem()
})

document.addEventListener('click', (event) => {
    if (!sidebar.contains(event.target) & !openSidebarBtn.contains(event.target)) {
        sidebar.classList.add('-translate-x-full')
    }
})
