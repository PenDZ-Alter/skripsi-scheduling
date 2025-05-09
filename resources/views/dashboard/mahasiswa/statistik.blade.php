@extends('dashboard.mahasiswa.master')

@section('content')
<div class="card-Chart">
    <!-- 📊 Grafik Indeks Prestasi -->
    <div id="grafikContainer" class="chart-IP">
        <!-- Tombol Ekspor -->
        <div class="top-2 right-2 dropdown-button">
            <div id="dropdownButton" class="dropdown-menu" onclick="toggleDropdown()">
                ☰
            </div>
            <ul id="exportMenu" class="hidden export-menu">
                <li><a href="#" id="downloadPNG" class="menu-item">Download PNG</a></li>
                <li><a href="#" id="downloadJPEG" class="menu-item">Download JPEG</a></li>
                <li><a href="#" id="downloadPDF" class="menu-item">Download PDF</a></li>
            </ul>
        </div>

        <!-- Judul -->
        <h3 class="chart-IP-text">Grafik Indeks Prestasi</h3>
        <p class="mahasiswa-Information">
            220605110025 - <span class="mahasiswa-Name">ALFARIZ MUHAN MANDEGA</span>
        </p>
        <canvas id="grafikIP" height="110" width="auto"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection
