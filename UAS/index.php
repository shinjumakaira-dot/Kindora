<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Peternakan Puyuh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand">Rafa Farm</a>
    </div>
</nav>

<div class="container-fluid px-0">
    <div class="row g-0 d-flex">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar d-flex flex-column">

            <a href="index.php?page=dashboard">Dashboard</a>

            <a href="index.php?page=profil">Profil</a>

            <a href="index.php?page=galeri">Galeri</a>

            <a href="index.php?page=komentar">Komentar</a>

            <a href="index.php?page=content">Content</a>

            <a href="index.php?page=file_manager">File Manager</a>

        </div>

        <!-- CONTENT -->
        <div class="col-md-10 p-4">

            <?php

            switch($page)
            {

                case "profil":
                    include("profil.php");
                    break;

                case "galeri":
                    include("galeri.php");
                    break;

                case "komentar":
                    include("komentar.php");
                    break;

                case "content":
                    include("content.php");
                    break;

                case "file_manager":
                    include("file_manager.php");
                    break;

                case "dashboard":
                default:
                ?>

                    <h3 style="margin-bottom:20px;">Dashboard</h3>

                    <img src="dashboard.png"
                        width="400"
                        height="250"
                        class="img-fluid rounded"
                        style="margin-bottom:20px;">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card card-custom p-3">

                                <h5>Total Puyuh</h5>

                                <h2>1200</h2>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="card card-custom p-3">

                                <h5>Produksi Telur/Hari</h5>

                                <h2>950</h2>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="card card-custom p-3">

                                <h5>Kandang Aktif</h5>

                                <h2>8</h2>

                            </div>

                        </div>

                    </div>

                    <p class="mt-4">
                        Sistem ini digunakan untuk memantau peternakan puyuh, produksi telur, dan kondisi kandang.
                    </p>

                <?php
                break;
            }

            ?>

        </div>

    </div>
</div>

<div class="footer">
    © 2026 Peternakan Puyuh Rafa
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>