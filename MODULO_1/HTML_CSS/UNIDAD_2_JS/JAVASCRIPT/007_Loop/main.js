var numPar = '';

for (let i = 20; i <= 50; i++) {
    if (i % 2 === 0) {
      console.log(i);
      numPar += i + '<br>';
    }
  }
  
  const data = document.querySelector('#num');
 data.innerHTML = numPar;