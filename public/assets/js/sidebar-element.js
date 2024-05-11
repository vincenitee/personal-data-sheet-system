import { select, selectById } from "./dom-util.js"

const openSidebarBtn = selectById('open-sidebar')
const closeSidebarBtn = selectById('close-sidebar')
const sidebar = select('aside')

export { openSidebarBtn, closeSidebarBtn, sidebar }