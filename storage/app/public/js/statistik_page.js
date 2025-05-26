// Grafik Chart bar beserta handlers
let chartInstance;

document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('nilaiChart').getContext('2d');
    chartInstance = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['A', 'B+', 'B', 'C+', 'C'],
            datasets: [{
                data: [47.1, 31.4, 11.8, 5.9, 3.9],
                backgroundColor: ['#7CB5EC', '#66BB6A', '#424242', '#7E57C2', '#FFA726']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        const sum = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        return (value / sum * 100).toFixed(1) + '%';
                    },
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 12
                    },
                    anchor: 'end',
                    align: 'start',
                    offset: 8,
                    borderRadius: 4,
                    backgroundColor: 'rgba(255,255,255,0.8)',
                    padding: 4,
                    clamp: true
                },
                title: {
                    display: true,
                    text: 'Sebaran Nilai Akademik',
                    font: {
                        size: 18
                    }
                },
                subtitle: {
                    display: true,
                    text: 'Keseluruhan Semester'
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: ctx => {
                            const label = ctx.label || '';
                            const v = ctx.parsed;
                            const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a +
                                b, 0);
                            return `${label}: ${(v / total * 100).toFixed(2)}% of total`;
                        }
                    }
                },
                legend: {
                    display: false
                }
            }
        }
    });

    // - Download handlers chart
    document.getElementById('downloadPNGChart').addEventListener('click', function () {
        html2canvas(document.querySelector('.card-Chart-Pie')).then(canvas => {
            const a = document.createElement('a');
            a.href = canvas.toDataURL('image/png');
            a.download = 'chart_with_card.png';
            a.click();
        });
    });

    document.getElementById('downloadJPEGChart').addEventListener('click', function () {
        html2canvas(document.querySelector('.card-Chart-Pie')).then(canvas => {
            const a = document.createElement('a');
            a.href = canvas.toDataURL('image/jpeg', 1.0);
            a.download = 'chart_with_card.jpg';
            a.click();
        });
    });

    document.getElementById('downloadPDFChart').addEventListener('click', function () {
        html2canvas(document.querySelector('.card-Chart-Pie')).then(canvas => {
            const {
                jsPDF
            } = window.jspdf;
            const imgData = canvas.toDataURL('image/jpeg', 1.0);
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            const pdfWidth = 180;
            const imgProps = canvas.width / canvas.height;
            const pdfHeight = pdfWidth / imgProps;

            pdf.addImage(imgData, 'JPEG', 15, 40, pdfWidth, pdfHeight);
            pdf.save("chart_with_card.pdf");
        });
    });
});

// Grafik Bar Merah
Highcharts.chart('chart-container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            '220605110001', '220605110136', '220605110017', '220605110033',
            '220605110068', '220605110063', '220605110071', '220605110117',
            '220605110070', '220605110056', '220605110113', '220605110099',
            '220605110072', '220605110085', '220605110005', '220605110059',
            '220605110154', '220605110135', '220605110100', '220605110102'
        ],
        labels: {
            rotation: -45
        }
    },
    yAxis: {
        min: 0,
        max: 4,
        title: {
            text: 'Nilai IPS'
        }
    },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                inside: true,
                style: {
                    color: '#ffffff',
                    textOutline: '1px contrast',
                    fontWeight: 'bold',
                    fontSize: '14px'
                }
            }
        }
    },
    tooltip: {
        valueDecimals: 2
    },
    series: [{
        name: 'Nilai IPS',
        data: [
            4.00, 4.00, 4.00, 4.00, 3.98, 3.98, 3.98, 3.98, 3.95, 3.95,
            3.93, 3.91, 3.91, 3.91, 3.89, 3.89, 3.86, 3.86, 3.86, 3.86
        ],
        color: '#d9534f',
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'center',
            verticalAlign: 'top',
            format: '{point.y:.2f}',
            y: 10,
            style: {
                fontSize: '14px',
                fontWeight: 'bold'
            }
        }
    }]
});

