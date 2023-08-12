<?php
include('connect.php');

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama_pengunjung = $_POST['nama_pengunjung'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $id_petugas = $_POST['id_petugas'];

    // Membuat prepared statement
    $query = "INSERT INTO pengunjung (nim, nama_pengunjung, prodi, fakultas, id_petugas) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($coneksi, $query);

    // Cek apakah prepared statement berhasil dibuat
    if (!$stmt) {
        die("Prepared statement error: " . mysqli_error($coneksi));
    }

    mysqli_stmt_bind_param($stmt, "sssss", $nim, $nama_pengunjung, $prodi, $fakultas, $id_petugas);

    // Eksekusi prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Jika proses INSERT berhasil, arahkan kembali ke halaman tambah.php dengan pesan sukses
        header("location:home.php?pesan=datatersimpan");
        exit;
    } else {
        // Jika terjadi kesalahan saat proses INSERT
        echo "Gagal menambahkan data pengunjung. Error: " . mysqli_error($coneksi);
    }

    // Tutup prepared statement dan koneksi database
    mysqli_stmt_close($stmt);
    mysqli_close($coneksi);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pengunjung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<?php 
include 'navbar.php';
?>
<body>
    <div class="container" style="margin-top: 20px">
        <h2>Tambah Pengunjung</h2>
        <hr>

        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == "datatersimpan") {
            // Tampilkan pesan sukses jika data berhasil disimpan
            echo "<div class='alert alert-success text-center mt-4' role='alert'>Data berhasil disimpan.</div>";
        }
        ?>

        <form action="tambah.php" method="post" class="tes" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA PENGUNJUNG</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pengunjung" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">PRODI</label>
                <div class="col-sm-10">
                    <input type="text" name="prodi" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <input type="text" name="fakultas" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID PETUGAS</label>
                <div class="col-sm-10">
                    <input type="text" name="id_petugas" class="form-control" size="4" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
