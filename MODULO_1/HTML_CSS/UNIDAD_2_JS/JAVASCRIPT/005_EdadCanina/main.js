document.querySelector('#start').addEventListener('click', ()=>{

    const dog = prompt('How old are your dog? ');

    const person = Number(dog) *7 ;

 const ageDog = document.querySelector('#dog');
  
 ageDog.innerHTML = `Si el edad de tu canina  es ${dog}
  entonces  la edad suya en años humanos  sera${person}`
})