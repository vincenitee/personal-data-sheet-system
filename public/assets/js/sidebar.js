import { closeSidebarBtn, openSidebarBtn, sidebar, sidebarItems } from "./sidebar-element.js"
import { handleOutsideClick, initActiveItem, setActiveItem } from "./sidebar-utils.js"

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

document.addEventListener('click', handleOutsideClick)

window.addEventListener('load', initActiveItem)


