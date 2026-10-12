<h3 class="mb-4">Galeri Peternakan</h3>

<!-- Upload Image -->
<form action="upload_image.php" method="post" enctype="multipart/form-data" class="mb-4">

    <input type="file" name="gambar" class="form-control mb-2" required>

    <button type="submit" class="btn btn-success">
        Upload Gambar
    </button>

</form>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide carousel-dark">

    <div class="carousel-indicators">

        <button type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active">
        </button>

        <button type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1">
        </button>

        <button type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2">
        </button>

        <button type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="3">
        </button>

    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="gambar2.jpg"
                 class="d-block w-100"
                 style="height:480px; object-fit:cover;">
        </div>

        <div class="carousel-item">
            <img src="gambar1.jpg"
                 class="d-block w-100"
                 style="height:480px; object-fit:cover;">
        </div>

        <div class="carousel-item">
            <img src="gambar3.jpg"
                 class="d-block w-100"
                 style="height:480px; object-fit:cover;">
        </div>

        <div class="carousel-item">
            <img src="gambar5.jpeg"
                 class="d-block w-100"
                 style="height:480px; object-fit:cover;">
        </div>

    </div>

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

<hr class="my-5">

<h4>Gambar Hasil Upload</h4>

<div class="row">

<?php

$folder = "uploads/";

if(is_dir($folder))
{
    $gambar = scandir($folder);

    foreach($gambar as $g)
    {
        if($g != "." && $g != "..")
        {
?>

    <div class="col-md-3 mb-3">

        <img src="uploads/<?php echo $g; ?>"
             class="img-fluid rounded border"
             style="height:220px; width:100%; object-fit:cover;">

        <p class="text-center mt-2">
            <?php echo $g; ?>
        </p>

    </div>

<?php
        }
    }
}
?>

</div>