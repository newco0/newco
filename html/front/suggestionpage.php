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

<body class="container-fluid p-0">
    <div class="row widthscreen mx-auto h-100">

        <?php require 'topmobile.php' ?>

        <?php require 'header.php' ?>

        <div class="col-12 col-sm-10 col-lg-6 mt-3 maincontent d-sm-block text-center">
            <h5 class="my-2 d-none d-sm-block">Suggestions</h5>
            <ul class="list-unstyled font-weight-bold">
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Hugo Lloris</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Raphaël Varane</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Dimitry Payet</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Florian Thauvin</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Kylian Mbappé</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Hugo Lloris</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Raphaël Varane</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Dimitry Payet</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Florian Thauvin</span><i class="mx-2 icofont-close"></i></li>
                <li class="p-2 unread rounded my-2"><img class="imgsugg rounded-circle mx-2" src="../img/profil.jpg" alt=""><span class="font-weight-normal">Kylian Mbappé</span><i class="mx-2 icofont-close"></i></li>
            </ul>
        </div>
        <?php require 'rightside.php' ?>

        <div class="footmobile w-100">
            <?php require 'footmobile.php' ?>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>