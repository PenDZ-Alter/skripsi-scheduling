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
        <div class="dropdown-button-statistik-chart">
            <div id="dropdownButton-statistik-chart" class="dropdown-menu-statistik-chart" onclick="toggleDropdownChart()">☰
            </div>
            <ul id="exportMenu-chart" class="hidden export-menu-statistik-chart fade-in-up">
                <li><a href="#" id="downloadPNGChart" class="menu-item-statistik-chart">Download PNG Chart</a></li>
                <li><a href="#" id="downloadJPEGChart" class="menu-item-statistik-chart">Download JPEG Chart</a></li>
                <li><a href="#" id="downloadPDFChart" class="menu-item-statistik-chart">Download PDF Chart</a></li>
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
            <div class="dropdown-button-statistik-bar">
                <div id="dropdownButton" class="dropdown-menu-statistik-bar" onclick="toggleDropdownBarIP()">☰</div>
                <ul id="exportMenu-barIP" class="hidden export-menu-statistik-bar fade-in-up">
                    <li><a href="#" id="downloadPNGBar" class="menu-item-statistik-bar">Download PNG Bar</a></li>
                    <li><a href="#" id="downloadJPEGBar" class="menu-item-statistik-bar">Download JPEG Bar</a></li>
                    <li><a href="#" id="downloadPDFBar" class="menu-item-statistik-bar">Download PDF Bar</a></li>
                </ul>
            </div>
            <div class="card-chart">
                <h2 class="card-title">Sebaran Indeks Prestasi Semester</h2>
                <p class="card-text">Semester Ganjil Tahun 2024/2025 Seangkatan Sejurusan</p>
                <div id="chart-container" style="height: 400px;"></div>
            </div>
        </div>
    </div>

    <!-- Card Chart Bar 2 -->
    <div class="chart-card fade-in-up">
        <div class="card-body">
            <div class="dropdown-button-statistik-bar">
                <div id="dropdownButtonIPK" class="dropdown-menu-statistik-bar" onclick="toggleDropdownBarIPK()">☰</div>
                <ul id="exportMenu-barIPK" class="hidden export-menu-statistik-bar fade-in-up">
                    <li><a href="#" id="downloadPNGBarRed" class="menu-item-statistik-bar">Download PNG Bar</a></li>
                    <li><a href="#" id="downloadJPEGBarRed" class="menu-item-statistik-bar">Download JPEG Bar</a></li>
                    <li><a href="#" id="downloadPDFBarRed" class="menu-item-statistik-bar">Download PDF Bar</a></li>
                </ul>
            </div>
            <div class="card-chart-second">
                <h2 class="card-title">Sebaran Indeks Prestasi Kumulatif</h2>
                <p class="card-text">Semester Ganjil Tahun 2024/2025 Seangkatan Sejurusan</p>
                <div id="chart-container-second" style="height: 400px;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endsection
