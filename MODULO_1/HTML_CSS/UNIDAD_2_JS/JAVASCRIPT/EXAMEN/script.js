function addItem(section) {
  const inputNameId = `new-${section.slice(0, -1)}`;
  const inputPriceId = `price-${section.slice(0, -1)}`;
  const tableBodyId = `${section}-table`;

  const itemName = document.getElementById(inputNameId).value;
  const itemPrice = document.getElementById(inputPriceId).value;
  if (itemName.trim() === '' || itemPrice.trim() === '') return;

  const tableBody = document.querySelector(`#${section}-table tbody`);
  const row = document.createElement('tr');
  const itemId = `${section}-${Date.now()}`;

  row.id = itemId;
  row.innerHTML = `
      <td><input type="checkbox" onclick="selectItem('${itemId}', '${itemName}', '${itemPrice}')"></td>
      <td>${itemName}</td>
      <td>${itemPrice}</td>
      <td class="actions">
          <button onclick="editItem('${itemId}', '${section}')">✏️</button>
          <button onclick="deleteItem('${itemId}')">🗑️</button>
      </td>
  `;
  
  tableBody.appendChild(row);

  document.getElementById(inputNameId).value = '';
  document.getElementById(inputPriceId).value = '';
}

function editItem(itemId, section) {
  const row = document.getElementById(itemId);
  const itemName = row.children[1].textContent.trim();
  const itemPrice = row.children[2].textContent.trim();

  const newName = prompt('Editar el nombre', itemName);
  const newPrice = prompt('Editar el precio', itemPrice);

  if (newName !== null && newName.trim() !== '' && newPrice !== null && newPrice.trim() !== '') {
      row.children[1].textContent = newName;
      row.children[2].textContent = newPrice;
  }
}

function deleteItem(itemId) {
  const row = document.getElementById(itemId);
  row.parentElement.removeChild(row);
}

function selectItem(itemId, itemName, itemPrice) {
  const checkbox = document.getElementById(itemId).querySelector('input[type="checkbox"]');
  if (checkbox.checked) {
      const pedidoList = document.getElementById('pedido-list');
      const listItem = document.createElement('li');
      listItem.id = `pedido-${itemId}`;
      listItem.className = 'menu-item';
      listItem.innerHTML = `${itemName} - ${itemPrice} €`;

      pedidoList.appendChild(listItem);
  } else {
      const listItem = document.getElementById(`pedido-${itemId}`);
      if (listItem) {
          listItem.parentElement.removeChild(listItem);
      }
  }
}
