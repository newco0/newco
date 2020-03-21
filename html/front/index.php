<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/icofont/icofont.css">
    <title>Accueil NewCo</title>
</head>

<body class="container-fluid p-0">
    <div class="row widthscreen mx-auto">

        <?php require 'topmobile.php' ?>

        <?php require 'header.php' ?>

        <div class="col-6">
            <div>
                <h1>Fil d'actualité</h1>
            </div>
            <div class="d-flex">
                    <form method="POST" action="" class="w-100">
                        <div class="w-100">
                            <img class="arround rounded-circle" src="../img/orang.jpg" alt="photo de profil">
                            <textarea class="border resize w-75" name="" id=""></textarea>
                        </div>
                        <div class="w-100 d-flex justify-content-around">
                            <div class="position-relative text-center">
                                <i class="icofont-image ico-size position-absolute w-100"></i>
                                <input class="opa" name="publi" type="file">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-color">Poster</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

        <?php require 'rightside.php' ?>

        <?php require 'footmobile.php' ?>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>