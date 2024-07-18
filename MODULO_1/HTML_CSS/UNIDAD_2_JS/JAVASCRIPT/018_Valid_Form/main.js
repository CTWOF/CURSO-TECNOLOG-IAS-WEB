document.getElementById('formulario').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;
    const fechaNacimiento = document.getElementById('fechaNacimiento').value;
    const comentarios = document.getElementById('comentarios').value;

    if (!validarEmail(email)) {
        alert('Por favor, introduce un email válido.');
        return;
    }

    if (!validarTelefono(telefono)) {
        alert('Por favor, introduce un teléfono válido.');
        return;
    }

    if (!esMayorDeEdad(fechaNacimiento)) {
        alert('Debes ser mayor de edad para enviar el formulario.');
        return;
    }

    document.getElementById('resultado').innerHTML = `
        <p><strong>Nombre:</strong> ${nombre}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Teléfono:</strong> ${telefono}</p>
        <p><strong>Fecha de Nacimiento:</strong> ${fechaNacimiento}</p>
        <p><strong>Comentarios:</strong> ${comentarios}</p>
    `;
});


function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validarTelefono(telefono) {
    const re = /^\d{10}$/;
    return re.test(telefono);
}

function esMayorDeEdad(fechaNacimiento) {
    const hoy = new Date();
    const fechaNac = new Date(fechaNacimiento);
    let edad = hoy.getFullYear() - fechaNac.getFullYear();
    const mes = hoy.getMonth() - fechaNac.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
        edad--;
    }
    return edad >= 18;
}
