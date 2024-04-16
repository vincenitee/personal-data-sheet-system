export const initYearDropDown = (dropdown) => {
    const startYear = 1924;
    const currentYear = new Date().getFullYear();
    for (let year = currentYear; year >= startYear; year--) {
        dropdown.add(new Option(year, year));
    }
};

export const initSalaryGrade = (dropdown) => {
    const maxGrade = 33;
    for (let grade = 0; grade <= maxGrade; grade++) {
        if(grade === 0) dropdown.add(new Option('', ''))
        dropdown.add(new Option(grade, grade));
    }
};

export const initSalaryStep = (dropdown) => {
    const maxStep = 8;
    for (let step = 0; step <= maxStep; step++) {
        if(step === 0) dropdown.add(new Option('', ''))
        dropdown.add(new Option(step, step));
    }
};

export const initDatePicker = (inputElement) => {
    if (Array.isArray(inputElement)) {
        inputElement.forEach((element) => flatpickr(element, { dateFormat: 'm-d-Y' }));
    } else {
        flatpickr(inputElement, { dateFormat: 'm-d-Y' });
    }
};

