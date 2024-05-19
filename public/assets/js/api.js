import { selectById } from './dom-util.js'

function fetchMunicipalities(selectedProvinceId, municipalitySelect, brgySelect) {
    var xhr = new XMLHttpRequest()
    xhr.open('GET', `../public/assets/database/fetch_municipalities.php?provinceId=${selectedProvinceId}`, true)
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            municipalitySelect.innerHTML = ''

            // console.log(xhr.responseText)

            var municipalities = JSON.parse(xhr.responseText)
            municipalities.forEach((municipality, index) => {
                municipalitySelect.appendChild(index === 0 ? new Option('', '') : new Option(municipality.municipality, municipality.municipality_id))
            })

            // After populating municipalities, trigger fetching barangays
            if (municipalities.length > 0) {
                fetchBaranggays(municipalities[0].municipality_id, brgySelect) // Assuming you have residentBarangay select element
            }
        }
    }

    xhr.send()
}

// Modified fetchBaranggays function to populate the barangay select
function fetchBaranggays(selectedMunicipalityId, brgySelect) {
    var xhr = new XMLHttpRequest()

    xhr.open('GET', `../public/assets/database/fetch_baranggays.php?municipalityId=${selectedMunicipalityId}`, true)
    xhr.onreadystatechange = () => {
        if ((xhr.readyState == 4) & (xhr.status == 200)) {
            brgySelect.innerHTML = ''

            var barangay = JSON.parse(xhr.responseText)
            barangay.forEach((brgy, index) => {
                brgySelect.appendChild(index === 0 ? new Option('', '') : new Option(brgy.brgy, brgy.brgy_id))
            })
        }
    }

    xhr.send()
}

function fetchCountries(dropdown) {
    const countrySelect = selectById('citizenship-country')
    const parentContainer = countrySelect.closest('div')

    countrySelect.innerHTML = ''

    if (dropdown.value === 'Dual Citizenship') {
        countrySelect.classList.remove('pointer-events-none')
        parentContainer.classList.remove('opacity-50')

        const xhr = new XMLHttpRequest()

        xhr.open('GET', '../public/assets/database/fetch_countries.php', true)
        xhr.onreadystatechange = () => {
            if ((xhr.readyState == 4) & (xhr.status == 200)) {
                const countries = JSON.parse(xhr.responseText)

                countries.forEach((country) => {
                    countrySelect.appendChild(new Option(country.country, country.country_id))
                })
            }
        }

        xhr.send()
    } else {
        countrySelect.classList.add('pointer-events-none')
        parentContainer.classList.add('opacity-50')

        countrySelect.appendChild(new Option('N/A', 'N/A'))
    }
}

function deleteEmployee(emp_id) {
    var xhr = new XMLHttpRequest()

    xhr.open('GET', `../public/assets/database/delete_employee.php?emp_id=${emp_id}`, true)

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                window.location = '../public/employee_list.php';
            } else {
                console.error('Failed to delete employee')
            }
        }
    }

    xhr.send()
}

function fetchEmployee(emp_id){
    var xhr = new XMLHttpRequest()

    xhr.open('GET', )
}

export { fetchMunicipalities, fetchBaranggays, fetchCountries, deleteEmployee }
