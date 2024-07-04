  class Plates {
      constructor() {
          this.plates = [];
          this.menu = [];
          this.ofert = [];
          this.currentId = 1;
      }

      addPlate(title, description, price) {
          const plate = { id: this.currentId++, title, description, price };
          this.plates.push(plate);
          this.renderPlates();
      }

      deletePlate(id) {
          this.plates = this.plates.filter(plate => plate.id !== id);
          this.renderPlates();
      }

      editPlate(id, newTitle, newDescription, newPrice) {
          const plate = this.plates.find(plate => plate.id === id);
          if (plate) {
              plate.title = newTitle;
              plate.description = newDescription;
              plate.price = newPrice;
              this.renderPlates();
          }
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
          this.menu = this.menu.filter(plate => plate.id !== id);
          this.renderMenu();
      }

      addToOfert(ids) {
          ids.forEach(id => {
              const plate = this.menu.find(plate => plate.id === id);
              if (plate && !this.ofert.includes(plate)) {
                  this.ofert.push(plate);
              }
          });
          this.renderOfert();
      }

      deleteFromOfert(ids) {
          this.ofert = this.ofert.filter(plate => !ids.includes(plate.id));
          this.renderOfert();
      }

      renderPlates() {
          const tbody = document.getElementById('tBodyPlates');
          tbody.innerHTML = '';
          this.plates.forEach(plate => {
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
              tbody.appendChild(row);
          });
      }

      renderMenu() {
          const tbody = document.getElementById('tBodyMenu');
          tbody.innerHTML = '';
          this.menu.forEach(plate => {
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
              tbody.appendChild(row);
          });
      }

      renderOfert() {
          const tbody = document.getElementById('tBodyOfert');
          tbody.innerHTML = '';
          this.ofert.forEach(plate => {
              const row = document.createElement('tr');
              row.innerHTML = `
                  <td><input type="checkbox" value="${plate.id}"></td>
                  <td>${plate.id}</td>
                  <td>${plate.title}</td>
                  <td>${plate.price}</td>
                  <td>
                      <button onclick="plates.deleteFromOfert([${plate.id}])">Delete</button>
                  </td>
              `;
              tbody.appendChild(row);
          });
      }

      editPlatePrompt(id) {
          const plate = this.plates.find(plate => plate.id === id);
          if (plate) {
              const newTitle = prompt("Enter new title:", plate.title);
              const newDescription = prompt("Enter new description:", plate.description);
              const newPrice = prompt("Enter new price:", plate.price);
              if (newTitle && newDescription && newPrice) {
                  this.editPlate(id, newTitle, newDescription, parseFloat(newPrice));
              }
          }
      }
  }

  const plates = new Plates();

  document.getElementById('add-plate-form').addEventListener('submit', (e) => {
      e.preventDefault();
      const title = document.getElementById('plate-title').value;
      const description = document.getElementById('plate-description').value;
      const price = document.getElementById('plate-price').value;
      plates.addPlate(title, description, parseFloat(price));
      e.target.reset();
  });

  document.getElementById('plates-link').addEventListener('click', () => {
      document.getElementById('plates-section').style.display = 'block';
      document.getElementById('menu-section').style.display = 'none';
      document.getElementById('ofert-section').style.display = 'none';
  });

  document.getElementById('menu-link').addEventListener('click', () => {
      document.getElementById('plates-section').style.display = 'none';
      document.getElementById('menu-section').style.display = 'block';
      document.getElementById('ofert-section').style.display = 'none';
  });

  document.getElementById('ofert-link').addEventListener('click', () => {
      document.getElementById('plates-section').style.display = 'none';
      document.getElementById('menu-section').style.display = 'none';
      document.getElementById('ofert-section').style.display = 'block';
  });

  document.getElementById('add-to-menu-btn').addEventListener('click', () => {
      const selectedIds = Array.from(document.querySelectorAll('#tBodyPlates input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
      plates.addToMenu(selectedIds);
  });

  document.getElementById('add-to-ofert-btn').addEventListener('click', () => {
      const selectedIds = Array.from(document.querySelectorAll('#tBodyMenu input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
      plates.addToOfert(selectedIds);
  });

  document.getElementById('delete-from-ofert-btn').addEventListener('click', () => {
      const selectedIds = Array.from(document.querySelectorAll('#tBodyOfert input[type="checkbox"]:checked')).map(checkbox => parseInt(checkbox.value));
      plates.deleteFromOfert(selectedIds);
  });
