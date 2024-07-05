class PlateCollection {
  constructor() {
    this.collection = [];
  }

  addPlate(plate) {
    if (!this.collection.includes(plate)) {
      this.collection.push(plate);
      window.alert(` Successful added ${plate.title}!`);

    }
  }

  deletePlate(id) {
    if (window.confirm("Are you sure you want to delete this plate?")) {
      this.collection = this.collection.filter(plate => plate.id !== id);
    }
  }

  getPlateById(id) {
    return this.collection.find(plate => plate.id === id);
  }

  getAllPlates() {
    return this.collection;
  }
}

export default PlateCollection;
