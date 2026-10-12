<h3 class="mb-4">Tips Beternak Puyuh</h3>

<div class="callout callout-info">
    <h5>Pemilihan Bibit</h5>
    <p>Pilih bibit puyuh yang sehat dan unggul.</p>
</div>

<div class="callout callout-warning">
    <h5>Kebersihan Kandang</h5>
    <p>Pastikan kandang selalu bersih agar puyuh terhindar dari penyakit.</p>
</div>

<div class="callout callout-info">
    <h5>Pakan Berkualitas</h5>
    <p>Berikan pakan dengan nutrisi lengkap.</p>
</div>

<div class="callout callout-danger">
    <h5>Suhu Kandang</h5>
    <p>Jaga suhu agar puyuh tidak stres.</p>
</div>

<hr>

<h3 class="mt-4">Data Produksi Telur Puyuh</h3>

<?php
$file = fopen("produksi.txt","r");

while(!feof($file))
{
    echo fgets($file)."<br>";
}

fclose($file);
?>

<br>

<?php
if(file_exists("produksi.txt"))
{
    echo "
    <div class='alert alert-success'>
        File produksi tersedia dan berhasil dibaca.
    </div>
    ";
}
?>