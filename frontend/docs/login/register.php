
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Kindora</title>

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

        .container {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            padding: 20px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(150deg, #fbfff8, #f1faef, #fbfff9);
        }

        .header {
            width: calc(100% + 50px);
            max-width: 430px;
            margin: -20px -25px 5px;
        }

        .header img {
            display: block;
            width: 100%;
            height: auto;
        }

        .form-container {
            width: 100%;
            padding: 22px 16px;
            background: rgba(238, 249, 239, 0.9);
            border-radius: 30px;
            box-shadow: 0 0 0 10px rgba(255,255,255,0.4);
        }

        .heading {
            text-align: center;
            margin-bottom: 22px;
        }

        .heading h2 {
            font-size: 25px;
            color: #087b55;
            margin-bottom: 5px;
        }

        .heading p {
            font-size: 14px;
            color: #6c9d87;
        }

        .input-group {
            width: 100%;
            height: 58px;
            display: flex;
            align-items: center;
            border: 1.5px solid #cfe4d8;
            border-radius: 18px;
            padding: 0 15px;
            margin-bottom: 15px;
            gap: 12px;
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
            width: 24px;
            height: 24px;
            color: #07845c;
            flex-shrink: 0;
        }

        .input-group input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
            color: #344b43;
        }

        .input-group input::placeholder {
            color: #9aa3a5;
        }

        .toggle-password {
            border: none;
            background: none;
            color: #07845c;
            cursor: pointer;
            display: flex;
            flex-shrink: 0;
        }

        .toggle-password svg {
            width: 23px;
            height: 23px;
        }

        .message {
            display: none;
            padding: 11px 13px;
            margin-bottom: 15px;
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

        .btn-submit {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 18px;
            background: linear-gradient(100deg, #08744f, #07865b);
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-submit:hover {
            filter: brightness(1.08);
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
            color: #648c79;
        }

        .login-link a {
            color: #087b55;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: auto;
            padding-top: 30px;
            padding-bottom: 5px;
            text-align: center;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            .header {
                width: calc(100% + 40px);
                margin: -20px -20px 5px;
            }

            .form-container {
                padding: 20px 13px;
            }
        }
    </style>
</head>

<body>

<main class="container">

    <div class="header">
        <img src="/frontend/assets/kindora-header.png" alt="Kindora">
    </div>

    <section class="form-container">

        <div class="heading">
            <h2>Buat Akun</h2>
            <p>Daftar dan mulai berbagi kebaikan bersama Kindora</p>
        </div>

        <form id="registerForm" novalidate>

            <!-- NAMA LENGKAP -->
            <div class="input-group" id="nameGroup">
                <svg class="input-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M4.5 21v-2.2A5.8 5.8 0 0 1 10.3 13h3.4a5.8 5.8 0 0 1 5.8 5.8V21z"></path>
                </svg>

                <input type="text" id="nama" name="nama"
                       placeholder="Nama Lengkap" autocomplete="name">
            </div>

            <!-- EMAIL -->
            <div class="input-group" id="emailGroup">
                <svg class="input-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="m3 7 9 6 9-6"></path>
                </svg>

                <input type="email" id="email" name="email"
                       placeholder="Email" autocomplete="email">
            </div>

            <!-- PASSWORD -->
            <div class="input-group" id="passwordGroup">
                <svg class="input-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3.5" y="10" width="17" height="11" rx="2"></rect>
                    <path d="M7 10V7a5 5 0 0 1 10 0v3"></path>
                </svg>

                <input type="password" id="password" name="password"
                       placeholder="Password" autocomplete="new-password">

                <button type="button" class="toggle-password"
                        data-target="password" aria-label="Tampilkan password">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="input-group" id="confirmGroup">
                <svg class="input-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3.5" y="10" width="17" height="11" rx="2"></rect>
                    <path d="M7 10V7a5 5 0 0 1 10 0v3"></path>
                </svg>

                <input type="password" id="confirmPassword"
                       name="confirm_password"
                       placeholder="Konfirmasi Password"
                       autocomplete="new-password">

                <button type="button" class="toggle-password"
                        data-target="confirmPassword"
                        aria-label="Tampilkan konfirmasi password">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </div>

            <div id="message" class="message" role="alert"></div>

            <button type="submit" class="btn-submit">
                Daftar Akun
            </button>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="login.php">Masuk di sini</a>
        </div>

    </section>

    <footer class="footer">
        Bersama, kita bisa<br>
        memberi arti lebih besar
    </footer>

</main>

<script>
    const form = document.getElementById("registerForm");

    const nama = document.getElementById("nama");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    const message = document.getElementById("message");

    const groups = {
        nama: document.getElementById("nameGroup"),
        email: document.getElementById("emailGroup"),
        password: document.getElementById("passwordGroup"),
        confirm: document.getElementById("confirmGroup")
    };

    function clearMessage() {
        message.className = "message";
        message.textContent = "";
    }

    function showMessage(text, type) {
        message.textContent = text;
        message.className = "message show " + type;
    }

    // TAMPIL / SEMBUNYIKAN PASSWORD
    document.querySelectorAll(".toggle-password").forEach(button => {
        button.addEventListener("click", function () {
            const target = document.getElementById(this.dataset.target);

            target.type = target.type === "password" ? "text" : "password";
            this.setAttribute(
                "aria-label",
                target.type === "password"
                    ? "Tampilkan password"
                    : "Sembunyikan password"
            );
        });
    });

    // HAPUS STATUS ERROR SAAT INPUT DIUBAH
    [nama, email, password, confirmPassword].forEach(input => {
        input.addEventListener("input", function () {
            Object.values(groups).forEach(group => {
                group.classList.remove("invalid");
            });
            clearMessage();
        });
    });

    // VALIDASI REGISTRASI
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        Object.values(groups).forEach(group => {
            group.classList.remove("invalid");
        });

        clearMessage();

        const namaValue = nama.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value;
        const confirmValue = confirmPassword.value;

        let errors = [];

        if (namaValue === "") {
            groups.nama.classList.add("invalid");
            errors.push("Nama lengkap wajib diisi.");
        }

        if (emailValue === "") {
            groups.email.classList.add("invalid");
            errors.push("Email wajib diisi.");
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
            groups.email.classList.add("invalid");
            errors.push("Format email belum benar.");
        }

        if (passwordValue === "") {
            groups.password.classList.add("invalid");
            errors.push("Password wajib diisi.");
        } else if (passwordValue.length < 8) {
            groups.password.classList.add("invalid");
            errors.push("Password minimal 8 karakter.");
        }

        if (confirmValue === "") {
            groups.confirm.classList.add("invalid");
            errors.push("Konfirmasi password wajib diisi.");
        } else if (passwordValue !== confirmValue) {
            groups.password.classList.add("invalid");
            groups.confirm.classList.add("invalid");
            errors.push("Konfirmasi password tidak cocok.");
        }

        if (errors.length > 0) {
            showMessage(errors.join(" "), "error");
            return;
        }

        showMessage(
            "Validasi berhasil. Data belum disimpan karena backend belum tersedia.",
            "success"
        );
    });
</script>

</body>
</html>