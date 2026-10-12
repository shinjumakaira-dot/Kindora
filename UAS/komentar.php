<?php
session_start();
?>

<h3>Form Komentar</h3>

<form method="post">

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" required>
    </div>

    <!-- RADIO BUTTON -->
    <div class="mb-3">
        <label>Jenis Pengunjung</label><br>

        <input type="radio" name="pengunjung" value="Peternak" required>
        Peternak

        <input type="radio" name="pengunjung" value="Mahasiswa" class="ms-3">
        Mahasiswa

        <input type="radio" name="pengunjung" value="Umum" class="ms-3">
        Umum
    </div>

    <!-- DROPDOWN -->
    <div class="mb-3">
        <label>Topik Komentar</label>

        <select class="form-control" name="topik">
            <option>Produksi Telur</option>
            <option>Pakan Puyuh</option>
            <option>Kesehatan Puyuh</option>
            <option>Kandang</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Komentar</label>
        <textarea
            class="form-control"
            name="komentar"
            rows="4"
            required></textarea>
    </div>

    <!-- CAPTCHA -->
    <div class="mb-3">

        <label>Captcha</label><br>

        <img src="captcha.php" class="border mb-2">

        <input
            type="text"
            name="captcha"
            class="form-control"
            placeholder="Masukkan kode captcha"
            required>

    </div>

    <button type="submit" class="btn btn-success">
        Kirim
    </button>

</form>

<?php

if(isset($_POST['captcha']))
{
    if(strtoupper($_POST['captcha']) == $_SESSION['captcha'])
    {
        echo "

        <div class='alert alert-success mt-3'>
            Komentar berhasil dikirim.
        </div>

        <div class='card mt-4'>

            <div class='card-header bg-success text-white'>
                Hasil Komentar
            </div>

            <div class='card-body'>

                <p><b>Nama :</b> ".$_POST['nama']."</p>

                <p><b>Jenis Pengunjung :</b> ".$_POST['pengunjung']."</p>

                <p><b>Topik :</b> ".$_POST['topik']."</p>

                <p><b>Komentar :</b><br>".$_POST['komentar']."</p>

            </div>

        </div>

        ";
    }
    else
    {
        echo "

        <div class='alert alert-danger mt-3'>
            Captcha salah.
        </div>

        ";
    }
}

?>