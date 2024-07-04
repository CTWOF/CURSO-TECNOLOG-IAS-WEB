const cities = [];
const error = document.querySelector('#error');
const nameInput = document.querySelector('#name');
const list = document.querySelector('#list');
const deleteNameInput = document.querySelector('#deleteName');

function updateList() {
  list.innerHTML = cities.map((city, index) => `<ol>${index + 1}. ${city}</ol>`).join('');
}

function addCity() {
  const city = nameInput.value.trim();
  if (!city) {
    error.textContent = 'Enter Name';
  } else if (cities.length >= 4) {
    error.textContent = 'No more 4';
  } else {
    cities.push(city);
    updateList();
    nameInput.value = '';
    error.textContent = '';
  }
}

function deleteCity() {
  const index = parseInt(deleteNameInput.value, 10) - 1;
  if (!Number.isNaN(index) && index >= 0 && index < cities.length) {
    cities.splice(index, 1); 
    updateList();
  } else {
    alert('Invalid number.');
  }
  deleteNameInput.value = '';
}

document.querySelector('#add').addEventListener('click', addCity);
document.querySelector('#deleteBtn').addEventListener('click', deleteCity);
