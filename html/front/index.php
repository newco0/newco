<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/icofont/icofont.css">
    <link rel="stylesheet" href="style.css">
    <title>Accueil NewCo</title>
</head>

<body class="container-fluid">
    <div class="row widthscreen mx-auto">

        <?php require 'topmobile.php' ?>

        <?php require 'header.php' ?>

        <div class="col-6 border">
            <div class="mb-5">
                <h1>Fil d'actualité</h1>
            </div>
            <div class="d-flex border p-2">
                <div>
                    <img class="arround rounded-circle mr-2" src="../img/orang.jpg" alt="photo de profil">
                </div>
                <form method="POST" action="" class="w-100">
                    <div class="w-100">
                        <!-- <img class="arround rounded-circle mr-2" src="../img/orang.jpg" alt="photo de profil"> -->
                        <textarea class="border resize w-80" name="" id="" rows="5" placeholder="post"></textarea>
                    </div>
                    <div class="w-100 d-flex justify-content-around">
                        <div class="position-relative text-center">
                            <i class="icofont-image ico-size position-absolute w-100"></i>
                            <input class="opa" name="publi" type="file">
                            <i class="icofont-slightly-smile ico-size position-absolute w-100"></i>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-color">Poster</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="sep"></div>
            <div class="w-100 border">
                <div class="d-flex">
                    <div class="mt-2">
                        <img class="arround rounded-circle ml-2" src="../img/orang.jpg" alt="photo de profil">
                    </div>
                    <div class="d-flex">
                        <a class="ml-2 mt-2" href="#">Save the orang-utang</a>
                    </div>
                </div>
                <div class="ml-5">
                    <p>Ceci est notre premier post :-)</p>
                </div>
                <div class="col-12">
                    <img class="img-fluid" src="../img/centenario.jpg" alt="">
                </div>
                <div class="row">
                    <div class="col-6 pl-4 pr-0 m-0 div-image">
                        <img class="img-fluid img-size" src="../img/centenario.jpg" alt="">
                    </div>
                    <div class="col-6 pl-0 m-0 div-image2">
                        <img class="img-fluid img-size" src="../img/centenario.jpg" alt="">
                    </div>
                </div>
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