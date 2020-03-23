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

        <div class="col-9 border">

            <div class="mb-5">
                <h1>Mes messages</h1>
            </div>
            <div class="d-flex h-100">
                <div class="listconversation w-25 h-75 border p-2">
                    <ul class="p-0">
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <li class="list-unstyled color0d1d3d rounded p-2 my-1">
                                <h6 class="font-weight-bold">Charles A.</h6>
                                <p>Saviez vous que nous savions ce que vous savez ?</p>
                            </li>
                        </a>
                    </ul>
                </div>

                <div class="conversation w-75 border h-75">
                    <div class="listmessage d-flex flex-column justify-content-end border w-100 h-75">
                        <div class="d-flex justify-content-start w-100 p-3">
                            <div class="w-50 d-flex align-items-center">
                                <img src="../img/profil.jpg" class="imgsugg rounded-circle">
                                <p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">Je vous parle d'un temps
                                    Que les moins de vingt ans Ne peuvent pas connaître
                                    Montmartre en ce temps-là
                                    <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100 p-3">
                            <div class="w-50 d-flex align-items-center">
                                <p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">Accrochait ses lilas
                                    Jusque sous nos fenêtres
                                    Et si l'humble garni
                                    <span class="datemessage d-block text-right">Envoyé le 15/08/2020 à 15h22</span>
                                </p>
                                <img src="../img/profil.jpg" class="imgsugg rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="h-25 border">
                        <form action=""></form>
                        <div class="h-75">
                            <textarea name="" id="" class="h-100 w-100"></textarea>
                        </div>
                        <div class="h-25 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'footmobile.php' ?>
    </div>

    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

</body>

</html>