<?php
include('connect.php');

// Check if form is submitted (the "SIMPAN" button is clicked)
if (isset($_POST['submit'])) {
    $id_buku    = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis    = $_POST['penulis'];
    $edisi      = $_POST['edisi'];
    $impersum   = $_POST['impersum'];
    $lokasi     = $_POST['lokasi'];
    $isbn       = $_POST['isbn'];
    $golongan   = $_POST['golongan'];
    $bahasa     = $_POST['bahasa'];

    // Use prepared statement to update book data
    $query = "UPDATE buku SET judul_buku=?, penulis=?, edisi=?, impersum=?, lokasi=?, isbn=?, golongan=?, bahasa=? WHERE id_buku=?";
    $stmt = mysqli_prepare($coneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $judul_buku, $penulis, $edisi, $impersum, $lokasi, $isbn, $golongan, $bahasa, $id_buku);

    // Execute the prepared statement for updating data
    if (mysqli_stmt_execute($stmt)) {
        // If the update process is successful, redirect back to buku.php page
        header("location: buku.php");
        exit;
    } else {
        // If an error occurs during the update process
        echo "Gagal mengupdate data buku. Error: " . mysqli_error($coneksi);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($coneksi);
}

// If "id_buku" parameter is provided in the URL
if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    // Query the database to select the book data based on "id_buku"
    $select = mysqli_query($coneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($coneksi));

    // If no book data found with the provided id_buku, display an error message
    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">id_buku tidak ada dalam database.</div>';
        exit();
    } else {
        // Store the fetched book data in the $data variable
        $data = mysqli_fetch_assoc($select);
    }
} else {
    // If no "id_buku" parameter provided in the URL, redirect back to buku.php
    header("location: buku.php");
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
    <h2>Edit Buku</h2>
    <hr>
    <form action="editbuku.php?id_buku=<?php echo $id_buku; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID BUKU</label>
            <div class="col-sm-10">
                <input type="text" name="id_buku" class="form-control" value="<?php echo $data['id_buku']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
            <div class="col-sm-10">
                <input type="text" name="judul_buku" class="form-control" value="<?php echo $data['judul_buku']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PENULIS</label>
            <div class="col-sm-10">
                <input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">EDISI</label>
            <div class="col-sm-10">
                <input type="text" name="edisi" class="form-control" value="<?php echo $data['edisi']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">IMPERSUM</label>
            <div class="col-sm-10">
                <input type="text" name="impersum" class="form-control" value="<?php echo $data['impersum']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">LOKASI</label>
            <div class="col-sm-10">
                <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" name="isbn" class="form-control" value="<?php echo $data['isbn']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">GOLONGAN</label>
            <div class="col-sm-10">
                <input type="text" name="golongan" class="form-control" value="<?php echo $data['golongan']; ?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">BAHASA</label>
            <div class="col-sm-10">
                <input type="text" name="bahasa" class="form-control" value="<?php echo $data['bahasa']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="buku.php" class="btn btn-warning">KEMBALI</a>
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
