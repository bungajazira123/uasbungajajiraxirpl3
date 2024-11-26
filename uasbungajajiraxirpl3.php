<?php
$nama_lengkap = "Bunga Jazira";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="uas.css">
</head>
<body>
    <center>
        <img src="th.jpg" alt="" width="250">
        <h1 style='color: #008000;'>PENGGAJIHAN</h1>
        <h1 style='color: #008000;'>GURU / KARYAWAN YAYASAN ASSALAAM</h1>
        <hr>
        

   
        <form method="POST">
    
            <table>
                <tr>
                <h3 style='color: #008000;'>Data Penggajihan</h3>
                <hr>
                    <td style='color: #008000;'><b>No</b></td>
                    <td><input type="text" name="no" required placeholder="No"></td>
                </tr>
                <tr>
                    <td style='color: #008000;'><b>Nama</b></td>
                    <td><input type="text" name="nama" required placeholder="Nama"></td>
                </tr>
                <tr>
                    <td style='color: #008000;'><b>Unit Pendidikan</b></td>
                    <td>
                        <select name="unit" required>
                            <option value="sd">Sd</option>
                            <option value="smp">Smp</option>
                            <option value="sma">Sma</option>
                            <option value="smk">Smk</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style='color: #008000;'><b>Tanggal Gaji</b></td>
                    <td><input type="date" name="gaji" required></td>
                </tr>
            </table>

            <hr>
    
            <table style="width: 100%;">
                <tr>
               
                    <td style="vertical-align: top; width: 50%;">
                        <h2 style='color: #008000;'>Gaji</h2>
                        <table>
                            <tr>
                                <td style='color: #008000;'><b>Jabatan</b></td>
                                <td>
                                    <select name="jabatan" required>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Wakasek">Wakasek</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Karyawan">Karyawan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style='color: #008000;'><b>Lama Kerja</b></td>
                                <td>
                                    <input type="text" name="lama_kerja" style="width: 330px;" required placeholder="lama kerja"> 
                                </td>
                            </tr>
                            <tr>
                                <td style='color: #008000;'><b>Status Kerja</b></td>
                                <td>
                                    <select name="status_kerja" required>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Magang">Magang</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top; width: 50%;">
                        <h2 style='color: #008000;'>Potongan</h2>
                        <table>
                            <tr>
                                <td style='color: #008000;'><b>BPJS</b></td>
                                <td><input type="number" name="bpjs" placeholder="BPJS" required></td>
                            </tr>
                            <tr>
                                <td style='color: #008000;'><b>Pinjaman</b></td>
                                <td><input type="number" name="pinjaman" placeholder="Pinjaman" required></td>
                            </tr>
                            <tr>
                                <td style='color: #008000;'><b>Cicilan</b></td>
                                <td><input type="number" name="cicilan" placeholder="Cicilan" required></td>
                            </tr>
                            <tr>
                                <td style='color: #008000;'><b>Infaq</b></td>
                                <td><input type="number" name="infaq" placeholder="Infaq" required></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <hr>
            <button type="submit">Submit</button>
        </form>

        <?php
        class Karyawan {
            public $nama;
            public $jabatan;
            public $status;
            public $gaji;
            public $bonus;
            public $bpjs;
            public $pinjaman;
            public $tabungan;
            public $lainnya;

            public function __construct($nama, $jabatan, $status, $bpjs, $pinjaman, $tabungan, $lainnya) {
                $this->nama = $nama;
                $this->jabatan = $jabatan;
                $this->status = $status;
                $this->setGaji();
                $this->setBonus();
                $this->bpjs = $bpjs;
                $this->pinjaman = $pinjaman;
                $this->tabungan = $tabungan;
                $this->lainnya = $lainnya;
            }

            public function setGaji() {
                switch ($this->jabatan) {
                    case 'Kepala Sekolah':
                        $this->gaji = 10000000;
                        break;
                    case 'Wakasek':
                        $this->gaji = 7000000;
                        break;
                    case 'Guru':
                        $this->gaji = 5000000;
                        break;
                    case 'Karyawan':
                        $this->gaji = 2500000;
                        break;
                    default:
                        $this->gaji = 0;
                }
            }

   
            public function setBonus() {
                $this->bonus = ($this->status == 'Tetap') ? 1000000 : 0;
            }

            public function gajiBersih() {
                return ($this->gaji + $this->bonus) - ($this->bpjs + $this->pinjaman + $this->tabungan + $this->lainnya);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status_kerja'];
            $bpjs = $_POST['bpjs'];
            $pinjaman = $_POST['pinjaman'];
            $cicilan = $_POST['cicilan'];
            $infaq = $_POST['infaq'];

            $karyawan = new Karyawan($nama, $jabatan, $status, $bpjs, $pinjaman, $cicilan, $infaq);

           echo"<hr>";
           echo "<h1 style='color: #008000;'>$nama_lengkap</h1>";
           echo"<hr>";
        

           echo"<br>";
          
           echo"<h2 style='color: #008000;'>STRUCK GAJI</h2>";
            echo "<br><h3 style='color: #008000;'>Nama : $nama</h3>";
            echo "<h3 style='color: #008000;'>Jabatan: $jabatan</h3>";
            echo "<h3 style='color: #008000;'>Status : $status</h3>";
            echo "<h3 style='color: #008000;'>Gaji : Rp " .($karyawan->gaji) . "</h3>";
            echo "<h3 style='color: #008000;'>Bonus : Rp " .($karyawan->bonus) . "</h3>";
            echo "<h3 style='color: #008000;'>BPJS : Rp " .($bpjs) . "</h3>";
            echo "<h3 style='color: #008000;'>Pinjaman: Rp " .($pinjaman) . "</h3>";
            echo "<h3 style='color: #008000;'>Cicilan: Rp " .($cicilan) . "</h3>";
            echo "<h3 style='color: #008000;'>Infaq : Rp " .($infaq) . "</h3>";
            echo "<h3 style='color: #008000;'>Gaji Bersih: Rp " .($karyawan->gajiBersih()) . "</h3>";
          echo"<hr>";
        }
        ?>
    </center>
</body>
</html>



