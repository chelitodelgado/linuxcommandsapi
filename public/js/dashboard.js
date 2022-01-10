
const interacciones = () => {
    const select_mes = document.querySelector('#mes');
    const ctx = document.getElementById('interacciones').getContext('2d');

    const interacciones = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Ingresos a la API',
                data: [1200, 1900, 3000, 5000, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 2510],
                borderColor: [
                    '#ccc'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: {
                    min: 0,
                    max: 100,
                    beginAtZero: true
                }
            }
        }
    });

    select_mes.addEventListener('change', (event) => {
        var mes = event.target.value;
        const enero   = [12, 13, 45, 5000, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 20];
        const febrero = [45, 58, 74, 5000, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 50];
        const marzo   = [56, 77, 3000, 88, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 50];
        const abril   = [25, 77, 3000, 5000, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 20];
        const mayo    = [10, 88, 3000, 5000, 2000, 3000, 5000, 4000, 2500, 1500, 3100, 21];

        switch (mes) {
            case '1':
                    interacciones.data['datasets'][0].data.push(enero);
				    interacciones.update();
                break;
            case '2':
                    interacciones.data['datasets'][0].data.push(febrero);
				    interacciones.update();
                break;
            case '4':
                    interacciones.data['datasets'][0].data.push(marzo);
                    interacciones.update();
                break;
            case '5':
                    interacciones.data['datasets'][0].data.push(abril);
                    interacciones.update();
                break;
            case '6':
                    interacciones.data['datasets'][0].data.push(mayo);
                    interacciones.update();
                break;

            default:
                    interacciones.data['datasets'][0].data.push(enero);
				    interacciones.update();
                break;
        }

    });

}

interacciones();

