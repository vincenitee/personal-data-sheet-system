const select = (element) => document.querySelector(element);
const selectAll = (element) => document.querySelectorAll(element);
const confirmDialog = select('#delete-dialog');
const multiStepForm = select('[data-multi-step]');
const formSteps = Array.from(multiStepForm.querySelectorAll('[data-step]'));
const nextBtns = selectAll('[data-next]');
const prevBtns = selectAll('[data-prev]');
const addChildBtn = select('#add-child');
const yearDropdowns = selectAll('.year');
yearDropdowns.forEach(dropdown => initYearDropDown(dropdown));
const initDatePicker = (inputElement) => flatpickr(inputElement, { dateFormat: 'm-d-Y' });
const dateInputs = selectAll('.date-inputbox');
dateInputs.forEach(dateInput => {initDatePicker(dateInput)});

let currentStep = formSteps.findIndex((step) => !step.classList.contains('hidden'));
if (currentStep < 0) {
    currentStep = 0;
    formSteps[currentStep].classList.toggle('hidden');
}

const showCurrentStep = () => formSteps.forEach((step, index) => {
    index === currentStep ? step.classList.remove('hidden') : step.classList.add('hidden');
});

nextBtns.forEach((button) => button.addEventListener('click', () => { currentStep += 1; showCurrentStep(); }));
prevBtns.forEach((button) => button.addEventListener('click', () => { currentStep -= 1; showCurrentStep(); }));

addChildBtn.addEventListener('click', () => {
    const icon = `<svg class="h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>`;
    const totalEntry = totalDataEntries('children-container', 'data-child');
    const childEntry = createContainer(['grid', 'grid-cols-mod-3', 'gap-3'], 'data-child');
    const childNameInput = createInput({ type: 'text', name: `child-name-${totalEntry + 1}`, id: `child-name-${totalEntry + 1}`, className: 'inputbox', autocomplete: 'off' });
    const dateInputContainer = createContainer(['relative']);
    const iconContainer = createContainer(['pointer-events-none', 'absolute', 'inset-y-0', 'flex', 'items-center', 'ps-3.5']);
    const childBdateInput = createInput({ type: 'text', name: `child-bdate-${totalEntry + 1}`, id: `child-name-${totalEntry + 1}`, className: 'date-inputbox', autocomplete: 'off', placeholder: 'Select date' });

    iconContainer.innerHTML = icon;
    dateInputContainer.appendChild(iconContainer);
    childEntry.appendChild(childNameInput);
    childEntry.appendChild(dateInputContainer);
    initDatePicker(childBdateInput);
    dateInputContainer.appendChild(childBdateInput);
    const delButton = createDelButton('del-button');

    delButton.addEventListener('click', () => deleteEntry(delButton, 'data-child'));
    childEntry.appendChild(delButton);
    document.getElementById('children-container').appendChild(childEntry);
});

function initYearDropDown(dropdown) {
    const startYear = 1924;
    const currentYear = new Date().getFullYear();

    for (let year = currentYear; year >= startYear; year--) {
        dropdown.add(new Option(year, year));
    }
}


function createInput(attributes) {
    const input = document.createElement('input');
    Object.assign(input, attributes);
    return input;
}

function createContainer(classNames, attribute) {
    const container = document.createElement('div');
    container.classList.add(...classNames);
    if (attribute) container.setAttribute(attribute, '');
    return container;
}

function createDelButton(className) {
    const icon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>`;

    const button = document.createElement('button');
    button.type = 'button';
    button.className = className;
    button.innerHTML = icon;
    return button;
}

function deleteEntry(button, parentAttribute) {
    const parentEntry = button.closest(`[${parentAttribute}]`);
    parentEntry.remove();
}

function totalDataEntries(containerId, dataEntry) {
    const container = document.getElementById(containerId);
    return [...container.querySelectorAll(`[${dataEntry}]`)].length;
}
