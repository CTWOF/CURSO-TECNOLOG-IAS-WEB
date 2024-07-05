import Plate from './Plate.js';

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
    if (window.confirm(`the plate will be deleted: ID = ${id}?`)) {
      this.plates = this.plates.filter(plate => plate.id !== id);
      window.alert(`Deleted plate with ID ${id}`);
    }
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

export default PlateRepository;
