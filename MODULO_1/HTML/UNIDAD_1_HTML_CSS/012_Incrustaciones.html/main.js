const canvas = document.getElementById('miCanvas');
        const ctx = canvas.getContext('2d');
        const resetButton = document.getElementById('resetButton');
        const colorPicker = document.getElementById('colorPicker');

        let isDrawing = false;
        let strokeColor = '#088341'; 

        canvas.addEventListener('mousedown', (event) => {
            isDrawing = true;
            ctx.beginPath();
            ctx.moveTo(event.offsetX, event.offsetY);
            ctx.strokeStyle = strokeColor; 
        });

        canvas.addEventListener('mousemove', (event) => {
            if (isDrawing) {
                ctx.lineTo(event.offsetX, event.offsetY);
                ctx.stroke();
            }
        });

        canvas.addEventListener('mouseup', () => {
            isDrawing = false;
        });

        canvas.addEventListener('mouseout', () => {
            isDrawing = false;
        });

        resetButton.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        colorPicker.addEventListener('input', (event) => {
            strokeColor = event.target.value;
        });