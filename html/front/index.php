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
    <title>Accueil NewCo</title>
</head>

<body class="container">
    <div class="row">
        <?php require 'header.php' ?>
        <div class="col-6">
            <div>
                <h1>Fil d'actualité</h1>
            </div>
            <div class="d-flex">
                <div class="mr-2">
                    <img class="arround rounded-circle" src="../img/orang.jpg" alt="photo de profil">
                </div>
                <div class="">
                    <form method="POST" action="">
                        <textarea class="border resize" name="" id="" cols="40" rows="4"></textarea>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-color">Poster</button>
                        </div>
                        <div>
                            <i class="icofont-image"></i>
                            <input class="op" name="publi" type="file">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require 'rightside.php' ?>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>