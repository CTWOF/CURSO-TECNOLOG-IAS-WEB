import Plates from './Plates.js';
import { switchSection } from './helpers.js';

const plates = new Plates();
window.plates = plates;

document.getElementById('add-plate-form').addEventListener('submit', (e) => {
  e.preventDefault();
  const title = document.getElementById('plate-title').value;
  const description = document.getElementById('plate-description').value;
  const price = parseFloat(document.getElementById('plate-price').value);
  plates.addPlate(title, description, price);
  e.target.reset();
});

document.getElementById('add-to-menu-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyPlates input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  plates.addToMenu(selectedIds);
});

document.getElementById('add-to-ofert-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyMenu input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  plates.addToOffer(selectedIds);
});

document.getElementById('delete-from-ofert-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyOfert input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  plates.deleteFromOffer(selectedIds);
});

document.getElementById('plates-link').addEventListener('click', () => switchSection('plates-section'));
document.getElementById('menu-link').addEventListener('click', () => switchSection('menu-section'));
document.getElementById('ofert-link').addEventListener('click', () => switchSection('ofert-section'));

switchSection('plates-section');
