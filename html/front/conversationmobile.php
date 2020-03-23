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

        <div class="col-12 col-sm-10 col-lg-6 maincontent d-sm-block text-center">
            <h5 class="mt-2">Conversation</h5>
            <div class="conversation col-12 d-block">
                <div class="listmessage border d-flex flex-column w-100 h-75">
                    <div class="d-flex justify-content-start w-100 p-3">
                        <div class="w-75 d-flex">
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg d-sm rounded-circle">
                            <p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">Je vous parle d'un temps
                                Que les moins de vingt ans Ne peuvent pas connaître
                                Montmartre en ce temps-là
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end w-100 p-3">
                        <div class="w-75 d-flex">
                            <p class="mx-2 p-2 rounded bg-secondary text-white">Accrochait ses lilas
                                Jusque sous nos fenêtres
                                Et si l'humble garni
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg rounded-circle">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start w-100 p-3">
                        <div class="w-75 d-flex">
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg rounded-circle">
                            <p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">Je vous parle d'un temps
                                Que les moins de vingt ans Ne peuvent pas connaître
                                Montmartre en ce temps-là
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end w-100 p-3">
                        <div class="w-75 d-flex">
                            <p class="mx-2 p-2 rounded bg-secondary text-white">Accrochait ses lilas
                                Jusque sous nos fenêtres
                                Et si l'humble garni
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg rounded-circle">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start w-100 p-3">
                        <div class="w-75 d-flex">
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg rounded-circle">
                            <p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">Je vous parle d'un temps
                                Que les moins de vingt ans Ne peuvent pas connaître
                                Montmartre en ce temps-là
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end w-100 p-3">
                        <div class="w-75 d-flex">
                            <p class="mx-2 p-2 rounded bg-secondary text-white">Accrochait ses lilas
                                Jusque sous nos fenêtres
                                Et si l'humble garni
                                <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                            </p>
                            <img src="../img/profil.jpg" class="d-sm-none d-md-block imgsugg rounded-circle">
                        </div>
                    </div>
                </div>



            </div>

        </div>

        <?php require 'rightside.php' ?>
        <div class="footmobile w-100">
            <div class="w-100 sendmessagemobile bg-white">
                <form class="border mx-auto d-flex flex-row justify-content-center align-items-center" action="">
                    <textarea name="" id="" class="textmessage h-50 w-50"></textarea>
                    <button class="my-auto mr-3 sendbtn bg-white" type="submit"><i class="icofont-paper-plane icofont-2x"></i></button>
                </form>
            </div>
            <?php require 'footmobile.php' ?>
        </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>