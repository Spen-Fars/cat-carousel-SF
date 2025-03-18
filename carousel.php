<?php 
include("src/functions.php");
include("config/config.php");

$catId = $_GET["cat_Id"];

$imgs = getImgs($catId);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cat Carousel</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" crossorigin="anonymous"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Cat Carousel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">

            <div class='carousel-wrapper'>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                            for($i = 0; $i < sizeof($imgs); $i++) {
                                if ($i == 0) {
                                    echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 0'></button>";
                                } else {
                                    echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' aria-label='Slide $i'></button>";
                                }
                            }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php 
                            $counter = 0;
                            foreach($imgs as $img) {
                                $url = $img -> url;
                                if ($counter == 0) {
                                    echo "<div class='carousel-item active'><img src='$url' class='d-block w-100' alt='Slide 0'></div>";
                                    $counter++;
                                } else {
                                    echo "<div class='carousel-item'><img src='$url' class='d-block w-100' alt='Slide $counter'></div>";
                                    $counter++;
                                }
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div>
                <?php
                    $breeds = $imgs[0] -> breeds;
                    $obj = $breeds[0];

                    $name = $obj -> name;
                    $temperament = $obj -> temperament;
                    $origin = $obj -> origin;
                    $description = $obj -> description;

                    echo "<div><h2><b>$name</b></h2></div>";
                    echo "<div><b>Temperament: </b>$temperament</div>";
                    echo "<div><b>Origin: </b>$origin</div>";
                    echo "<div><b>Description: </b>$description</div>";

                    $affection_level = $obj -> affection_level;
                    $lap = $obj -> lap;
                    $intelligence = $obj -> intelligence;
                    $adaptability = $obj -> adaptability;

                    echo "<div><b>Affection Level: </b>";
                    for ($i = 0; $i < $affection_level; $i++) echo "<span class='rating'><i class='fa-solid fa-star'></i></span>";
                    for ($i = 0; $i < 5-$affection_level; $i++) echo "<span class='rating'><i class='fa-regular fa-star'></i></span>";
                    echo "</div>";
                    echo "<div><b>Lap: </b>";
                    for ($i = 0; $i < $lap; $i++) echo "<span class='rating'><i class='fa-solid fa-star'></i></span>";
                    for ($i = 0; $i < 5-$lap; $i++) echo "<span class='rating'><i class='fa-regular fa-star'></i></span>";
                    echo "</div>";
                    echo "<div><b>Intelligence: </b>";
                    for ($i = 0; $i < $intelligence; $i++) echo "<span class='rating'><i class='fa-solid fa-star'></i></span>";
                    for ($i = 0; $i < 5-$intelligence; $i++) echo "<span class='rating'><i class='fa-regular fa-star'></i></span>";
                    echo "</div>";
                    echo "<div><b>Adaptability: </b>";
                    for ($i = 0; $i < $adaptability; $i++) echo "<span class='rating'><i class='fa-solid fa-star'></i></span>";
                    for ($i = 0; $i < 5-$adaptability; $i++) echo "<span class='rating'><i class='fa-regular fa-star'></i></span>";
                    echo "</div>";

                ?>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>