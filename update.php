<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Pasien</title>
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

    // Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id_pasien
    if (isset($_GET['id_pasien'])) {
        $id_pasien = input($_GET["id_pasien"]);

        $sql = "select * from pasien where id_pasien=$id_pasien";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_pasien = htmlspecialchars($_POST["id_pasien"]);
        $nama_pasien = input($_POST["nama_pasien"]);
        $jenis_kelamin = input($_POST["jenis_kelamin"]);
        $keluhan = input($_POST["keluhan"]);
        $penyakit = input($_POST["penyakit"]);
        $alamat = input($_POST["alamat"]);
        $tanggal_lahir = input($_POST["tanggal_lahir"]);
        $status_perawatan = input($_POST["status_perawatan"]);

        // Query update data pada tabel pasien
        $sql = "update pasien set
            nama_pasien='$nama_pasien',
            jenis_kelamin='$jenis_kelamin',
            keluhan='$keluhan',
            penyakit='$penyakit',
            alamat='$alamat',
            tanggal_lahir='$tanggal_lahir',
            status_perawatan='$status_perawatan'
            where id_pasien=$id_pasien";

        // Mengeksekusi atau menjalankan query di atas
        $hasil = mysqli_query($kon, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Update Data Pasien</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Pasien:</label>
            <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan Nama Pasien" value="<?php echo $data['nama_pasien']; ?>" required />
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keluhan:</label>
            <textarea name="keluhan" class="form-control" rows="5" placeholder="Masukkan Keluhan" required><?php echo $data['keluhan']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Penyakit:</label>
            <input type="text" name="penyakit" class="form-control" placeholder="Masukkan Penyakit" value="<?php echo $data['penyakit']; ?>" required />
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required><?php echo $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required />
        </div>
        <div class="form-group">
            <label>Status Perawatan:</label>
            <input type="text" name="status_perawatan" class="form-control" placeholder="Masukkan Status Perawatan" value="<?php echo $data['status_perawatan']; ?>" required />
        </div>
        <input type="hidden" name="id_pasien" value="<?php echo $data['id_pasien']; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
