// Script Chart.js 
const ctx = document.getElementById('grafikIP').getContext('2d');
const grafikIP = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['2223/1 (23 sks)', '2223/2 (24 sks)', '2324/1 (22 sks)', '2324/2 (22 sks)',
            '2425/1 (24 sks)'
        ],
        datasets: [{
            label: 'IP Semester',
            data: [3.7, 3.65, 3.85, 3.74, 3.94],
            borderColor: 'rgba(0, 191, 255, 1)',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            fill: false,
            tension: 0.5
        },
        {
            label: 'IP Kumulatif',
            data: [3.7, 3.68, 3.73, 3.74, 3.78],
            borderColor: 'rgba(17, 24, 39, 1)',
            backgroundColor: 'rgba(17, 24, 39, 0.1)',
            fill: false,
            tension: 0.5
        }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                callbacks: {
                    label: (context) => context.dataset.label + ": " + context.raw.toFixed(2)
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
                ticks: {
                    stepSize: 0.2
                },
                
            },
            x: {
                title: {
                    display: true,
                    text: 'Semester (SKS)'
                },
                
                grid: {
                    display: false
                }
            }
        }
    }
});