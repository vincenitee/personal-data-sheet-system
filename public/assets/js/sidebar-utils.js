import { sidebar } from "./sidebar-element.js"

function setActiveItem(item){
    const currentActiveItem = sidebar.querySelector('.sidebar-item-active')
    if(currentActiveItem){
        currentActiveItem.classList.remove('sidebar-item-active')
    }

    item.classList.add('sidebar-item-active')

    localStorage.setItem('activeItem', item.id)
}

function initActiveItem(){
    const activeItemId = localStorage.getItem('activeItem')
    if(activeItemId){
        const activeItem = sidebar.querySelector(`#${activeItemId}`)
        if(activeItem) setActiveItem(activeItem)
    }
}

function handleOutsideClick(event){
    if(sidebar.contains(event.target)){
        sidebar.classList.add('-translate-x-full')
    }
}
export { initActiveItem, setActiveItem, handleOutsideClick }