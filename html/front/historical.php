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
    <div class="row widthscreen mx-auto h-100">

        <?php require 'topmobile.php' ?>

        <?php require 'header.php' ?>

        <div class="col-12 col-sm-10 col-xl-8 mx-auto">
            <h5 class="ml-3 my-2 d-none d-sm-block text-center text-md-left">Historique</h5>
            <div class="mt-md-5">
                <div class="contenthistoricalday mt-2 row p-0">
                    <p class="text-center col-12">Aujourd'hui</p>
                    <div class="contenthistorical mx-auto col-12 col-md-8">
                        <div class="mt-1 p-2 bgcolor68c2e8 text-white">
                            <i class="icofont-close clearcomment"></i>
                            <span class="p-2">Vous avez commenté votre publication</span>
                        </div>
                        <div class="mt-1 p-2 bgcolor68c2e8 text-white">
                            <i class="icofont-close clearcomment"></i>
                            <span class="p-2">Vous avez aimé la publication de Marc</span>
                        </div>
                    </div>
                </div>
                <div class="contenthistoricalday mt-2 row p-0">
                    <p class="text-center col-12">Hier</p>
                    <div class="mx-auto col-12 col-md-8">
                        <div class="mt-1 p-2 bgcolor68c2e8 text-white">
                            <i class="icofont-close clearcomment"></i>
                            <span class="p-2">Vous avez commenté votre publication</span>
                        </div>
                        <div class="mt-1 p-2 bgcolor68c2e8 text-white">
                            <i class="icofont-close clearcomment"></i>
                            <span class="p-2">Vous avez aimé la publication de Marc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footmobile.php' ?>
    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

</body>

</html>