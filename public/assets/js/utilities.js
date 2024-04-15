export function select(selector){
    return document.querySelector(selector)
}

export function selectAll(selector){
    return document.querySelectorAll(selector)
}

export function selectById(elementId){
    return document.getElementById(elementId)
}

export function selectByClass(elementClass){
    return [...document.getElementsByClassName(elementClass)]
}

export function selectSibling(container, child){
    return container.querySelector(child)
}

export function selectAllSibling(container, child){
    return [...container.querySelectorAll(`[${child}]`)]
}