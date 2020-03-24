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
    
        <div class="col-12 col-sm-10 col-xl-8 mx-auto">
            <h5 class="ml-3 my-2 d-none d-sm-block text-center text-md-left">Mon profil</h5>
            <form method="post" class="row form-group my-5" action="">
                <div class="row d-md-flex col-12 align-items-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center position-relative">
                        <img class="imgprofil rounded-circle" src="../img/profil.jpg" alt="">
                        <input class="w-25 form-control-file fileprofil position-absolute" type="file" name="imgprofil">
                        <i class="w-25 icofont-edit editimgprofil position-absolute"></i>
                    </div>
                    <div class="col-12 col-md-6 mt-5 my-md-0">
                        <p></p>
                        <input class="form-control-file w-75 mx-auto" type="file" name="imgcover">
                    </div>
                </div>
                <div class="row w-75 inscriptionform mx-auto form-group d-flex justify-content-center mt-4">
                    <div class="col-12 my-2">
                        <input class="form-control pseudoprofil mx-auto text-center" type="text" name="pseudo" placeholder="Pseudo">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2  text-center" type="text" name="name" placeholder="Nom">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2 text-center" type="text" name="firstname" placeholder="Prénom">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2  text-center" type="date" name="datebirth">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2 text-center" type="email" name="email" placeholder="Adresse mail">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2 text-center" type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 my-2">
                        <input class="form-control mx-xl-2  text-center" type="password" name="confirmpwd" placeholder="Confirmation">
                    </div>
                    <div class="col-12 my-2 text-center">
                        <button type="submit" class="btn btninscription bgcolor68c2e8 text-white">Confirmation</button>
                    </div>
                </div>
            </form>
        </div>
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