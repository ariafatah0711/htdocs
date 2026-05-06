<?php

$images = [
    "https://wallpaperaccess.com/full/1083367.jpg",
    "https://images7.alphacoders.com/965/965836.png",
    "https://wallpapercave.com/wp/wp4507677.jpg"
];

?>

<!-- CAROUSEL -->
<div id="carouselExampleIndicators" class="carousel slide">
    <!-- INDICATORS -->
    <div class="carousel-indicators">

        <?php foreach($images as $index => $img) { ?>
            <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="<?= $index ?>"
                class="<?= $index == 0 ? 'active' : '' ?>"
                aria-current="true">
            </button>
        <?php } ?>
    </div>

    <!-- IMAGES -->
    <div class="carousel-inner">
        <?php foreach($images as $index => $img) { ?>
            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                <img src="<?= $img ?>"
                     class="d-block w-100"
                     style="height:300px; object-fit:cover; object-position:center;">
            </div>
        <?php } ?>
    </div>

    <!-- PREV -->
    <button class="carousel-control-prev" type="button"
        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <!-- NEXT -->
    <button class="carousel-control-next" type="button"
        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
