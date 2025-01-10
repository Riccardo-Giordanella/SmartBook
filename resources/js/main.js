let daySelect = document.querySelector('#day');
let monthSelect = document.querySelector('#month');
let yearSelect = document.querySelector('#year');
let hourSelect = document.querySelector('#hour');
let minuteSelect = document.querySelector('#minute');
let typeSelect = document.querySelector('#type');
let serviceSelect = document.querySelector('#service');

let months = [ 'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre' ];

let services = { 
    EPAS: ['Pensioni', 'Disoccupazioni', 'Invalidità', 'Maternità', 'Infortunio'], 
    CAF: ['730', 'IMU', 'RED', 'ISEE', 'RAI', 'ACCAS', 'REDDITI PF', 'F24', 'SUCCESSIONI', 'LOCAZIONI']
};

months.forEach((month, index) => { 
    let option = document.createElement('option');
    option.value = index + 1;
    option.textContent = month;
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
    
    for (let day = 1; day <= daysInMonth; day++) {
        let option = document.createElement('option');
        option.value = day;
        option.textContent = day;
        daySelect.appendChild(option);
    } };
    
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