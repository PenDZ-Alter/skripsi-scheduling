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
        <!-- Tabs for Riwayat Pengajuan and Proses Bimbingan -->
        <div class="tabs">
            <button class="active" id="tabRiwayat"><i class="fa fa-newspaper"></i>&nbsp;Kartu Hasil Studi</button>
            <button id="tabProses"><i class="fa fa-bar-chart"></i>&nbsp;Rincian Presentase & Nilai</button>
        </div>

        <!-- Tabel KHS Hasil Studi -->
        <table class="w-full border-collapse mb-8" onclick="openModal()">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Matakuliah</th>
                    <th class="text-center">Nama Matakuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Nilai Angka</th>
                    <th class="text-center">Nilai Huruf</th>
                    <th class="text-center">SKS x Nilai Angka</th>
                </tr>
            </thead>

            <tbody>
                <tr class="text-center">
                    <td class="">1</td>
                    <td class="">1565021</td>
                    <td class="">SISTEM INFORMASI</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">2</td>
                    <td class="">1565022</td>
                    <td class="">PEMROGRAMAN MULTIMEDIA & GAME</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">3</td>
                    <td class="">1565023</td>
                    <td class="">SISTEM TERDISTRIBUSI & KEAMANAN</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">4</td>
                    <td class="">1565024</td>
                    <td class="">SISTEM OPERASI</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">5</td>
                    <td class="">1565025</td>
                    <td class="">PRAKTIKUM PEMROGRAMAN MOBILE</td>
                    <td class="">1</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">4</td>
                </tr>
                <tr class="text-center">
                    <td class="">6</td>
                    <td class="">1565026</td>
                    <td class="">PRAKTIKUM SISTEM INFORMASI</td>
                    <td class="">1</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">4</td>
                </tr>
                <tr class="text-center">
                    <td class="">7</td>
                    <td class="">1565027</td>
                    <td class="">PRAKTIKUM PEMROGRAMAN MULTIMEDIA & GAME</td>
                    <td class="">1</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">4</td>
                </tr>
                <tr class="text-center">
                    <td class="">8</td>
                    <td class="">1565028</td>
                    <td class="">PRAKTIKUM SISTEM TERDISTRIBUSI & KEAMANAN</td>
                    <td class="">1</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">4</td>
                </tr>
                <tr class="text-center">
                    <td class="">9</td>
                    <td class="">1565029</td>
                    <td class="">RESEARCH METHODOLOGY</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">10</td>
                    <td class="">1565030</td>
                    <td class="">MOBILE PROGRAMMING</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="">
                    <td colspan="4" class="text-center">TOTAL</td>
                    <td class="text-center">24</td>
                    <td class="text-center"></td>
                    <td class="text-center">96</td>
                </tr>
                <tr class="">
                    <td colspan="5" class="text-center">IPK (Indeks Prestasi Kumulatif)= (SKS x Nilai Angka) / Jumlah
                        SKS</td>
                    <td colspan="2" class="text-center">4.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection