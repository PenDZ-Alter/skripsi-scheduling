@extends('dashboard.mahasiswa.master')
@section('content')
<div>
    <div style="padding-top: 2rem !important;" class="container d-flex align-items-center gap-3 mb-4">
        <div>
            <label for="tahun" class="form-label fw-semibold me-2">Tahun</label>
            <select id="tahun" class="form-select shadow-sm rounded DropdownTahun">
                <option value="">Pilih Tahun</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>

        <div>
            <label for="semester" class="form-label fw-semibold me-2">Semester</label>
            <select id="semester" class="form-select shadow-sm rounded DropdownSemester">
                <option value="">Pilih Semester</option>
                <option value="Ganjil 2022">Ganjil 2022</option>
                <option value="Genap 2022">Genap 2022</option>
                <option value="Ganjil 2023">Ganjil 2023</option>
                <option value="Genap 2023">Genap 2023</option>
                <option value="Ganjil 2024">Ganjil 2024</option>
                <option value="Genap 2024">Genap 2024</option>
                <option value="Ganjil 2025">Ganjil 2025</option>
                <option value="Genap 2025">Genap 2025</option>
            </select>
        </div>

        <div>
            <button class="btn btn-primary shadow-sm rounded px-4">
                <i class="fa fa-print me-2"></i> Cetak KHS
            </button>
        </div>
    </div>
    <div class="content">

        <div class="tabs">
            <button class="active" id="tabTranskrip"><i class="fa fa-list"></i>&nbsp;Transkrip Nilai Sementara</button>
            <button id="tabRiwayatKHS"><i class="fas fa-chart-line"></i>&nbsp;Riwayat KHS</button>
        </div>

        <!-- Tabel Transkrip -->
        <div class="tab-content active" id="cardTranskrip">
            <table class="w-full border-collapse mb-8 table text-center mx-auto">
                <thead>
                    <tr>
                        <th class="text-center px-4 py-2">No</th>
                        <th class="text-center px-4 py-2">Kode Matakuliah</th>
                        <th class="text-center px-4 py-2">Nama Matakuliah</th>
                        <th class="text-center px-4 py-2">SKS</th>
                        <th class="text-center px-4 py-2">Nilai Angka</th>
                        <th class="text-center px-4 py-2">Nilai Huruf</th>
                        <th class="text-center px-4 py-2">SKS x Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center px-4 py-2">
                        <td class="">1</td>
                        <td class="">1565021</td>
                        <td class="">SISTEM INFORMASI</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">2</td>
                        <td class="">1565022</td>
                        <td class="">PEMROGRAMAN MULTIMEDIA & GAME</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">3</td>
                        <td class="">1565023</td>
                        <td class="">SISTEM TERDISTRIBUSI & KEAMANAN</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">4</td>
                        <td class="">1565024</td>
                        <td class="">SISTEM OPERASI</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">5</td>
                        <td class="">1565025</td>
                        <td class="">PRAKTIKUM PEMROGRAMAN MOBILE</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">6</td>
                        <td class="">1565026</td>
                        <td class="">PRAKTIKUM SISTEM INFORMASI</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">7</td>
                        <td class="">1565027</td>
                        <td class="">PRAKTIKUM PEMROGRAMAN MULTIMEDIA & GAME</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">8</td>
                        <td class="">1565028</td>
                        <td class="">PRAKTIKUM SISTEM TERDISTRIBUSI & KEAMANAN</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">9</td>
                        <td class="">1565029</td>
                        <td class="">RESEARCH METHODOLOGY</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">10</td>
                        <td class="">1565030</td>
                        <td class="">MOBILE PROGRAMMING</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="konten1">
                        <td colspan="4" class="footer-konten" rowspan="1">TOTAL</td>
                        <td rowspan="1">40</td>
                        <td></td>
                        <td rowspan="1">120</td>
                    </tr>
                    <tr class="konten2">
                        <td colspan="5">IPK (Indeks Prestasi Kumulatif) = (SKS x Nilai Angka) / Jumlah
                            SKS</td>
                        <td colspan="2">4.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="tab-content" id="cardRiwayat" style="display: none">
            <table class="w-full border-collapse mb-8 table text-center mx-auto">
                <thead>
                    <tr>
                        <th class="text-center px-4 py-2">No</th>
                        <th class="text-center px-4 py-2">Kode Matakuliah</th>
                        <th class="text-center px-4 py-2">Nama Matakuliah</th>
                        <th class="text-center px-4 py-2">SKS</th>
                        <th class="text-center px-4 py-2">Nilai Angka</th>
                        <th class="text-center px-4 py-2">Nilai Huruf</th>
                        <th class="text-center px-4 py-2">SKS x Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center px-4 py-2">
                        <td class="">1</td>
                        <td class="">1565021</td>
                        <td class="">SISTEM INFORMASI</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">2</td>
                        <td class="">1565022</td>
                        <td class="">PEMROGRAMAN MULTIMEDIA & GAME</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">3</td>
                        <td class="">1565023</td>
                        <td class="">SISTEM TERDISTRIBUSI & KEAMANAN</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">4</td>
                        <td class="">1565024</td>
                        <td class="">SISTEM OPERASI</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">5</td>
                        <td class="">1565025</td>
                        <td class="">PRAKTIKUM PEMROGRAMAN MOBILE</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">6</td>
                        <td class="">1565026</td>
                        <td class="">PRAKTIKUM SISTEM INFORMASI</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">7</td>
                        <td class="">1565027</td>
                        <td class="">PRAKTIKUM PEMROGRAMAN MULTIMEDIA & GAME</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">8</td>
                        <td class="">1565028</td>
                        <td class="">PRAKTIKUM SISTEM TERDISTRIBUSI & KEAMANAN</td>
                        <td class="">1</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">4</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">9</td>
                        <td class="">1565029</td>
                        <td class="">RESEARCH METHODOLOGY</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                    <tr class="text-center px-4 py-2">
                        <td class="">10</td>
                        <td class="">1565030</td>
                        <td class="">MOBILE PROGRAMMING</td>
                        <td class="">3</td>
                        <td class="">4</td>
                        <td class="">A</td>
                        <td class="text-center px-4 py-2">12</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection