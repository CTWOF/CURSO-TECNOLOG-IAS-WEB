const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];

function getMonth(monthNum) {
  if (monthNum < 1 || monthNum > 12) {
    return alert('Number should be between 1 and 12.');
  }
  return months[monthNum - 1];
}

const monthInput = document.querySelector('#monthInput');
const findMatch = document.querySelector('#findMatch');
const monthString = document.querySelector('#monthString');

findMatch.addEventListener('click', () => {
  const monthNum = parseInt(monthInput.value, 10);
  const monthName = getMonth(monthNum);
  monthString.innerHTML = monthName;
});
