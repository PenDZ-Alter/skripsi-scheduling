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
            <tr class="hover:bg-gray-100">
                <td class="">2</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="">3</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="">4</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="">5</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="">6</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="">7</td>
                <td class="">220605110001</td>
                <td class="">ALFARIZ MUHAN MANDEGA</td>
                <td class="">TEKNIK INFORMATIKA</td>
                <td class="">SPP</td>
                <td class="">1.000.000</td>
                <td class="">2023/1</td>
                <td class="">Lunas</td>
            </tr>
        </tbody>
    </table>

    <!-- Keterangan -->
    <div class="keterangan mt-10">
        <h3 class="text-xl" style="font-weight:bold;">Keterangan</h3>
        <p class="text-lg mb-3">1. Pembayaran bisa dilakukan di bank BSI/BTNS/BTN/BRI/MANDIRI/BNI terdekat, dengan NIM
            sebagai ID pembayaran.</p>
        <p class="text-lg mb-3">2. Pembayaran juga bisa dilakukan melalui mobile banking, tergantung ketersediaan fitur
            di setiap aplikasi bank.</p>
    </div>
</div>
@endsection