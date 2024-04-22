function fetchMunicipalities(selectedProvinceId, municipalitySelect, brgySelect) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `../public/assets/database/fetch_municipalities.php?provinceId=${selectedProvinceId}`, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            municipalitySelect.innerHTML = '';

            var municipalities = JSON.parse(xhr.responseText);
            municipalities.forEach(municipality => {
                var option = document.createElement('option');
                option.value = municipality.municipality_id;
                option.textContent = municipality.municipality_desc;

                municipalitySelect.appendChild(option);
            });

            // After populating municipalities, trigger fetching barangays
            if (municipalities.length > 0) {
                fetchBaranggays(municipalities[0].municipality_id, brgySelect); // Assuming you have residentBarangay select element
            }
        }
    }

    xhr.send();
}

// Modified fetchBaranggays function to populate the barangay select
function fetchBaranggays(selectedMunicipalityId, brgySelect) {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `../public/assets/database/fetch_baranggays.php?municipalityId=${selectedMunicipalityId}`, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 & xhr.status == 200) {
            brgySelect.innerHTML = '';

            var baranggays = JSON.parse(xhr.responseText);
            baranggays.forEach(brgy => {
                var option = document.createElement('option');
                option.value = brgy.brgy_id;
                option.textContent = brgy.brgy_desc;

                brgySelect.appendChild(option);
            });
        }
    }

    xhr.send();
}

export { fetchMunicipalities, fetchBaranggays }