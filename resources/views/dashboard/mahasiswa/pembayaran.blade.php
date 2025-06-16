@extends('dashboard.mahasiswa.master')

@section('content')
    <div class="content fade-in-up">
        <!-- Tabel Pembayaran -->
        <table class="w-full border-collapse mb-8">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2">No</th>
                    <th class="text-left px-4 py-2">No. Tes/NIM</th>
                    <th class="text-left px-4 py-2">Nama</th>
                    <th class="text-left px-4 py-2">Jurusan</th>
                    <th class="text-left px-4 py-2">Tagihan</th>
                    <th class="text-left px-4 py-2">Nominal</th>
                    <th class="text-left px-4 py-2">Tahun Akademik</th>
                    <th class="text-left px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">1</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2022-02-01</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">2</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2023-01-30</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">3</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2023-08-21</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">4</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2024-02-21</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">5</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2024-08-20</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">6</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2025-02-01</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="text-left px-4 py-2">7</td>
                    <td class="text-left px-4 py-2">220605110131</td>
                    <td class="text-left px-4 py-2">ALFARIZ MUHAN MANDEGA</td>
                    <td class="text-left px-4 py-2">TEKNIK INFORMATIKA</td>
                    <td class="text-left px-4 py-2">SPP</td>
                    <td class="text-left px-4 py-2">1.000.000</td>
                    <td class="text-left px-4 py-2">2025-07-30</td>
                    <td class="text-left px-4 py-2">Lunas</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content-second fade-in-up">
        <h3 class="content-header">RINCIAN TERBAYAR</h3>
        <ul class="section-content">
            <li>REGISTRASI_(Rp. 7,500,000)</li>
            <li>SPP_(Rp. 14,500,000)</li>
        </ul>
    </div>

    <div class="content-third fade-in-up">
        <h3 class="content-header-two">KETERANGAN</h3>
        <ul class="section-content-two">
            <li>Pembayaran bisa dilakukan di bank <span class="bank">BSI/BTNS/BTN/BRI/MANDIRI/BNI</span> terdekat, dengan <span class="id">NIM</span> sebagai <span class="id">ID pembayaran</span></li>
            <li>Pembayaran juga bisa dilakukan melalui mobile banking, tergantung ketersediaan fitur di setiap aplikasi bank.</li>
            <li>Sebelum melakukan pembayaran, pastikan tagihan yang keluar atas nama lengkap Anda dan sesuai nominalnya.</li>
            <li>Pembayaran dinyatakan sukses bila status bayar menjadi centang hijau. Simpan baik-baik bukti pembayaran Anda.</li>
            <li>Bagi mahasiswa pascaasarjana, tagihan wisuda muncul setelah mendaftar wisuda online dan diklik lulus skripsi oleh jurusan.</li>
            <li>Rekapan di atas tidak dapat menggantikan slip bayar yang hilang. Layanan konsultasi hubungi Bagian Keuangan Rektorat lt.2</li>
            <li>Pertanyaan, konsultasi UKT serta proses SKBT (Surat Keterangan Bebas Tanggungan) melalui email <a href="https://studentfinance.uin-malang.ac.id/" target="_blank" ><span class="link">studentfinance@uin-malang.ac.id</span></a></li>
        </ul>
    </div>
@endsection
