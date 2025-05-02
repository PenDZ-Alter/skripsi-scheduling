@extends('dashboard.master')

@section('content')
<div class="content">
    <!-- Tabel Pembayaran -->
    <table class="w-full border-collapse mb-8">
        <thead>
            <tr>
                <th class="bg-yellow-500 text-white">No</th>
                <th class="bg-yellow-500 text-white">NIM</th>
                <th class="bg-yellow-500 text-white">Nama</th>
                <th class="bg-yellow-500 text-white">Jurusan</th>
                <th class="bg-yellow-500 text-white">Tagihan</th>
                <th class="bg-yellow-500 text-white">Nominal</th>
                <th class="bg-yellow-500 text-white">Tahun Akademik</th>
                <th class="bg-yellow-500 text-white">Status</th>
            </tr>
        </thead>
        <tbody>
            <h2>ini bagian STATISTIK</h2>
            <tr class="hover:bg-gray-100">
                <td class="">1</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2022/2</td>
                <td class="">Lunas</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection