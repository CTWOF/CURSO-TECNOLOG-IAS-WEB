class Plate {
  constructor(id, title, description, price) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.price = price;
  }
}

class PlateRepository {
  constructor() {
    this.plates = [];
    this.currentId = 1;
  }

  addPlate(title, description, price) {
    const plate = new Plate(this.currentId++, title, description, price);
    this.plates.push(plate);
    return plate;
  }

  deletePlate(id) {
    this.plates = this.plates.filter(plate => plate.id !== id);
  }

  editPlate(id, newTitle, newDescription, newPrice) {
    const plate = this.plates.find(plate => plate.id === id);
    if (plate) {
      plate.title = newTitle;
      plate.description = newDescription;
      plate.price = newPrice;
    }
  }

  getPlateById(id) {
    return this.plates.find(plate => plate.id === id);
  }

  getAllPlates() {
    return this.plates;
  }
}

class PlateCollection {
  constructor() {
    this.collection = [];
  }

  addPlate(plate) {
    if (!this.collection.includes(plate)) {
      this.collection.push(plate);
    }
  }

  deletePlate(id) {
    this.collection = this.collection.filter(plate => plate.id !== id);
  }

  getAllPlates() {
    return this.collection;
  }
}

class PlateRenderer {
  render(collection, tableBodyId, createRow) {
    const tbody = document.getElementById(tableBodyId);
    tbody.innerHTML = '';
    collection.forEach(plate => {
      const row = createRow(plate);
      tbody.appendChild(row);
    });
  }

  createPlateRow(plate) {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td><input type="checkbox" value="${plate.id}"></td>
      <td>${plate.id}</td>
      <td>${plate.title}</td>
      <td>${plate.description}</td>
      <td>${plate.price}</td>
      <td>
        <button onclick="plates.editPlatePrompt(${plate.id})">Edit</button>
        <button onclick="plates.deletePlate(${plate.id})">Delete</button>
      </td>
    `;
    return row;
  }

  createMenuRow(plate) {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td><input type="checkbox" value="${plate.id}"></td>
      <td>${plate.id}</td>
      <td>${plate.title}</td>
      <td>${plate.price}</td>
      <td>
        <button onclick="plates.deleteFromMenu(${plate.id})">Delete</button>
      </td>
    `;
    return row;
  }

  createOfferRow(plate) {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td><input type="checkbox" value="${plate.id}"></td>
      <td>${plate.id}</td>
      <td>${plate.title}</td>
      <td>${plate.price}</td>
      <td>
        <button onclick="plates.deleteFromOffer(${plate.id})">Delete</button>
      </td>
    `;
    return row;
  }
}

// Usage example
const plateRepo = new PlateRepository();
const menu = new PlateCollection();
const offer = new PlateCollection();
const renderer = new PlateRenderer();

// Add a plate
const newPlate = plateRepo.addPlate('Pasta', 'Delicious pasta', 12.99);
renderer.render(plateRepo.getAllPlates(), 'tBodyPlates', renderer.createPlateRow);

// Add to menu
menu.addPlate(newPlate);
renderer.render(menu.getAllPlates(), 'tBodyMenu', renderer.createMenuRow);

// Add to offer
offer.addPlate(newPlate);
renderer.render(offer.getAllPlates(), 'tBodyOffer', renderer.createOfferRow);
