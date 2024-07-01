const month = parseInt(prompt('When is your Birthday ? Write number of Month'));
const userMonth = document.querySelector('#month');

switch (month) {
  case 1:
    userMonth.innerHTML = "January";
    break;
  case 2:
    userMonth.innerHTML = "February";
    break;
  case 3:
    userMonth.innerHTML = "March";
    break;
  case 4:
    userMonth.innerHTML = "April";
    break;
  case 5:
    userMonth.innerHTML = "May";
    break;
  case 6:
    userMonth.innerHTML = "June";
    break;
  case 7:
    userMonth.innerHTML = "July";
    break;
  case 8:
    userMonth.innerHTML = "August";
    break;
  case 9:
    userMonth.innerHTML = "September";
    break;
  case 10:
    userMonth.innerHTML = "October";
    break;
  case 11:
    userMonth.innerHTML = "November";
    break;
  case 12:
    userMonth.innerHTML = "December";
    break;
  default:
    userMonth.innerHTML = "Ooops this month doesn't exist";
    break;
}
