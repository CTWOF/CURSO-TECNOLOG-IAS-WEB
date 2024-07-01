function countWithWhile() {
  let i = 10;
  let result = '';

  while (i < 5) {
      result += i + ', ';
      i--;
  }

  const whileResultElement = document.querySelector('#whileResult');
  const whileMessageElement = document.querySelector('#whileMessage');

  if (result === '') {
      whileResultElement.innerHTML = '';
      whileMessageElement.textContent = 'No se encontraron números para mostrar Porque 10 mas que 5.';
  } else {
      whileResultElement.innerHTML = result;
      whileMessageElement.textContent = '';
  }
}

function countWithDoWhile() {
  let i = 10;
  let result = '';

  do {
      result += i + ', ';
      i--;
  } while (i < 5);

  document.querySelector('#doWhileResult').innerHTML = result;
}
