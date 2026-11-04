
<?php
// dashboard.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Kindora</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8f1;
            color: #344638;
        }

        header {
            background: #ffffff;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .logo {
            color: #43834c;
            font-size: 25px;
            font-weight: bold;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        nav a {
            color: #405443;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #43834c;
        }

        .logout {
            border: none;
            background: #43834c;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout:hover {
            background: #356c3e;
        }

        main {
            max-width: 1000px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .welcome {
            background: #e3efdf;
            padding: 35px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin-bottom: 12px;
            color: #356c3e;
        }

        .welcome p {
            line-height: 1.6;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }

        .menu a {
            display: block;
            background: white;
            padding: 25px;
            border-radius: 12px;
            color: #3d6644;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .menu a:hover {
            background: #edf5e9;
        }

        .menu h3 {
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #788579;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            nav {
                flex-wrap: wrap;
                gap: 14px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">kindora</div>

    <nav>
        <a href="dashboard.php">Beranda</a>
        <a href="register.php">Daftar Akun</a>
        <a href="forgot-password.php">Lupa Password</a>

        <button class="logout" onclick="logout()">
            Keluar
        </button>
    </nav>
</header>

<main>
    <section class="welcome">
        <h1>Selamat Datang di Kindora!</h1>

        <p>
            Bersama, kita bisa memberi arti lebih besar.
            Mari berbagi barang layak pakai untuk membantu sesama.
        </p>
    </section>

    <section class="menu">

        <a href="dashboard.php">
            <h3>Beranda</h3>
            <p>Lihat halaman utama Kindora.</p>
        </a>

        <a href="register.php">
            <h3>Registrasi</h3>
            <p>Halaman pendaftaran akun pengguna.</p>
        </a>

        <a href="forgot-password.php">
            <h3>Lupa Password</h3>
            <p>Halaman permintaan pemulihan password.</p>
        </a>

    </section>
</main>

<footer>
    © 2026 Kindora. Bersama untuk berbagi.
</footer>

<script>
    // Periksa status login simulasi
    if (localStorage.getItem("kindora_login") !== "true") {
        window.location.href = "login.php";
    }

    // Fungsi logout
    function logout() {
        const konfirmasi = confirm(
            "Apakah Anda yakin ingin keluar?"
        );

        if (konfirmasi) {
            localStorage.removeItem("kindora_login");
            window.location.href = "login.php";
        }
    }
</script>

</body>
</html>
