import { setMultipleAttributes } from './helper-functions.js'

const appendChildren = (container, siblings) => {
    siblings.forEach((sibling) => {
        container.appendChild(sibling)
    })
}

const createInput = (inputAttributes) => {
    const { type, name, id, className, placeholder = '', autocomplete } = inputAttributes
    const input = document.createElement('input')

    input.type = type
    input.name = name
    input.id = id
    input.className = className
    input.placeholder = placeholder
    input.autocomplete = autocomplete

    if (type === 'number') {
        input.setAttribute('min', 0)
        input.setAttribute('step', 'any')
    }

    input.setAttribute('required', '')
    return input
}

const createInputAttributes = (data, totalEntry) => ({
    type: data.type,
    name: `${data.namePrefix}-${totalEntry + 1} `,
    id: `${data.namePrefix}-${totalEntry + 1}`,
    className: data.classes,
    autocomplete: data.autocomplete,
    placeholder: data.placeholder,
})

const createSelect = (selectAttributes) => {
    const { name, id, classes } = selectAttributes
    
    const select = document.createElement('select')

    select.name = name
    select.id = id
    select.classList.add(...classes)
    select.setAttribute('required', '')

    return select
}

const createSelectAttribute = (selectName, totalEntry) => {
    const idName = `${selectName}-${totalEntry + 1}`
    return { name: idName, id: idName, classes: ['dropdown', `${selectName}`]}
}

const createContainer = (classes, dataAttribute) => {
    const container = document.createElement('div')
    classes.forEach((className) => container.classList.add(className))
    if (dataAttribute) {
        container.setAttribute(dataAttribute, '')
    }
    return container
}

const createDelButton = (className) => {
    const button = document.createElement('button')
    const icon = createDeleteIcon()

    const buttonAttribute = {
        type: 'button',
        class: className,
    }

    setMultipleAttributes(button, buttonAttribute)

    button.append(icon)

    return button
}

const createCaption = (captionAttributes) => {
    const { type, classes, id = '', text } = captionAttributes
    const label = document.createElement(type)

    label.classList.add(...classes)
    label.id = id
    label.textContent = text

    return label
}

function createLabelObj(captionClasses, text) {
    return {
        type: 'label',
        classes: captionClasses,
        id: '',
        text: text,
    }
}

function createDeleteIcon() {
    const svgNamespace = 'http://www.w3.org/2000/svg'
    const svgElement = document.createElementNS(svgNamespace, 'svg')

    const svgAttribute = {
        xmlns: svgNamespace,
        fill: 'none',
        stroke: 'currentColor',
        viewBox: '0 0 24 24',
        'stroke-width': '2',
        stoke: 'currentColor',
        class: 'w-5 h-5 tex-white',
    }

    setMultipleAttributes(svgElement, svgAttribute)

    const pathElement = document.createElementNS(svgNamespace, 'path')

    const pathAttributes = {
        'stroke-linecap': 'round',
        'stroke-linejoin': 'round',
        d: 'm14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0',
    }

    setMultipleAttributes(pathElement, pathAttributes)

    svgElement.appendChild(pathElement)

    return svgElement
}

function createCalendarIcon() {
    const svgNamespace = 'http://www.w3.org/2000/svg'
    const svgElement = document.createElementNS(svgNamespace, 'svg')

    const svgAttributes = {
        xmlns: svgNamespace,
        fill: 'none',
        stroke: 'currentColor',
        'stroke-width': '1.5',
        class: 'h-6 w-6 text-gray-600',
        viewBox: '0 0 24 24',
    }

    setMultipleAttributes(svgElement, svgAttributes)

    const pathElement = document.createElementNS(svgNamespace, 'path')

    const pathAttributes = {
        'stroke-linecap': 'round',
        'stroke-linejoin': 'round',
        d: 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0 v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z',
    }

    setMultipleAttributes(pathElement, pathAttributes)

    appendChildren(svgElement, [pathElement])

    return svgElement
}

export { appendChildren, createInput, createInputAttributes, createDelButton, createCaption, createContainer, createCalendarIcon, createLabelObj, createSelect, createSelectAttribute }
