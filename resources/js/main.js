let daySelect = document.querySelector('#day');
let monthSelect = document.querySelector('#month');
let yearSelect = document.querySelector('#year');
let hourSelect = document.querySelector('#hour');
let minuteSelect = document.querySelector('#minute');
let typeSelect = document.querySelector('#type');
let serviceSelect = document.querySelector('#service');

let months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

let services = { 
    EPAS: ['Pensioni', 'Disoccupazioni', 'Invalidità', 'Maternità', 'Infortunio'], 
    CAF: ['730', 'IMU', 'RED', 'ISEE', 'RAI', 'ACCAS', 'REDDITI PF', 'F24', 'SUCCESSIONI', 'LOCAZIONI']
};

// Ottieni la data di oggi
let today = new Date();
let todayDay = today.getDate();
let todayMonth = today.getMonth() + 1; // I mesi in JavaScript sono indicizzati a partire da 0
let todayYear = today.getFullYear();

months.forEach((month, index) => {
    let option = document.createElement('option');
    option.value = index + 1;
    option.textContent = month;
    if (index + 1 < todayMonth && todayYear == parseInt(yearSelect.value)) {
        option.disabled = true;
    }
    monthSelect.appendChild(option);
});

let hours = [9, 10, 11, 12, 16, 17, 18, 19];
hours.forEach((hour) => {
    let option = document.createElement('option');
    option.value = hour;
    option.textContent = hour.toString().padStart(2, '0');
    hourSelect.appendChild(option);
});

let minutes = [0, 15, 30, 45];
minutes.forEach((minute) => {
    let option = document.createElement('option');
    option.value = minute;
    option.textContent = minute.toString().padStart(2, '0');
    minuteSelect.appendChild(option);
});

function populateDays() {
    let month = parseInt(monthSelect.value);
    let year = parseInt(yearSelect.value);
    let daysInMonth;
    
    if (month === 2) {
        daysInMonth = (year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0)) ? 29 : 28;
    } else if ([4, 6, 9, 11].includes(month)) {
        daysInMonth = 30;
    } else {
        daysInMonth = 31;
    }
    
    daySelect.innerHTML = '';
    
    let defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Seleziona il giorno';
    defaultOption.disabled = true;
    defaultOption.selected = true;
    daySelect.appendChild(defaultOption);
    
    // Imposta l'inizio a partire dal giorno successivo
    let startDay = 1;
    if (month === todayMonth && year === todayYear) {
        startDay = todayDay + 1;
    }
    
    for (let day = startDay; day <= daysInMonth; day++) {
        let option = document.createElement('option');
        option.value = day;
        option.textContent = day;
        daySelect.appendChild(option);
    }
}

function populateServices() {
    let selectedType = typeSelect.value;
    
    serviceSelect.innerHTML = '';
    
    let defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Seleziona il servizio';
    defaultOption.disabled = true;
    defaultOption.selected = true;
    serviceSelect.appendChild(defaultOption);
    
    if (selectedType && services[selectedType]) {
        services[selectedType].forEach((service) => {
            let option = document.createElement('option');
            option.value = service;
            option.textContent = service;
            serviceSelect.appendChild(option);
        });
    }
}

typeSelect.addEventListener('change', populateServices);
monthSelect.addEventListener('change', populateDays);
yearSelect.addEventListener('change', populateDays);
populateDays();

// End logica form

// javascript per la modale
const confirmRejectButton = document.querySelector('#confirmRejectButton');
confirmRejectButton.addEventListener('click', function() { 
    const rejectForm = document.querySelector('#rejectForm');
    rejectForm.submit(); 
});

// Logica responsive dropdown

function adjustDropdown() {

    let dropdown = document.querySelector('#dropdown');
    
    if (window.innerWidth < 768) {
        dropdown.classList.remove('dropstart');
        dropdown.classList.add('dropend');
    } else {
        dropdown.classList.remove('dropend');
        dropdown.classList.add('dropstart');
    }
}

// window.addEventListener('resize', adjustDropdown);
// adjustDropdown();