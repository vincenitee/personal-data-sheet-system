import { selectById } from "./dom-util.js"

function hideExtraNav(){
    const formNav = selectById('form-steps')
    formNav.classList.add('hidden');
}

export { hideExtraNav }
