const matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9],
];



const showMatrix = (matrix, id) => {
    const container = document.getElementById(id);
    container.innerHTML = matrix.map(row => `<div>${row.map(cell => `<span>${cell} </span>`).join('')}</div>`).join('');
  };

  const modifyMatrix = (matrix) => matrix.map(row => row.map(cell => cell % 3 === 0 ? 'm' : cell));

  showMatrix(matrix, 'originalMatrix');
  showMatrix(modifyMatrix(matrix), 'modifiedMatrix');