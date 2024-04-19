export const initDropdown = (dropdown, type) => {
    switch (type) {
        case 'year':
            const startYear = 1924
            const currentYear = new Date().getFullYear()
            for (let year = currentYear; year >= startYear; year--) {
                dropdown.add(new Option(year, year))
            }
            break
        case 'salaryGrade':
            [0, ...Array.from({ length: 33 }, (_, i) => i + 1)].forEach((grade) => {
                dropdown.add(new Option(grade === 0 ? '' : grade, grade === 0 ? '' : grade));
            })
            break
        case 'salaryStep':
            [0, ...Array.from({ length: 8 }, (_, i) => i + 1)].forEach((step) => {
                dropdown.add(new Option(step === 0 ? '' : step, step === 0 ? '' : step))
            })
            break
        case 'appointmentStatus':
            ['', 'Permanent', 'Contractual', 'Casual', 'Temporary'].forEach((status) => {
                dropdown.add(new Option(status, status))
            })
            break
        case 'governmentService':
            ['', 'Yes', 'No'].forEach((status) => {
                dropdown.add(new Option(status, status))
            })
            break

        case 'trainingType':
            ['', 'Managerial', 'Supervisory', 'Technical', 'Foundation'].forEach((type) => {
                dropdown.add(new Option(type, type))
            })
            break
            
        default:
            console.error('Unknown dropdown type:', type)
    }
}

export const initDatePicker = (inputElement) => {
    if (Array.isArray(inputElement)) {
        inputElement.forEach((element) => flatpickr(element, { dateFormat: 'm-d-Y' }))
    } else {
        flatpickr(inputElement, { dateFormat: 'm-d-Y' })
    }
}
