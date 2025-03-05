<?php
require "seguridad.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <title>Pagina Principal</title>
</head>

<body>
    <div class="div-1200px">
        <div class="div-flex">
            <div class="container">
                <?php include 'utils/navbar.php' ?>

                <div class="sub-container">
                    <?php 
                    include 'utils/sidebar.php';
                    ?>

                    <div class="main-container">
                        <div class="main">
                            <h1>Panel administrativo</h1>

                            <div class="div-img">
                                <img src="img/principal.png" alt="">
                            </div>
                        </div>

                        <!-- <div class="content">
                            <div class="content1">
                                <h2>content1</h2>
                            </div>

                            <div class="content2">
                                <h2>content2</h2>
                            </div> -->

                            <?php include 'utils/footer.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>