import { select, selectById } from "./dom-util.js"

const openSidebarBtn = selectById('open-sidebar')
const closeSidebarBtn = selectById('close-sidebar')
const sidebar = select('aside')
const sidebarItems = [...sidebar.querySelectorAll('a')];

export { openSidebarBtn, closeSidebarBtn, sidebar, sidebarItems }