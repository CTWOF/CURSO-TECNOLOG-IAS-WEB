
let userSum;
const suma = 17;
const correctAnswer = document.querySelector('#success');

const isHuman = ()=> {
  userSum = parseInt(prompt('Write correct answer: 8 + 9 is...'));

  if (isNaN(userSum)) {
    alert('That"s is Not a Number.');
    isHuman(); 
  } if (userSum !== suma) {
    alert('I am sorry ...you are WRONG TRY AGAIN!');
    isHuman(); 
  } 
  correctAnswer.innerHTML = `GREAT!`; 
}

isHuman(); 
