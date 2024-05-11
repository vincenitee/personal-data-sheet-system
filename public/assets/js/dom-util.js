function select(selector){
    return document.querySelector(selector)
}

function selectAll(selector){
    return document.querySelectorAll(selector)
}

function selectSiblingByClass(container, childClass){
    return [...container.getElementsByClassName(childClass)]
}

function selectById(elementId){
    return document.getElementById(elementId)
}

function selectByClass(elementClass){
    return [...document.getElementsByClassName(elementClass)]
}

function selectSibling(container, child){
    return container.querySelector(child)
}

function selectAllSibling(container, child){
    return [...container.querySelectorAll(`[${child}]`)]
}

export { select, selectAll, selectSiblingByClass, selectById, selectByClass, selectSibling, selectAllSibling }
