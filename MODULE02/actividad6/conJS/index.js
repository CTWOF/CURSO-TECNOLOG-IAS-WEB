function mostrarInputs() {
    let numInputs = document.getElementById('numDatos').value;
    let campos = '';
    for (let i = 1; i <= numInputs; i++) {
        campos += 'Indica el valor ' + i + ': <input type="number" name="numeros[]"><br>';
    }
    document.getElementById('camposFormulario').innerHTML = campos + '<input type="submit" value="Enviar">';
}