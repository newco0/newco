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

<body class="container-fluid p-0 h-100">
    <div class="row h-100 m-0">
        <div class="col-12 col-lg-6 text-center logoside heightconnect d-flex flex-column align-items-center justify-content-center">
            <img src="../img/logo.png" class="img-fluid" alt="">
            <div class="d-flex align-items-center mt-3">
                <button class="btn bgcolor0d1d3d btnconnexion d-lg-none text-white my-2 mx-5" type="button">Connexion</button>
                <i class="icofont-close closeconnect"></i>
            </div>
            <div class="formmobileconnect"></div>
            <div class="d-flex align-items-center mb-3 mx-5">
                <button class="btn bgcolor0d1d3d btnsubscribe d-lg-none text-white my-2 mx-5" type="button">Inscription</button>
                <i class="icofont-close closesubscribe"></i>
            </div>
            <div class="formmobilesubscribe"></div>
        </div>
        <div class="col-12 col-lg-6 bgcolor68c2e8 heightconnect d-flex align-items-center d-lg-block">
            <div class="d-none d-lg-block">
                <form method="post" action="" class="formconnect">
                    <div class="row form-group d-flex justify-content-center mt-4">
                        <div class="col-8 col-xl-4 m-2 p-0">
                            <input class="form-control mx-xl-2  text-center" type="text" name="login" placeholder="Identifiant">
                        </div>
                        <div class="col-8 col-xl-3 m-2 p-0">
                            <input class="form-control mx-xl-2 text-center" type="password" name="password" placeholder="Mot de passe">
                            <small id="pwdhelp" class="form-text text-center"><a class="text-white text-decoration-none" href="">Mot de passe oublié ?</a></small>
                        </div>
                        <div class="col-8 col-xl-2 my-2 text-center">
                            <button type="submit" class="btn btnconnection bgcolor68c2e8 text-white mx-xl-2">Connexion</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-8 mt-lg-5 mx-auto text-center">
                <h1 class="titleconnect text-white">Rejoignez NewCo, le nouveau réseau social
                </h1>
            </div>
            <div class="col-12 mt-5 mx-auto text-center d-none d-lg-block">
                <form method="post" action="" class="formsubscribe">
                    <div class="row w-75 inscriptionform mx-auto form-group d-flex justify-content-center mt-4">
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2  text-center" type="text" name="name" placeholder="Nom">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2 text-center" type="text" name="firstname" placeholder="Prénom">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2  text-center" type="date" name="datebirth">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2 text-center" type="email" name="email" placeholder="Adresse mail">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2 text-center" type="password" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2  text-center" type="password" name="confirmpwd" placeholder="Confirmation">
                        </div>
                        <div class="col-12 col-sm-6 col-xl-5 my-2">
                            <input class="form-control mx-xl-2  text-center" type="text" name="pseudo" placeholder="Pseudo">
                        </div>
                        <div class="col-6 col-xl-5 my-2 p-0">
                            <button type="submit" class="btn btninscription bgcolor68c2e8 text-white mx-xl-2">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>