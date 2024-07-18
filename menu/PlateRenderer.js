class PlateRenderer {
  render(collection, tableBodyId, createRow) {
    const tbody = document.getElementById(tableBodyId);
    if (!tbody) {
      console.error(`Element with ID ${tableBodyId} not found.`);
      return;
    }
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
        <button onclick="editPlatePrompt(${plate.id})">✎</button>
        <button onclick="deletePlate(${plate.id})">✘</button>
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
      <td>${plate.description}</td>
      <td>${plate.price}</td>
      <td>
        <button onclick="deleteFromMenu(${plate.id})">✘</button>
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
            <td>${plate.description}</td>

      <td>${plate.price}</td>
    
    `;
    return row;
  }
}

export default PlateRenderer;
