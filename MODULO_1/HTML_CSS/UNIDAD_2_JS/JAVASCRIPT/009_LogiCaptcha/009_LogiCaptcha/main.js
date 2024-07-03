let attempts = 3;
        const correctSum = 14; 
        const correctAnswer = document.querySelector('#success');

        const isHuman = () => {
            let userSum = parseInt(prompt('Por favor, ingresa el resultado de 5 + 9:'));

            if (isNaN(userSum)) {
                alert('Eso no es un número válido.');
                isHuman();
                return; 
            }

            if (userSum !== correctSum) {
                attempts--;
                if (attempts > 0) {
                    alert(`Respuesta incorrecta. Te quedan ${attempts} intentos.`);
                    isHuman();
                } else {
                    alert('Tres intentos fallidos. Serás redirigido a la web de los Mossos.');
                    window.location.href = 'https://mossos.gencat.cat/ca/inici';
                }
            } else {
                correctAnswer.innerHTML = '¡Acceso concedido!';
            }
        }

        isHuman();