<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Klinik Jadi-jadian</title>
<body>
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-center">
        <span class="navbar-brand mb-0 h1">Klinik Sejahtera</span>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR PASIEN</center></h4>
    <?php
        include "koneksi.php";

        // Cek apakah ada kiriman form dari method GET untuk menghapus data
        if (isset($_GET['id_pasien'])) {
            $id_pasien = htmlspecialchars($_GET["id_pasien"]);

            $sql = "delete from pasien where id_pasien='$id_pasien' ";
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
    ?>
    <table class="my-3 table table-bordered">
        <thead>
            <tr class="table-primary">
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Keluhan</th>
                <th>Penyakit</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Status Perawatan</th>
                <th colspan='2'>Aksi</th>
            </tr>
        </thead>
        <?php
            include "koneksi.php";
            $sql = "select * from pasien order by id_pasien desc";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
        ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["nama_pasien"]; ?></td>
                <td><?php echo $data["jenis_kelamin"]; ?></td>
                <td><?php echo $data["keluhan"]; ?></td>
                <td><?php echo $data["penyakit"]; ?></td>
                <td><?php echo $data["alamat"]; ?></td>
                <td><?php echo $data["tanggal_lahir"]; ?></td>
                <td><?php echo $data["status_perawatan"]; ?></td>
                <td>
                    <a href="update.php?id_pasien=<?php echo htmlspecialchars($data['id_pasien']); ?>" class="btn btn-warning" role="button">Perbarui</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_pasien=<?php echo $data['id_pasien']; ?>" class="btn btn-danger" role="button">Hapus</a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
