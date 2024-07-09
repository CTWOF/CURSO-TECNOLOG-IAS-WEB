
let names = [];

document.getElementById('addName').addEventListener('click', ()=>{
    let name = document.getElementById('name').value;
 if(name){
    names.push(name);
    let listName = document.createElement('li');
    listName.textContent = name;
    document.getElementById('names').appendChild(listName);
    document.getElementById('name').value = '';

 }
});
document.getElementById('getRandom').addEventListener('click', ()=> {
    if(names.length > 0){
        let result = Math.floor(Math.random() * names.length);
       console.log(result);
        alert('WINNER IS: '+ names[result]);
        let winner = document.querySelector('#winner');
        winner.innerHTML = `The winner IS : ${names[result]}`
    } else {
        alert('Enter at least one name');
    }
});