
document.querySelector('#start').addEventListener('click', ()=> {


const num1 = prompt('Write first number');
const num2 = prompt('write second number');


const sum = Number(num1) + Number(num2);
console.log(num1, num2);
const number1 = document.querySelector('#num1');
const number2 = document.querySelector('#num2');
const suma = document.querySelector('#sum');

number1.innerHTML = `If first number is  ${num1}` ;
number2.innerHTML= `If second number is ${num2}`;
suma.innerHTML= `this is suma : ${sum} `
});