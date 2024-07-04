class Plates {
    constructor() {
      this.plates = [];
      this.menu = [];
      this.offer = [];
      this.currentId = 1;
    }
  
    addPlate(title, description, price) {
      const plate = { id: this.currentId++, title, description, price };
      this.plates.push(plate);
      this.renderPlates();
    }
  
    deletePlate(id) {
      if (window.confirm(`Are you sure you want to delete plate with ID ${id}?`)) {
        this.plates = this.plates.filter(plate => plate.id !== id);
        this.menu = this.menu.filter(plate => plate.id !== id);
        this.offer = this.offer.filter(plate => plate.id !== id);
        this.renderAll();
        window.alert(`Deleted plate with ID ${id}`);
      }
    }
  
    editPlate(id, newTitle, newDescription, newPrice) {
      const updatePlate = (plate) => {
        plate.title = newTitle;
        plate.description = newDescription;
        plate.price = newPrice;
      };
  
      [this.plates, this.menu, this.offer].forEach(collection => {
        const plate = collection.find(plate => plate.id === id);
        if (plate) {
          updatePlate(plate);
        }
      });
  
      this.renderAll();
    }
  
    addToMenu(ids) {
      ids.forEach(id => {
        const plate = this.plates.find(plate => plate.id === id);
        if (plate && !this.menu.includes(plate)) {
          this.menu.push(plate);
        }
      });
      this.renderMenu();
    }
  
    deleteFromMenu(id) {
      if (window.confirm("Are you sure you want to delete this plate from the menu?")) {
        this.menu = this.menu.filter(plate => plate.id !== id);
        this.renderMenu();
      }
    }
  
    addToOffer(ids) {
      ids.forEach(id => {
        const plate = this.menu.find(plate => plate.id === id);
        if (plate && !this.offer.includes(plate)) {
          this.offer.push(plate);
        }
      });
      this.renderOffer();
    }
  
    deleteFromOffer(ids) {
      if (window.confirm("Are you sure you want to delete the selected plates from the offer?")) {
        this.offer = this.offer.filter(plate => !ids.includes(plate.id));
        this.renderOffer();
      }
    }
  
    render(collection, tableBodyId, createRow) {
      const tbody = document.getElementById(tableBodyId);
      tbody.innerHTML = '';
      collection.forEach(plate => {
        const row = createRow.call(this, plate);
        tbody.appendChild(row);
      });
    }
  
    renderAll() {
      this.renderPlates();
      this.renderMenu();
      this.renderOffer();
    }
  
    renderPlates() {
      this.render(this.plates, 'tBodyPlates', this.createPlateRow);
    }
  
    renderMenu() {
      this.render(this.menu, 'tBodyMenu', this.createMenuRow);
    }
  
    renderOffer() {
      this.render(this.offer, 'tBodyOfert', this.createOfferRow);
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
  
    editPlatePrompt(id) {
      const plate = this.plates.find(plate => plate.id === id);
      if (plate) {
        const newTitle = window.prompt("Enter new title:", plate.title);
        const newDescription =window.prompt("Enter new description:", plate.description);
        const newPrice = window.prompt("Enter new price:", plate.price);
        if (newTitle && newDescription && newPrice) {
          this.editPlate(id, newTitle, newDescription, parseFloat(newPrice));
        }
      }
    }
  }
  
  export default Plates;
  