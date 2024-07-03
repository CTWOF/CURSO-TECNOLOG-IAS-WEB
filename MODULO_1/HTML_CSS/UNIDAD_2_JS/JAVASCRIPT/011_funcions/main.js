
function getPrice() {
  let price = parseFloat(document.querySelector('#priceInput').value);
  let disc = parseFloat(document.querySelector('#discInput').value);
  
  let priceFinal = price -(price * disc / 100 ) ;
  
  document.querySelector('#result').innerHTML = `You price with discount ${disc}% is: ${priceFinal.toFixed(2)} euros.`;
  console.log(price, disc, priceFinal);
}