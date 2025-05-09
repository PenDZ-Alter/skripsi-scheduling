@extends('dashboard.master')

@section('content')
<div class="khs-container">
    <div class="filter-bar">
        <div>
            <label for="tahun" class="form-label">Tahun</label>
            <select id="tahun" class="form-select DropdownTahun">
                <option value="">Pilih Tahun</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>

        <div>
            <label for="semester" class="form-label">Semester</label>
            <select id="semester" class="form-select DropdownSemester">
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
            <button class="btn-cetak-khs">
                <i class="fa fa-print me-2"></i> Cetak KHS
            </button>
        </div>
    </div>

    <div class="content">
        <div class="tabs">
            <button class="tab-button active" id="tabRiwayat"><i class="fa fa-newspaper"></i>&nbsp;Kartu Hasil Studi</button>
            <button class="tab-button" id="tabProses"><i class="fa fa-bar-chart"></i>&nbsp;Rincian Presentase & Nilai</button>
        </div>

        <table class="table-khs" onclick="openModal()">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Nilai Angka</th>
                    <th>Nilai Huruf</th>
                    <th>SKS x Nilai Angka</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>1565002</td>
                    <td>KALKULUS</td>
                    <td>3</td>
                    <td>4</td>
                    <td>A</td>
                    <td>12</td>
                </tr>
                @endfor
                <tr>
                    <td colspan="4">TOTAL</td>
                    <td>40</td>
                    <td></td>
                    <td>120</td>
                </tr>
                <tr>
                    <td colspan="5">IPK = (SKS x Nilai Angka) / Jumlah SKS</td>
                    <td colspan="2">4.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">4</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">5</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">6</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">7</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">8</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">9</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="text-center">
                    <td class="">10</td>
                    <td class="">1565002</td>
                    <td class="">KALKULUS</td>
                    <td class="">3</td>
                    <td class="">4</td>
                    <td class="">A</td>
                    <td class="text-center">12</td>
                </tr>
                <tr class="">
                    <td colspan="4" class="text-center">TOTAL</td>
                    <td class="text-center">40</td>
                    <td class="text-center"></td>
                    <td class="text-center">120</td>
                </tr>
                <tr class="">
                    <td colspan="5" class="text-center">IPK (Indeks Prestasi Kumulatif) = (SKS x Nilai Angka) / Jumlah
                        SKS</td>
                    <td colspan="2" class="text-center">4.00</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
