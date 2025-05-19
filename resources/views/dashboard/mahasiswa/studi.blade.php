@extends('dashboard.mahasiswa.master')
@section('content')
    <div class="card-header-studi fade-in-up">
        <div class="container">
            <div>
                <label for="tahun" class="form-label">Tahun</label>
                <select id="tahun" class="form-select">
                    <option value="">Pilih Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>

            <div>
                <label for="semester" class="form-label">Semester</label>
                <select id="semester" class="form-select">
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
                <button class="btn btn-primary shadow-sm rounded px-4" onclick="downloadPDF()">
                    <i class="fa fa-print me-2"></i> Cetak KHS
                </button>
            </div>
        </div>
    </div>
    <div class="card-content-studi fade-in-up">
        <div class="content-studi1">
            <div class="tabs">
                <button class="active" id="tabTranskrip"><i class="fas fa-newspaper"></i>&nbsp;Kartu Hasil
                    Studi</button>
                <button id="tabRiwayatKHS"><i class="fas fa-chart-line"></i>&nbsp;Rincian Presentase & Nilai</button>
            </div>
            <!-- Tabel Transkrip -->
            <div class="tab-content active" id="cardTranskrip">
                <table id="khsTable" class="w-full border-collapse mb-8 table text-center mx-auto table-studi">
                    <thead>
                        <tr>
                            <th class="text-center px-4 py-2">No</th>
                            <th class="text-center px-4 py-2">Kode Matakuliah</th>
                            <th class="text-center px-4 py-2">Nama Matakuliah</th>
                            <th class="text-center px-4 py-2">SKS</th>
                            <th class="text-center px-4 py-2">Nilai Angka</th>
                            <th class="text-center px-4 py-2">Nilai Huruf</th>
                            <th class="text-center px-4 py-2">SKS x Nilai Angka</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center px-4 py-2">
                            <td class="">1</td>
                            <td class="">1565021</td>
                            <td class="">SISTEM INFORMASI</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">2</td>
                            <td class="">1565022</td>
                            <td class="">PEMROGRAMAN MULTIMEDIA & GAME</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">3</td>
                            <td class="">1565023</td>
                            <td class="">SISTEM TERDISTRIBUSI & KEAMANAN</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">4</td>
                            <td class="">1565024</td>
                            <td class="">SISTEM OPERASI</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">5</td>
                            <td class="">1565025</td>
                            <td class="">PRAKTIKUM PEMROGRAMAN MOBILE</td>
                            <td class="">1</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">4</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">6</td>
                            <td class="">1565026</td>
                            <td class="">PRAKTIKUM SISTEM INFORMASI</td>
                            <td class="">1</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">4</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">7</td>
                            <td class="">1565027</td>
                            <td class="">PRAKTIKUM PEMROGRAMAN MULTIMEDIA & GAME</td>
                            <td class="">1</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">4</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">8</td>
                            <td class="">1565028</td>
                            <td class="">PRAKTIKUM SISTEM TERDISTRIBUSI & KEAMANAN</td>
                            <td class="">1</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">4</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">9</td>
                            <td class="">1565029</td>
                            <td class="">RESEARCH METHODOLOGY</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                        <tr class="text-center px-4 py-2">
                            <td class="">10</td>
                            <td class="">1565030</td>
                            <td class="">MOBILE PROGRAMMING</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">A</td>
                            <td class="text-center px-4 py-2">12</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="konten1">
                            <td colspan="4" class="footer-konten" rowspan="1">TOTAL</td>
                            <td rowspan="1">40</td>
                            <td></td>
                            <td rowspan="1">120</td>
                        </tr>
                        <tr class="konten2">
                            <td colspan="5" class="footer-konten">IPK (Indeks Prestasi Kumulatif) = (SKS x Nilai
                                Angka)
                                / Jumlah
                                SKS</td>
                            <td colspan="2">4.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="content-studi2 zoom-in" id="cardRiwayat" style="display: none">
            <div class="table-responsive">
                <table class="table table-presentase table-hover table-striped table-sm">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Kode Mata kuliah</th>
                            <th rowspan="2">Nama Mata kuliah</th>
                            <th colspan="5">Persentase</th>
                            <th colspan="5">Nilai Detail</th>
                            <th rowspan="2">SKS</th>
                            <th colspan="2">Nilai Akhir</th>
                            <th rowspan="2">SKS x Nilai Huruf</th>
                        </tr>
                        <tr>
                            <th>Praktik</th>
                            <th>Tugas</th>
                            <th>Quiz</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Praktik</th>
                            <th>Tugas</th>
                            <th>Quiz</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Angka</th>
                            <th>Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1565021</td>
                            <td>SISTEM INFORMASI</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">100%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>1565022</td>
                            <td>PEMROGRAMAN MULTIMEDIA &amp; GAME</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">20%</td>
                            <td class="text-center text-muted">10%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">40%</td>
                            <td>0</td>
                            <td>100</td>
                            <td>100</td>
                            <td>10</td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>1565023</td>
                            <td>SISTEM TERDISTRIBUSI &amp; KEAMANAN</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">35%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">35%</td>
                            <td>0</td>
                            <td>100</td>
                            <td>0</td>
                            <td>100</td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>1565028</td>
                            <td>SISTEM OPERASI</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">20%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">35%</td>
                            <td class="text-center text-muted">45%</td>
                            <td>0</td>
                            <td>100</td>
                            <td>0</td>
                            <td>100</td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td>1565035</td>
                            <td>PRAKTIKUM PEMROGRAMAN MOBILE</td>
                            <td class="text-center text-muted">25%</td>
                            <td class="text-center text-muted">15%</td>
                            <td class="text-center text-muted">10%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">20%</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>1</td>
                            <td>100</td>
                            <td>A</td>
                            <td>4</td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td>1565040</td>
                            <td>PRAKTIKUM SISTEM INFORMASI</td>
                            <td class="text-center text-muted">15%</td>
                            <td class="text-center text-muted">15%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">40%</td>
                            <td>100</td>
                            <td>100</td>
                            <td></td>
                            <td>100</td>
                            <td>100</td>
                            <td>1</td>
                            <td>100</td>
                            <td>A</td>
                            <td>4</td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td>1565043</td>
                            <td>PRAKTIKUM PEMROGRAMAN MULTIMEDIA &amp; GAME</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">20%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">20%</td>
                            <td class="text-center text-muted">30%</td>
                            <td>100</td>
                            <td>100</td>
                            <td></td>
                            <td>100</td>
                            <td>100</td>
                            <td>1</td>
                            <td>100</td>
                            <td>A</td>
                            <td>4</td>
                        </tr>

                        <tr>
                            <td>8</td>
                            <td>1565044</td>
                            <td>PRAKTIKUM SISTEM TERDISTRIBUSI &amp; KEAMANAN</td>
                            <td class="text-center text-muted">35%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">35%</td>
                            <td>100</td>
                            <td>0</td>
                            <td>0</td>
                            <td>100</td>
                            <td>100</td>
                            <td>1</td>
                            <td>100</td>
                            <td>A</td>
                            <td>4</td>
                        </tr>

                        <tr>
                            <td>9</td>
                            <td>1700119</td>
                            <td>KULIAH KERJA MAHASISWA (KKM)</td>
                            <td class="text-center text-muted">%</td>
                            <td class="text-center text-muted">%</td>
                            <td class="text-center text-muted">%</td>
                            <td class="text-center text-muted">%</td>
                            <td class="text-center text-muted">%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>100</td>
                            <td>2</td>
                            <td>100</td>
                            <td>A</td>
                            <td>8</td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td>1700120</td>
                            <td>RESEARCH METHODOLOGY</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">50%</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">25%</td>
                            <td class="text-center text-muted">25%</td>
                            <td></td>
                            <td>100</td>
                            <td></td>
                            <td>100</td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>

                        <tr>
                            <td>11</td>
                            <td>1700121</td>
                            <td>MOBILE PROGRAMMING</td>
                            <td class="text-center text-muted">0%</td>
                            <td class="text-center text-muted">15%</td>
                            <td class="text-center text-muted">10%</td>
                            <td class="text-center text-muted">30%</td>
                            <td class="text-center text-muted">45%</td>
                            <td>0</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>3</td>
                            <td>100</td>
                            <td>A</td>
                            <td>12</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="konten1">
                            <td colspan="13" class="text-center">Jumlah</td>
                            <td>24</td>
                            <td colspan="2"></td>
                            <td>96</td>
                        </tr>
                        <tr class="konten2">
                            <td colspan="13" class="font-weight-bold text-center">IP (Indeks Prestasi Semester)</td>
                            <td colspan="4" class="font-weight-bold text-center">4.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        document.querySelectorAll("*").forEach(el => {
            const style = getComputedStyle(el);
            if (style.backgroundColor.includes("oklch")) {
                el.style.backgroundColor = "#007bff"; // ganti ke RGB/HEX yang didukung
            }
        });

        function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();
            doc.autoTable({
                html: '#khsTable'
            });
            doc.save("KHS_Mahasiswa.pdf");
        }
    </script>
@endsection
