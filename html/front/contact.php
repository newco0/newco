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

        <div class="border col-12 col-sm-9 col-lg-6">
            <div class="my-2">
                <h1>Contactez-nous</h1>
            </div>
            <div class="w-75 mx-auto">
                <form class="row" method="post" action="">
                    <div class="col-12 col-sm-6 col-xl-6 my-5">
                        <input class="form-control mx-xl-2 text-center bord-input-contact shadow-none" type="text" name="lastname" placeholder="Nom">
                    </div>
                    <div class="col-12 col-sm-6 col-xl-6 my-5">
                        <input class="form-control mx-xl-2 text-center bord-input-contact shadow-none" type="text" name="firstname" placeholder="Prénom">
                    </div>
                    <div class="col-12 col-sm-6 col-xl-6 my-5">
                        <input class="form-control mx-xl-2 text-center bord-input-contact shadow-none" type="email" name="email" placeholder="Adresse email">
                    </div>
                    <div class="col-12 col-sm-6 col-xl-6 my-5">
                        <input class="form-control mx-xl-2 text-center bord-input-contact shadow-none" type="text" name="object" placeholder="Sujet">
                    </div>
                    <div class="col-12 col-sm-12 col-xl-12 my-5">
                        <textarea class="bord-input-contact resize w-100 text-center shadow-none" name="" id="" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                        <button class="btn bgcolor68c2e8 text-white">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require 'rightside.php' ?>
        <div class="footmobile w-100">
            <?php require 'footmobile.php' ?>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

</body>

</html>