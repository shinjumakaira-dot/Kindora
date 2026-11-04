
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Kindora</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            background: #f3faf1;
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
            padding: 25px 16px;
            background: rgba(238, 249, 239, 0.9);
            border-radius: 30px;
            box-shadow: 0 0 0 10px rgba(255,255,255,0.4);
        }

        .heading {
            text-align: center;
            margin-bottom: 25px;
        }

        .heading h2 {
            font-size: 25px;
            margin-bottom: 9px;
        }

        .heading p {
            font-size: 14px;
            line-height: 1.6;
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
            margin-bottom: 17px;
            gap: 12px;
            background: rgba(255,255,255,0.35);
        }

        .input-group:focus-within {
            border-color: #07845c;
        }

        .input-group.invalid {
            border-color: #dc4444;
        }

        .input-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            color: #07845c;
        }

        .input-group input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
            color: #344b43;
        }

        .input-group input::placeholder {
            color: #9aa3a5;
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
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 23px;
            color: #087b55;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: auto;
            padding-top: 30px;
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
                padding: 22px 13px;
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
            <h2>Lupa Password?</h2>
            <p>
                Masukkan email yang terdaftar.
                Kami akan membantu proses pemulihan akunmu.
            </p>
        </div>

        <form id="forgotForm" novalidate>

            <div class="input-group" id="emailGroup">

                <svg class="input-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="m3 7 9 6 9-6"></path>
                </svg>

                <input type="email" id="email" name="email"
                       placeholder="Masukkan email terdaftar"
                       autocomplete="email">

            </div>

            <div id="message" class="message" role="alert"></div>

            <button type="submit" class="btn-submit" id="submitButton">
                Kirim Permintaan
            </button>

        </form>

        <a href="login.php" class="back-link">
            ← Kembali ke Login
        </a>

    </section>

    <footer class="footer">
        Bersama, kita bisa<br>
        memberi arti lebih besar
    </footer>

</main>

<script>
    const form = document.getElementById("forgotForm");
    const email = document.getElementById("email");
    const emailGroup = document.getElementById("emailGroup");
    const message = document.getElementById("message");
    const submitButton = document.getElementById("submitButton");

    email.addEventListener("input", function () {
        emailGroup.classList.remove("invalid");
        message.className = "message";
        message.textContent = "";
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        emailGroup.classList.remove("invalid");
        message.className = "message";
        message.textContent = "";

        const emailValue = email.value.trim();

        if (emailValue === "") {
            emailGroup.classList.add("invalid");
            message.textContent = "Email wajib diisi.";
            message.className = "message show error";
            return;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
            emailGroup.classList.add("invalid");
            message.textContent = "Format email belum benar.";
            message.className = "message show error";
            return;
        }

        // SIMULASI LOADING FRONTEND
        submitButton.disabled = true;
        submitButton.textContent = "Memproses...";

        setTimeout(function () {
            submitButton.disabled = false;
            submitButton.textContent = "Kirim Permintaan";

            message.textContent =
                "Email valid. Permintaan pemulihan belum dikirim karena backend belum tersedia.";

            message.className = "message show success";
        }, 1000);
    });
</script>

</body>
</html>