
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kindora</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f3faf1;
            display: flex;
            justify-content: center;
            color: #087b55;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 25px 22px;
            background:
                radial-gradient(circle at 0% 12%, #e5f6e6 0, transparent 100px),
                radial-gradient(circle at 100% 30%, #e6f7e8 0, transparent 110px),
                linear-gradient(150deg, #fbfff8, #f1faef, #fbfff9);
        }

        /* GAMBAR GABUNGAN KINDORA */
        .kindora-header {
            width: calc(100% + 50px);
            max-width: 430px;
            margin: -20px -25px 5px;
            position: relative;
            z-index: 1;
        }

        .kindora-header img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* FORM LOGIN */
        .form-container {
            width: 100%;
            padding: 20px 16px;
            background: rgba(238, 249, 239, 0.9);
            border-radius: 35px;
            box-shadow: 0 0 0 12px rgba(255,255,255,0.45);
            position: relative;
            z-index: 2;
        }

        .input-group {
            width: 100%;
            height: 62px;
            display: flex;
            align-items: center;
            border: 1.5px solid #cfe4d8;
            border-radius: 20px;
            padding: 0 17px;
            margin-bottom: 16px;
            gap: 14px;
            transition: 0.2s;
            background: rgba(255,255,255,0.35);
        }

        .input-group:focus-within {
            border-color: #07845c;
            box-shadow: 0 0 0 3px rgba(8,132,92,0.08);
        }

        .input-group.invalid {
            border-color: #dc4444;
        }

        .input-icon {
            width: 28px;
            height: 28px;
            color: #07845c;
            flex-shrink: 0;
        }

        .input-group input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-size: 16px;
            color: #344b43;
        }

        .input-group input::placeholder {
            color: #9aa3a5;
        }

        /* TAMPILKAN PASSWORD */
        .toggle-password {
            background: none;
            border: none;
            color: #07845c;
            cursor: pointer;
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .toggle-password svg {
            width: 25px;
            height: 25px;
        }

        /* LUPA PASSWORD */
        .forgot-password {
            display: flex;
            justify-content: flex-end;
            margin: 0 2px 25px;
        }

        .forgot-password a {
            text-decoration: none;
            color: #087b55;
            font-size: 15px;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* TOMBOL MASUK */
        .btn-login {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 20px;
            background: linear-gradient(100deg, #08744f, #07865b);
            color: white;
            font-size: 19px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-login:hover {
            filter: brightness(1.08);
        }

        /* PEMBATAS ATAU */
        .divider {
            display: flex;
            align-items: center;
            gap: 13px;
            margin: 23px 0 20px;
            color: #6ca58e;
            font-size: 16px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #cfe3d8;
        }

        /* TOMBOL DAFTAR */
        .btn-register {
            width: 100%;
            height: 58px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 13px;
            border: 1.5px solid #07845c;
            border-radius: 20px;
            background: transparent;
            color: #087b55;
            font-size: 19px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-register:hover {
            background: #e5f5e9;
        }

        .btn-register svg {
            width: 27px;
            height: 27px;
        }

        /* PESAN VALIDASI */
        .message {
            display: none;
            padding: 10px 12px;
            margin-bottom: 14px;
            border-radius: 12px;
            font-size: 13px;
            line-height: 1.5;
        }

        .message.show {
            display: block;
        }

        .message.error {
            background: #fff0f0;
            color: #a52f2f;
        }

        .message.success {
            background: #e3f6e9;
            color: #086b49;
        }

        /* FOOTER */
        .footer {
            margin-top: auto;
            padding-top: 35px;
            padding-bottom: 5px;
            text-align: center;
            font-size: 14px;
            line-height: 1.5;
            color: #087b55;
            position: relative;
            z-index: 2;
        }

        .footer svg {
            width: 30px;
            height: 30px;
            margin-bottom: 8px;
        }

        /* DEKORASI BAWAH */
        .wave {
            position: absolute;
            bottom: -48px;
            width: 260px;
            height: 155px;
            background: rgba(108, 202, 158, 0.25);
            border-radius: 55% 55% 0 0;
            z-index: 0;
        }

        .wave-left {
            left: -100px;
            transform: rotate(25deg);
        }

        .wave-right {
            right: -100px;
            transform: rotate(-25deg);
        }

        .wave-middle {
            width: 220px;
            height: 90px;
            bottom: -55px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(205, 240, 211, 0.35);
        }

        /* RESPONSIVE */
        @media (max-width: 480px) {
            body {
                background: #f6fcf4;
            }

            .login-container {
                padding: 20px 20px 22px;
            }

            .kindora-header {
                width: calc(100% + 40px);
                margin: -20px -20px 5px;
            }

            .form-container {
                padding: 17px 13px;
            }

            .input-group {
                height: 58px;
            }

            .btn-login,
            .btn-register {
                height: 56px;
            }

            .footer {
                padding-top: 25px;
            }
        }
    </style>
</head>

<body>

<main class="login-container">

    <!-- GAMBAR GABUNGAN LOGO DAN ILUSTRASI -->
    <div class="kindora-header">
        <img
            src="/frontend/assets/kindora-header.png"
            alt="Kindora - Platform Donasi Barang Layak Pakai Berbasis Cloud untuk Masyarakat"
        >
    </div>

    <!-- FORM LOGIN -->
    <section class="form-container">

        <form id="loginForm" novalidate>

            <!-- EMAIL -->
            <div class="input-group" id="emailGroup">

                <svg class="input-icon"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M4.5 21v-2.2A5.8 5.8 0 0 1 10.3 13h3.4a5.8 5.8 0 0 1 5.8 5.8V21z"></path>
                </svg>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email"
                    autocomplete="username"
                >

            </div>

            <!-- PASSWORD -->
            <div class="input-group" id="passwordGroup">

                <svg class="input-icon"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <rect x="3.5" y="10" width="17" height="11" rx="2"></rect>
                    <path d="M7 10V7a5 5 0 0 1 10 0v3"></path>
                    <circle cx="12" cy="15.5" r="1"></circle>
                </svg>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Password"
                    autocomplete="current-password"
                >

                <button
                    type="button"
                    class="toggle-password"
                    id="togglePassword"
                    aria-label="Tampilkan password"
                >
                    <svg id="eyeIcon"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 3l18 18"></path>
                        <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                        <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c5 0 8.5 5 9.5 7-.4.8-1.3 2.2-2.7 3.5"></path>
                        <path d="M6.2 6.2C3.9 7.6 2.7 9.7 2.5 12c.6 1.2 3.7 7 9.5 7 1 0 1.9-.2 2.7-.5"></path>
                    </svg>
                </button>

            </div>

            <!-- PESAN VALIDASI -->
            <div id="message" class="message" role="alert"></div>

            <!-- LUPA PASSWORD -->
            <div class="forgot-password">
                <a href="forgot-password.php">
                    Lupa Password?
                </a>
            </div>

            <!-- TOMBOL MASUK -->
            <button type="submit" class="btn-login">
                Masuk
            </button>

            <!-- PEMBATAS -->
            <div class="divider">
                <span>atau</span>
            </div>

            <!-- DAFTAR AKUN -->
            <a href="register.php" class="btn-register">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M2 21v-2a7 7 0 0 1 7-7h1"></path>
                    <path d="M19 14v8M15 18h8"></path>
                </svg>

                Daftar Akun

            </a>

        </form>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="#07845c"
             stroke-width="1.7"
             stroke-linecap="round"
             stroke-linejoin="round">
            <path d="M20.8 8.8c0 5.2-8.8 11-8.8 11s-8.8-5.8-8.8-11A4.8 4.8 0 0 1 12 6.1a4.8 4.8 0 0 1 8.8 2.7z"></path>
        </svg>

        <p>
            Bersama, kita bisa<br>
            memberi arti lebih besar
        </p>

    </footer>

    <!-- DEKORASI BAWAH -->
    <div class="wave wave-left"></div>
    <div class="wave wave-middle"></div>
    <div class="wave wave-right"></div>

</main>

<script>
    // AMBIL ELEMEN
    const form = document.getElementById("loginForm");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    const emailGroup = document.getElementById("emailGroup");
    const passwordGroup = document.getElementById("passwordGroup");

    const message = document.getElementById("message");
    const API_BASE = "http://localhost:3000/api";
    const togglePassword = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    // TAMPILKAN / SEMBUNYIKAN PASSWORD
    togglePassword.addEventListener("click", function () {

        if (password.type === "password") {

            password.type = "text";

            togglePassword.setAttribute(
                "aria-label",
                "Sembunyikan password"
            );

            eyeIcon.innerHTML = `
                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            `;

        } else {

            password.type = "password";

            togglePassword.setAttribute(
                "aria-label",
                "Tampilkan password"
            );

            eyeIcon.innerHTML = `
                <path d="M3 3l18 18"></path>
                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c5 0 8.5 5 9.5 7-.4.8-1.3 2.2-2.7 3.5"></path>
                <path d="M6.2 6.2C3.9 7.6 2.7 9.7 2.5 12c.6 1.2 3.7 7 9.5 7 1 0 1.9-.2 2.7-.5"></path>
            `;

        }

    });

    // HAPUS TANDA ERROR SAAT INPUT DIUBAH
    email.addEventListener("input", function () {
        emailGroup.classList.remove("invalid");
        clearMessage();
    });

    password.addEventListener("input", function () {
        passwordGroup.classList.remove("invalid");
        clearMessage();
    });

    function clearMessage() {
        message.className = "message";
        message.textContent = "";
    }

    // VALIDASI LOGIN
    form.addEventListener("submit", async function (event) {

        event.preventDefault();

        emailGroup.classList.remove("invalid");
        passwordGroup.classList.remove("invalid");
        clearMessage();

        const emailValue = email.value.trim();
        const passwordValue = password.value;

        let error = "";

        // CEK EMAIL
        if (emailValue === "") {

            emailGroup.classList.add("invalid");
            error = "Email wajib diisi.";

        } else if (
            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)
        ) {

            emailGroup.classList.add("invalid");
            error = "Format email belum benar.";

        }

        // CEK PASSWORD
        if (passwordValue.trim() === "") {

            passwordGroup.classList.add("invalid");

            error += error
                ? " Password wajib diisi."
                : "Password wajib diisi.";

        }

        // TAMPILKAN ERROR
        if (error !== "") {

            message.textContent = error;
            message.classList.add("show", "error");

            return;

        }

        // KIRIM KE BACKEND ASLI
        try {
            const response = await fetch(API_BASE + "/auth/login", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email: emailValue, password: passwordValue })
            });

            const result = await response.json();

            if (!response.ok) {
                const detail = result.errors
                    ? result.errors.map(function (e) { return e.message; }).join(" ")
                    : result.message;
                message.textContent = detail || "Login gagal.";
                message.classList.add("show", "error");
                return;
            }

            localStorage.setItem("kindora_token", result.data.token);
            localStorage.setItem("kindora_user", JSON.stringify(result.data.user));
            localStorage.setItem("kindora_login", "true");

            message.textContent = "Login berhasil! Mengalihkan ke halaman Beranda...";
            message.classList.add("show", "success");

            setTimeout(function () {
                window.location.href = "dashboard.php";
            }, 1000);
        } catch (error) {
            message.textContent = "Tidak bisa terhubung ke backend. Pastikan server backend jalan di localhost:3000.";
            message.classList.add("show", "error");
        }

    });
</script>

</body>
</html>