// Grafik Bar Biru
Highcharts.chart('chart-container-second', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            '220605110001', '220605110136', '220605110017', '220605110033',
            '220605110068', '220605110063', '220605110071', '220605110117',
            '220605110070', '220605110056', '220605110113', '220605110099',
            '220605110072', '220605110085', '220605110005', '220605110059',
            '220605110154', '220605110135', '220605110100', '220605110102'
        ],
        labels: {
            rotation: -45
        }
    },
    yAxis: {
        min: 0,
        max: 4,
        title: {
            text: 'Nilai IPK'
        }
    },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                inside: true,
                verticalAlign: 'top',
                style: {
                    color: '#ffffff',
                    textOutline: '1px contrast',
                    fontWeight: 'bold',
                    fontSize: '14px'
                }
            }
        }
    },
    tooltip: {
        valueDecimals: 2
    },
    series: [{
        name: 'Nilai IPS',
        data: [
            4.00, 3.97, 3.96, 3.95, 3.95, 3.95, 3.93, 3.93, 3.93, 3.91,
            3.90, 3.90, 3.90, 3.89, 3.87, 3.85, 3.85, 3.85, 3.83, 3.80
        ],
        color: 'rgb(44, 114, 199)',
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'center',
            format: '{point.y:.2f}',
            y: 10,
            style: {
                fontSize: '14px',
                fontWeight: 'bold'
            }
        }
    }]
});

// Fungsi Dropdown Menu
function toggleDropdownChart() {
    const menu = document.getElementById("exportMenu-chart");
    menu.classList.toggle("hidden");
}

function toggleDropdownBarIP() {
    const menu = document.getElementById("exportMenu-barIP");
    menu.classList.toggle("hidden");
}

function toggleDropdownBarIPK() {
    const menu = document.getElementById("exportMenu-barIPK");
    menu.classList.toggle("hidden");
}

// Fungsi Nutup Dropdown chart
document.addEventListener("click", function (event) {
    const dropdownButton = document.getElementById("dropdownButton-statistik-chart");
    const menu = document.getElementById("exportMenu-chart");

    if (!dropdownButton.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.add("hidden");
    }
});

// — Fungsi nutup dropdown bar merah —
document.addEventListener('click', function (event) {
    const btn = document.getElementById("dropdownButton");
    const menu = document.getElementById("exportMenu-barIP");
    if (!btn.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.add("hidden");
    }
});

// — Fungsi nutup dropdown bar biru —
document.addEventListener('click', function (event) {
    const btn = document.getElementById("dropdownButtonIPK");
    const menu = document.getElementById("exportMenu-barIPK");
    if (!btn.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.add("hidden");
    }
});

// — Download handlers Bar Merah —
document.getElementById('downloadPNGBar').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const a = document.createElement('a');
        a.href = canvas.toDataURL('image/png');
        a.download = 'bar_chart_with_card.png';
        a.click();
    });
});

document.getElementById('downloadJPEGBar').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const a = document.createElement('a');
        a.href = canvas.toDataURL('image/jpeg', 1.0);
        a.download = 'bar_chart_with_card.jpg';
        a.click();
    });
});

document.getElementById('downloadPDFBar').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const {
            jsPDF
        } = window.jspdf;
        const pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4'
        });
        const imgData = canvas.toDataURL('image/jpeg', 1.0);
        // hitung proporsi agar pas di A4
        const pdfWidth = 180;
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
        pdf.addImage(imgData, 'JPEG', 15, 40, pdfWidth, pdfHeight);
        pdf.save('bar_chart_with_card.pdf');
    });
});

// — Download handlers bar biru —
document.getElementById('downloadPNGBarRed').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const a = document.createElement('a');
        a.href = canvas.toDataURL('image/png');
        a.download = 'bar_chart_with_card.png';
        a.click();
    });
});

document.getElementById('downloadJPEGBarRed').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const a = document.createElement('a');
        a.href = canvas.toDataURL('image/jpeg', 1.0);
        a.download = 'bar_chart_with_card.jpg';
        a.click();
    });
});

document.getElementById('downloadPDFBarRed').addEventListener('click', function (e) {
    e.preventDefault();
    html2canvas(document.querySelector('.card-chart-second')).then(canvas => {
        const {
            jsPDF
        } = window.jspdf;
        const pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4'
        });
        const imgData = canvas.toDataURL('image/jpeg', 1.0);
        // hitung proporsi agar pas di A4
        const pdfWidth = 180;
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
        pdf.addImage(imgData, 'JPEG', 15, 40, pdfWidth, pdfHeight);
        pdf.save('bar_chart_with_card.pdf');
    });
});


