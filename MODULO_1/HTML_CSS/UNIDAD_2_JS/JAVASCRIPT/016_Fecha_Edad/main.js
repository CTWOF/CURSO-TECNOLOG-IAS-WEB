let today = new Date();
let input = prompt('What is the date of your Birthday? (YYYY-MM-DD)');
let birthday = new Date(input);

const isValue = (date) => {
  console.log(date);
  return date instanceof Date && !isNaN(date);
}

if (!isValue(birthday)) {
  alert('Correct  format  is : YYYY-MM-DD.');

} else {
  const howOldYouAre = (today, birthday) => {
    let ageYear = today.getFullYear() - birthday.getFullYear();
    return ageYear;
  };

  const daysLeftToBirthday = (today, birthday) => {
    
    birthday.setFullYear(today.getFullYear());

    if (today > birthday) {
      birthday.setFullYear(today.getFullYear() + 1);
    }

    let timeDif = birthday - today;
    let daysDif = Math.ceil(timeDif / (1000 * 60 * 60 * 24));
    
    return daysDif;
  };

  let yourAgeYear = document.getElementById('yourAgeYear');
  yourAgeYear.innerHTML = `You are ${howOldYouAre(today, birthday)} years old.`;


  let daysLeft = document.getElementById('daysLeftToBirthday');
  daysLeft.innerHTML = `There are ${daysLeftToBirthday(today, birthday)} days left until your next birthday.`;
}
