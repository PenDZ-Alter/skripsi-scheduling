<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skripsi UIN Malang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2f9b9b;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .profile p {
            margin: 10px 0;
            font-size: 18px;
            font-weight: bold;
        }

        nav ul {
            list-style-type: none;
            margin-top: 20px;
        }

        nav ul li {
            margin: 15px 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li.active a {
            background-color: #f9b42d;
            padding: 10px;
            border-radius: 5px;
        }

        .content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .status p {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f9b42d;
            color: white;
        }

        .keterangan {
            margin-top: 30px;
        }

        .keterangan h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .keterangan p {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <p>Alfariz Muhan M</p>
                <p>220605110001</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profil Mahasiswa</a></li>
                    <li class="active"><a href="#">Pembayaran</a></li>
                    <li><a href="#">Hasil Studi</a></li>
                    <li><a href="#">Statistik</a></li>
                    <li><a href="#">Transkrip</a></li>
                    <li><a href="#">Skripsi</a></li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <header>
                <h1>Skripsi &gt; Pembayaran</h1>
                <div class="status">
                    <p>Mahasiswa Aktif</p>
                </div>
            </header>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Tagihan</th>
                        <th>Nominal</th>
                        <th>Tahun Akademik</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>220605110001</td>
                        <td>ALFARIZ MUHAN MANDEGA</td>
                        <td>TEKNIK INFORMATIKA</td>
                        <td>SPP</td>
                        <td>1.000.000</td>
                        <td>2022/2</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>220605110001</td>
                        <td>ALFARIZ MUHAN MANDEGA</td>
                        <td>TEKNIK INFORMATIKA</td>
                        <td>SPP</td>
                        <td>1.000.000</td>
                        <td>2023/1</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>220605110001</td>
                        <td>ALFARIZ MUHAN MANDEGA</td>
                        <td>TEKNIK INFORMATIKA</td>
                        <td>SPP</td>
                        <td>1.000.000</td>
                        <td>2023/1</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>220605110001</td>
                        <td>ALFARIZ MUHAN MANDEGA</td>
                        <td>TEKNIK INFORMATIKA</td>
                        <td>SPP</td>
                        <td>1.000.000</td>
                        <td>2023/1</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>220605110001</td>
                        <td>ALFARIZ MUHAN MANDEGA</td>
                        <td>TEKNIK INFORMATIKA</td>
                        <td>SPP</td>
                        <td>1.000.000</td>
                        <td>2023/1</td>
                        <td>Lunas</td>
                    </tr>
                </tbody>
            </table>

            <div class="keterangan">
                <h3>Keterangan</h3>
                <p>1. Pembayaran bisa dilakukan di bank BSI/BTNS/BTN/BRI/MANDIRI/BNI terdekat, dengan NIM sebagai ID
                    pembayaran.</p>
                <p>2. Pembayaran juga bisa dilakukan melalui mobile banking, tergantung ketersediaan fitur di setiap
                    aplikasi bank.</p>
            </div>
        </div>
    </div>
</body>

</html>