<?php

$folder = "files/";

$nama = $_FILES['file']['name'];

move_uploaded_file(
    $_FILES['file']['tmp_name'],
    $folder . $nama
);

header("Location: file_manager.php");

?>