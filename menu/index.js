import PlateRepository from './PlateRepository.js';
import PlateCollection from './PlateCollection.js';
import PlateRenderer from './PlateRenderer.js';
import { switchSection } from './helpers.js';
import defaultPlates from './defaultPlates.js'; 


const plateRepo = new PlateRepository();
const menu = new PlateCollection();
const offer = new PlateCollection();
const renderer = new PlateRenderer();

defaultPlates.forEach(plate => {
  plateRepo.addPlate(plate.title, plate.description, plate.price);
});

document.getElementById('add-plate-form').addEventListener('submit', (e) => {
  e.preventDefault();
  const title = document.getElementById('plate-title').value;
  const description = document.getElementById('plate-description').value;
  const price = parseFloat(document.getElementById('plate-price').value);
  const newPlate = plateRepo.addPlate(title, description, price);
  renderer.render(plateRepo.getAllPlates(), 'tBodyPlates', renderer.createPlateRow);
  e.target.reset();
});

document.getElementById('add-to-menu-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyPlates input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  selectedIds.forEach(id => {
    const plate = plateRepo.getPlateById(id);
    if (plate) {
      menu.addPlate(plate);
    }
  });
  renderer.render(menu.getAllPlates(), 'tBodyMenu', renderer.createMenuRow);
});

document.getElementById('add-to-ofert-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyMenu input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  selectedIds.forEach(id => {
    const plate = menu.getPlateById(id);
    if (plate) {
      offer.addPlate(plate);
    }
  });
  renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
});

document.getElementById('delete-from-ofert-btn').addEventListener('click', () => {
  const selectedIds = Array.from(document.querySelectorAll('#tBodyOffer input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
  selectedIds.forEach(id => offer.deletePlate(id));
  renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
});

document.getElementById('plates-link').addEventListener('click', () => switchSection('plates-section'));
document.getElementById('menu-link').addEventListener('click', () => switchSection('menu-section'));
document.getElementById('ofert-link').addEventListener('click', () => switchSection('ofert-section'));

switchSection('plates-section');

window.editPlatePrompt = function(id) {
  const plate = plateRepo.getPlateById(id);
  if (plate) {
    const newTitle = window.prompt("Enter new title:", plate.title);
    const newDescription = window.prompt("Enter new description:", plate.description);
    const newPrice = window.prompt("Enter new price:", plate.price);
    if (newTitle && newDescription && newPrice) {
      plateRepo.editPlate(id, newTitle, newDescription, parseFloat(newPrice));
      renderer.render(plateRepo.getAllPlates(), 'tBodyPlates', renderer.createPlateRow);
      renderer.render(menu.getAllPlates(), 'tBodyMenu', renderer.createMenuRow);
      renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
    }
  }
};

window.deletePlate = function(id) {
  plateRepo.deletePlate(id);
  renderer.render(plateRepo.getAllPlates(), 'tBodyPlates', renderer.createPlateRow);
  renderer.render(menu.getAllPlates(), 'tBodyMenu', renderer.createMenuRow);
  renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
};

window.deleteFromMenu = function(id) {
  menu.deletePlate(id);
  renderer.render(menu.getAllPlates(), 'tBodyMenu', renderer.createMenuRow);
};

window.deleteFromOffer = function(id) {
  offer.deletePlate(id);
  renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
};
renderer.render(plateRepo.getAllPlates(), 'tBodyPlates', renderer.createPlateRow);
