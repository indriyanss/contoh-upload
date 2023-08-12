<?php
include('connect.php');

// Check if form is submitted (the "SIMPAN" button is clicked)
if(isset($_POST['submit'])){
            $id_petugas         = $_POST['id_petugas'];
            $nama_petugas       = $_POST['nama_petugas'];
            $pekerjaan          = $_POST['pekerjaan'];
            $sift               = $_POST['sift'];

    // Use prepared statement to update book data
    $query = "UPDATE petugas SET nama_petugas=?, pekerjaan=?, sift=? WHERE id_petugas=?";
    $stmt = mysqli_prepare($coneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $nama_petugas, $pekerjaan, $sift, $id_petugas);

    // Execute the prepared statement for updating data
    if (mysqli_stmt_execute($stmt)) {
        // If the update process is successful, redirect back to buku.php page
        header("location: petugas.php");
        exit;
    } else {
        // If an error occurs during the update process
        echo "Gagal mengupdate data petugas. Error: " . mysqli_error($coneksi);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($coneksi);
}

// If "id_buku" parameter is provided in the URL
if (isset($_GET['id_petugas'])) {
    $id_petugas = $_GET['id_petugas'];

    // Query the database to select the book data based on "id_buku"
    $select = mysqli_query($coneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($coneksi));

    // If no book data found with the provided id_buku, display an error message
    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">id_petugas tidak ada dalam database.</div>';
        exit();
    } else {
        // Store the fetched book data in the $data variable
        $data = mysqli_fetch_assoc($select);
    }
} else {
    // If no "id_buku" parameter provided in the URL, redirect back to buku.php
    header("location: petugas.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TUGAS AKHIR JWD POLIBAN 2023</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 20px">
    <h2>Edit Petugas</h2>
    <hr>
    <form action="editpetugas.php?id_petugas=<?php echo $id_petugas; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID PETUGAS</label>
            <div class="col-sm-10">
                <input type="text" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA PETUGAS</label>
            <div class="col-sm-10">
                <input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PEKERJAAN</label>
            <div class="col-sm-10">
                <input type="text" name="pekerjaan" class="form-control" value="<?php echo $data['pekerjaan']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">SIFT</label>
            <div class="col-sm-10">
                <input type="text" name="sift" class="form-control" value="<?php echo $data['sift']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="petugas.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
