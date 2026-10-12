<?php

include "koneksi.php";

$folder = "uploads/";

if(isset($_FILES['gambar']))
{
    $nama = $_FILES['gambar']['name'];

    move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        $folder.$nama
    );

    /* SIMPAN KE DATABASE */
    mysqli_query(
        $koneksi,
        "INSERT INTO gambar(nama_file)
        VALUES('$nama')"
    );
}

/* KEMBALI KE HALAMAN GALERI */
header("Location: index.php?page=galeri");
exit();

?>