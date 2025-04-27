@extends('dashboard.master')

@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: none;
        /* Pastikan tabel memiliki latar belakang */
    }

    table th,
    table td {
        vertical-align: middle;
        /* Meratakan konten secara vertikal */
        padding: 11px;
        border-bottom: 1px solid black;
    }

    table th {
        background-color: #f9b42d;
        /* Warna latar belakang header */
        color: white;
        /* Warna teks di header */
    }

    table tr:hover {
        background-color: #ffd682;
        /* Efek hover pada baris */
    }

    .keterangan {
        padding: 10px 15px;
        background-color: white;
        border-radius: 15px;
    }
</style>
<div class="content">
    <!-- Tabel Pembayaran -->
    <table class="w-full border-collapse mb-8">
        <thead>
            <tr>
                <th class="">No</th>
                <th class="">Kode Matakuliah</th>
                <th class="">Nama Matakuliah</th>
                <th class="">SKS</th>
                <th class="">Nilai Angka</th>
                <th class="">Nilai Huruf</th>
                <th class="">SKS x Nilai Angka</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td class="">1</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">2</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">3</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">4</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">5</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">6</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">7</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">8</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
                <td class="">9</td>
                <td class="">1565002</td>
                <td class="">KALKULUS</td>
                <td class="">3</td>
                <td class="">4</td>
                <td class="">A</td>
                <td class="text-center">12</td>
            </tr>
            <tr class="">
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