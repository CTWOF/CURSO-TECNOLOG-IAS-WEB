let num1 = parseFloat(prompt('Enter first number!'));
let num2 = parseFloat(prompt('Enter second number!'));

let arr = [];

 if(isNaN(num1) || isNaN(num2)) {
    alert('Please try again and enter onnly NUMBERS!!');
 }
 if (num1 === num2 ){
alert(" they are the same!!");8
 } else {
    arr.push(num1, num2);
   let maxNumber =  Math.max(...arr);

   numeroMax = document.querySelector('#maxNum');
   numeroMax.innerHTML = `The max number between  ${num1} y ${num2} is ${maxNumber} `
 }
