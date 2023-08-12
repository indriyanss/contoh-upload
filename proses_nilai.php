<?php
include('connect.php');

if(isset($_POST['submit'])){
    $nim            = $_POST['nim'];
    $nama_pengunjung = $_POST['nama_pengunjung'];
    $prodi          = $_POST['prodi'];
    $fakultas       = $_POST['fakultas'];
    $id_petugas     = $_POST['id_petugas'];

    $data = mysqli_query($coneksi, "INSERT INTO pengunjung(nim, nama_pengunjung, prodi, fakultas, id_petugas) VALUES ('$nim', '$nama_pengunjung', '$prodi', '$fakultas', '$id_petugas')");
    
    if ($data) {
        // Jika proses INSERT berhasil, arahkan kembali ke halaman tambah.php
        header("location:pengunjung.php?pesan=datatersimpan");
        exit; // Penting untuk menghentikan eksekusi script setelah header redirect
    } else {
        // Jika terjadi kesalahan saat proses INSERT
        $error_message = "Gagal menyimpan data."; // Simpan pesan kesalahan dalam variabel
    }
}
?>
