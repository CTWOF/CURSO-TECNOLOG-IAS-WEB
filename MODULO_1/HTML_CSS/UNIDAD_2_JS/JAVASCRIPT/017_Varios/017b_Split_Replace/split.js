
function splitSentence() {
    let str = prompt('Escribe una frase...');
    if (str) {
        let words = str.split(' ');
        let wordList = document.querySelector('#wordList');
        wordList.innerHTML = ''; 
        words.forEach(word => {
            let listItem = document.createElement('li');
            listItem.textContent = word;
            wordList.appendChild(listItem);
        });
    }
}
function replaceSentence() {
    let str = document.getElementById('str');
    let wordToChange = prompt('What do u want to change?');
    let newWord = prompt('Write New Word!:');
    if (wordToChange && newWord) {
        let newStr = str.innerHTML.replace(wordToChange, `<span class="highlight">${newWord}</span>`);
        str.innerHTML = newStr;
    }
}