@extends('dashboard.mahasiswa.master')

@section('content')

<div class="content">
    <!-- Tabel Pembayaran -->
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