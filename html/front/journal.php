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

<body class="container-fluid p-0 h-100">
    <div class="row widthscreen mx-auto">

        <?php require 'topmobile.php' ?>

        <?php require 'header.php' ?>

        <div class="col-12 col-sm-10 col-lg-6">
            <div class="my-2 d-none d-sm-block">
                <h1>Save the orang-utang</h1>
            </div>
            <div class="bgcolor68c2e8 my-2 d-flex d-xl-none">
                <div class="mt-2 mt-sm-3 ml-2 mr-4">
                    <i class="fas fa-arrow-left text-white fa-2x"></i>
                </div>
                <div class="mt-2 mt-sm-3 p-0 m-0">
                    <p class="prec text-white">Save the orang-utang</p>
                </div>
            </div>
            <div class="border p-2">
                <div class="zoomer"></div>
                <div style="background-image:url(../img/centenario.jpg)" class="cover-newspaper col-12 col-lg-12 position-relative">
                    <!-- <img class="img-fluid" src="../img/centenario.jpg" alt=""> -->
                    <div class="pos d-none d-xl-block">
                        <button type="submit" class="btn bgcolor68c2e8 text-white mr-3">Modifier mon profil</button>
                        <button type="submit" class="btn bgcolor68c2e8 text-white">Historique</button>
                    </div>
                </div>

                <div class="col-12 mt-2 position-relative">
                    <div class="text-center d-none d-xl-block">
                        <a class="mx-3" href="#">Journal</a>
                        <a class="mx-3" href="#">À Propos</a>
                        <a class="mx-3" href="#">Amis</a>
                        <a class="mx-3" href="#">Photos</a>
                    </div>
                    <div class="pos-img-profil border-img-profil img-profil-mobile">
                        <img class="arround-newspaper rounded-circle mr-2 zoom" src="../img/orang.jpg" alt="photo de profil">
                    </div>
                    
                </div>
                <div class="mb-3 mt-5 d-xl-none d-block">
                    <h1>Save the orang-utang</h1>
                </div>
                <div class="d-xl-none d-block">

                    <div class="text-center">
                        <a class="mx-3" href="#">Journal</a>
                        <a class="mx-3" href="#">À Propos</a>
                        <i class="block-menu icofont-dotted-down"></i>
                    </div>
                    <div class="text-right">
                        <ul class="dnone list-unstyled menu">
                            <li><a class="" href="#">Amis</a></li>
                            <li><a class="" href="#">Photos</a></li>
                            <li><a class="" href="#">Modifier mon profil</a></li>
                            <li><a class="" href="#">Historique</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex border p-2 mt-5">
                <div>
                    <img class="arround rounded-circle mr-2" src="../img/orang.jpg" alt="photo de profil">
                </div>
                <form method="POST" action="" class="w-100">
                    <div class="w-100">
                        <!-- <img class="arround rounded-circle mr-2" src="../img/orang.jpg" alt="photo de profil"> -->
                        <textarea class="bord outline resize w-100" name="" id="" rows="5" placeholder="post"></textarea>
                    </div>
                    <div class="w-100 d-flex justify-content-around">
                        <div class="position-relative text-center">
                            <i class="icofont-image ico-size position-absolute w-100"></i>
                            <input class="opa" name="publi" type="file">
                            <i class="icofont-slightly-smile ico-size position-absolute w-100"></i>
                        </div>
                        <div>
                            <button type="submit" class="btn bgcolor68c2e8 text-white">Poster</button>
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
                <div class="row w-100 mx-auto">
                    <div class="col-12 p-0">
                        <img class="img-fluid" src="../img/centenario.jpg" alt="">
                    </div>
                </div>
                <div class="row w-100 p-0 mx-auto mt-3 d-flex justify-content-center">
                    <div class="col-6 p-1">
                        <img class="img-fluid w-100" src="../img/centenario.jpg" alt="">
                    </div>
                    <div class="col-6 p-1">
                        <img class="img-fluid w-100" src="../img/centenario.jpg" alt="">
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="mt-2 mx-5">
                        <i class="far fa-2x fa-thumbs-up"></i>
                    </div>
                    <div class="mt-2 mx-5">
                        <i class="far fa-2x fa-comment"></i>
                    </div>
                    <div class="mt-2 mx-5">
                        <i class="fas fa-2x fa-share"></i>
                    </div>
                </div>
                <div class="d-block d-lg-none">
                    <p class="link-com">Voir tout les commentaires</p>
                </div>
                <div class="d-none d-lg-block div-com mt-2 rounded-top rounded-bottom bgcolor68c2e8">
                    <div class="row d-flex">
                        <div class="ml-4 mt-3">
                            <img class="arround rounded-circle ml-2" src="../img/orang.jpg" alt="photo de profil">
                        </div>
                        <div class="d-flex">
                            <a class="ml-2 mt-4" href="#">Save the orang-utang</a>
                        </div>
                        <div class="ml-2 mt-2 w-80 mx-auto">
                            <p class="ml-3">coucou voici le premier commentaire de cette publication, coucou voici le premier commentaire de cette publication, coucou voici le premier commentaire de cette publication</p>
                        </div>
                    </div>
                    <div class="mt-2 mx-5 text-center">
                        <i class="far fa-2x fa-thumbs-up"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'rightside.php' ?>

        <?php require 'footmobile.php' ?>

    </div>

    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

</body>

</html>