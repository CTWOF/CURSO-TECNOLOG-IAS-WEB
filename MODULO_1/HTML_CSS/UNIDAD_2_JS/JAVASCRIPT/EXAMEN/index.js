import Plates from './Plates.js';
import { switchSection } from './helpers.js';

const plates = new Plates();
window.plates = plates;

const defaultPlates = [
  { title: 'Spaghetti Carbonara', description: 'Classic Italian pasta dish', price: 12.5 },
  { title: 'Margherita Pizza', description: 'Tomato, mozzarella, and basil', price: 8.0 },
  { title: 'Caesar Salad', description: 'Crispy romaine lettuce with Caesar dressing', price: 7.5 },
  { title: 'Beef Burger', description: 'Juicy beef patty with cheese and lettuce', price: 10.0 },
  { title: 'Grilled Salmon', description: 'Served with lemon butter sauce', price: 15.0 },
  { title: 'Chicken Curry', description: 'Spicy and flavorful chicken curry', price: 11.0 },
  { title: 'Vegetable Stir-fry', description: 'Mixed vegetables sautéed with soy sauce', price: 9.0 },
  { title: 'Chocolate Cake', description: 'Rich and moist chocolate cake', price: 6.5 },
  { title: 'Tiramisu', description: 'Classic Italian dessert with coffee and mascarpone', price: 7.0 },
  { title: 'Lemonade', description: 'Refreshing lemon drink', price: 3.0 },
];

defaultPlates.forEach(plate => {
  plates.addPlate(plate.title, plate.description, plate.price);
});

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
