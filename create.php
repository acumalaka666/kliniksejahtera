<!DOCTYPE html>
<html>
<head>
    <title>Form Pasien Klinik Sejahtera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // Include file koneksi, untuk koneksi ke database
    include "koneksi.php";

    // Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_pasien = input($_POST["nama_pasien"]);
        $jenis_kelamin = input($_POST["jenis_kelamin"]);
        $keluhan = input($_POST["keluhan"]);
        $penyakit = input($_POST["penyakit"]);
        $alamat = input($_POST["alamat"]);
        $tanggal_lahir = input($_POST["tanggal_lahir"]);
        $status_perawatan = input($_POST["status_perawatan"]);

        // Query input menginput data ke dalam tabel pasien
        $sql = "insert into pasien (nama_pasien, jenis_kelamin, keluhan, penyakit, alamat, tanggal_lahir, status_perawatan) values ('$nama_pasien', '$jenis_kelamin', '$keluhan', '$penyakit', '$alamat', '$tanggal_lahir', '$status_perawatan')";

        // Mengeksekusi/menjalankan query di atas
        $hasil = mysqli_query($kon, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data Pasien</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Pasien:</label>
            <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan Nama Pasien" required />
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keluhan:</label>
            <textarea name="keluhan" class="form-control" rows="5" placeholder="Masukkan Keluhan" required></textarea>
        </div>
        <div class="form-group">
            <label>Penyakit:</label>
            <input type="text" name="penyakit" class="form-control" placeholder="Masukkan Penyakit" required />
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Status Perawatan:</label>
            <input type="text" name="status_perawatan" class="form-control" placeholder="Masukkan Status Perawatan" required />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
