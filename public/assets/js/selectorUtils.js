export const select = (selector) => document.querySelector(selector);
export const selectAll = (selector) => document.querySelectorAll(selector);
export const selectSiblingById = (container, selectorId) => container.getElementById(selectorId);
export const selectAllSibling = (container, selector) => container.querySelectorAll(selector);