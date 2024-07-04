const matrix1 = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

const number1 = matrix1[0][2]; 
const number2 = matrix1[1][1]; 

const numbers = document.getElementById('numbers');
numbers.innerHTML = ` This is number1:  ${number1} and this is number2: ${number2}`

 //con map()

const showMatrixMap = (matrix, id) => {
  const gridMap = document.getElementById(id);
  gridMap.innerHTML = matrix.map(row => `<div>${row.map(cell => `<span>${cell} </span>`).join('')}</div>`).join('');
};

const modifyMatrixMap = (matrix) => matrix.map(row => row.map(cell => cell % 3 === 0 ? 'm' : cell));

showMatrixMap(matrix1, 'originalMatrixMap');
showMatrixMap(modifyMatrixMap(matrix1), 'modifiedMatrixMap');
