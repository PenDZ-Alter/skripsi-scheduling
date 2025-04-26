@extends('dashboard.master')

@section('content')
<div class="content">
    <!-- Tabel Pembayaran -->
    <table class="border-collapse mb-3">
        <thead>
            <tr>
                <th class="py-3 px-6 text-left bg-yellow-500">No</th>
                <th class="py-3 px-6 text-left bg-yellow-500">NIM</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Nama</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Jurusan</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Tagihan</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Nominal</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Tahun Akademik</th>
                <th class="py-3 px-6 text-left bg-yellow-500">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td class="py-3 px-6">1</td>
                <td class="py-3 px-6">220605110001</td>
                <td class="py-3 px-6">ALFARIZ MUHAN MANDEGA</td>
                <td class="py-3 px-6">TEKNIK INFORMATIKA</td>
                <td class="py-3 px-6">SPP</td>
                <td class="py-3 px-6">1.000.000</td>
                <td class="py-3 px-6">2022/2</td>
                <td class="py-3 px-6">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-6">2</td>
                <td class="py-3 px-6">220605110001</td>
                <td class="py-3 px-6">ALFARIZ MUHAN MANDEGA</td>
                <td class="py-3 px-6">TEKNIK INFORMATIKA</td>
                <td class="py-3 px-6">SPP</td>
                <td class="py-3 px-6">1.000.000</td>
                <td class="py-3 px-6">2023/1</td>
                <td class="py-3 px-6">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-6">3</td>
                <td class="py-3 px-6">220605110001</td>
                <td class="py-3 px-6">ALFARIZ MUHAN MANDEGA</td>
                <td class="py-3 px-6">TEKNIK INFORMATIKA</td>
                <td class="py-3 px-6">SPP</td>
                <td class="py-3 px-6">1.000.000</td>
                <td class="py-3 px-6">2023/1</td>
                <td class="py-3 px-6">Lunas</td>
            </tr>
            <!-- Add more rows as necessary -->
        </tbody>
    </table>

    <!-- Keterangan -->
    <div class="keterangan mt-10">
        <h3 class="text-xl font-bold mb-3">Keterangan</h3>
        <p class="text-lg mb-3">1. Pembayaran bisa dilakukan di bank BSI/BTNS/BTN/BRI/MANDIRI/BNI terdekat, dengan NIM
            sebagai ID pembayaran.</p>
        <p class="text-lg mb-3">2. Pembayaran juga bisa dilakukan melalui mobile banking, tergantung ketersediaan fitur
            di setiap aplikasi bank.</p>
    </div>
</div>
@endsection