Chart.register(ChartDataLabels); // Daftarkan plugin 
// Script Chart.js 

const ctx = document.getElementById('grafikIP').getContext('2d');
const grafikIP = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['2223/1 (23 sks)', '2223/2 (24 sks)', '2324/1 (22 sks)', '2324/2 (22 sks)', '2425/1 (24 sks)'],
        datasets: [{
            label: 'IP Semester',
            data: [3.7, 3.65, 3.85, 3.74, 3.94],
            borderColor: 'rgba(0, 191, 255, 1)',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            fill: false,
            tension: 0.5,
            pointBackgroundColor: 'rgba(0, 191, 255, 1)',
            pointRadius: 6,
            pointHoverRadius: 8
        },
        {
            label: 'IP Kumulatif',
            data: [3.7, 3.68, 3.73, 3.74, 3.78],
            borderColor: 'rgba(17, 24, 39, 1)',
            backgroundColor: 'rgba(17, 24, 39, 0.1)',
            fill: false,
            tension: 0.5,
            pointBackgroundColor: 'rgba(17, 24, 39, 1)',
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    pointRadius: function(context) {
        return context.datasetIndex === 0 ? 6 : 4; // Ukuran berbeda untuk tiap dataset
    },
    pointHoverRadius: 20,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            tooltip: {
                callbacks: {
                    label: (context) => context.dataset.label + ": " + context.raw.toFixed(2)
                }
            },
            datalabels: {
                align: function (context) {
                    let value = context.raw;
                    return value > 3.7 ? 'bottom' : 'top';
                },
                anchor: 'center',
                color: 'black',
                font: {
                    weight: 'bolder',
                    size: 12
                },
                formatter: function (value) {
                    return value.toFixed(2);
                }
            }      
        },
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Indeks Prestasi'
                },
                min: 3.2,
                max: 4.0,
                suggestedMin: 6.0,
                ticks: {
                    stepSize: 0.2,
                    padding: 20
                },
            },
            x: {
                title: {
                    display: true,
                    text: 'Semester (SKS)'
                },
                grid: {
                    display: false
                },
            }
        }
    }
});



chartInstance.update() // Update chart
