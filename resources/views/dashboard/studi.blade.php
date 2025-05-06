@extends('dashboard.master')

@section('content')

<div class="content">
    <div class="container">
        {{-- <div class="filter-group"> --}}
            <label for="tahun">Tahun</label>
            <select id="tahun">
                <option value="">Pilih Tahun</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>

            <label for="semester">&nbsp; Semester</label>
            <select id="semester">
                <option value="">Pilih Semester</option>
                <option value="Ganjil 2022">Ganjil 2022</option>
                <option value="Genap 2022">Genap 2022</option>
                <option value="Ganjil 2023">Ganjil 2023</option>
                <option value="Genap 2023">Genap 2023</option>
                <option value="Ganjil 2024">Ganjil 2024</option>
                <option value="Genap 2024">Genap 2024</option>
                <option value="Ganjil 2025">Ganjil 2025</option>
                <option value="Genap 2025">Genap 2025</option>
            </select><br>
        {{-- </div> --}}

        {{-- <div class="button-group"> --}}
            <button class="btn">
                <!-- Icon printer pakai SVG biar mirip -->
                <svg fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v5h1a1 1 0 0 1 1 1v3h-4v-3H5v3H1v-3a1 1 0 0 1 1-1h1V7z"/>
                    <path fill-rule="evenodd" d="M5 1a2 2 0 0 0-2 2v2h10V3a2 2 0 0 0-2-2H5z"/>
                </svg>
                Cetak KHS
            </button><br><br>
        {{-- </div> --}}
    </div><br>


    <!-- Tabel KHS Hasil Studi -->
    <table class="w-full border-collapse mb-8">
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
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="text-center">
                <td class="">2</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="text-center">
                <td class="">3</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
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
                <td colspan="5" class="text-center">IPK (Indeks Prestasi Kumulatif) = (SKS x Nilai Angka) / Jumlah SKS</td>
                <td colspan="2" class="text-center">4.00</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
