@extends('dashboard.mahasiswa.master')

@section('content')
    <!-- Card Chart Pie -->
    <div class="card-Chart-Pie fade-in-up">
        <div style="width: 200px; height: 200px; margin: auto;">
            <canvas id="nilaiChart"></canvas>
        </div>
    </div>

    <!-- Card Emoji -->
    <div class="emoji-section fade-in-up">
        <div class="dropdown-button-statistik">
            <div id="dropdownButton" class="dropdown-menu-statistik" onclick="toggleDropdown()">☰</div>
            <ul id="exportMenu" class="hidden export-menu-statistik fade-in-up">
                <li><a href="#" id="downloadChart" class="menu-item-statistik">Download Chart</a></li>
                <li><a href="#" id="downloadBar" class="menu-item-statistik">Download Bar</a></li>
            </ul>
        </div>
        <h2 class="card-Emoji-header">Peringkat Indeks Prestasi Anda</h2>
        <div class="emoji-card-wrapper">
            <div class="card-Emoji">
                <div class="emoji">😘👌</div>
                <div class="angka">1 / 168</div>
                <div class="keterangan">IP Semester 4.00</div>
            </div>
            <div class="card-Emoji">
                <div class="emoji">😘👌</div>
                <div class="angka">1 / 168</div>
                <div class="keterangan">IP Kumulatif 4.00</div>
            </div>
        </div>
    </div>

    <!-- Card Chart Bar -->
    <div class="chart-card fade-in-up">
        <div class="card-body">
            <h2 class="card-title">Sebaran Indeks Prestasi Semester</h2>
            <p class="card-text">Semester Ganjil Tahun 2024/2025 Seangkatan Sejurusan</p>
            <div id="chart-container" style="height: 400px;"></div>
        </div>
    </div>

    <!-- Card Chart Bar 2 -->
    <div class="chart-card fade-in-up">
        <div class="card-body">
            <h2 class="card-title">Sebaran Indeks Prestasi Kumulatif</h2>
            <p class="card-text">Semester Ganjil Tahun 2024/2025 Seangkatan Sejurusan</p>
            <div id="chart-container-second" style="height: 400px;"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        const ctx = document.getElementById('nilaiChart').getContext('2d');
        const nilaiChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['A', 'B+', 'B', 'C+', 'C'],
                datasets: [{
                    data: [47.1, 31.4, 11.8, 5.9, 3.9],
                    backgroundColor: ['#7CB5EC', '#66BB6A', '#424242', '#7E57C2', '#FFA726']
                }]
            },
            options: {
                plugins: {
                    outlabels: {
                        text: '%l: %p',
                        color: 'black',
                        stretch: 30,
                        font: {
                            resizable: true,
                            minSize: 12,
                            maxSize: 14
                        },
                        lineColor: 'black',
                        lineWidth: 1
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
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>
    <script>
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
    </script>
    <script>
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
    </script>
@endsection
