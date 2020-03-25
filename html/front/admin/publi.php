<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/icofont/icofont.css">
    <link rel="stylesheet" href="style_admin.css">
    <title>Title</title>
</head>

<body>

    <?php require 'header.php'; ?>

    <main class="container-fluid">
        <div class="row p-0">
            <div class="col-12 col-xl-8 mx-auto my-3">
                <h5 class="text-center">Publication</h5>
                <div class="w-100 mt-4 zoomcontain position-relative">
                    <div class="d-flex justify-content-center mx-auto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam ex eveniet cupiditate tenetur fugiat? Odio recusandae in ipsa vel hic quisquam cum dignissimos, nostrum quasi voluptatibus repudiandae laboriosam explicabo aspernatur.</p>
                    </div>
                    <div class="zoomer"></div>
                    <div class="mx-auto mt-4 d-flex flex-wrap justify-content-center">
                        <div class="col-3 col-lg-4">
                            <img class="w-100 zoom p-0 mr-2" src="../../img/orang.jpg" alt="">
                        </div>
                        <div class="col-3 col-lg-4">
                            <img class="w-100 zoom p-0 mr-2" src="../../img/orang.jpg" alt="">
                        </div>
                        <div class="col-3 col-lg-4">
                            <img class="w-100 zoom p-0 mr-2" src="../../img/orang.jpg" alt="">
                        </div>
                        <div class="col-3 col-lg-4">
                            <img class="w-100 zoom p-0 mr-2" src="../../img/orang.jpg" alt="">
                        </div>
                        <div class="col-3 col-lg-4">
                            <img class="w-100 zoom p-0 mr-2" src="../../img/profil.jpg" alt="">
                        </div>
                    </div>
                </div>
                <h5 class="text-center mt-4 mb-4">Commentaire</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">ID utilisateur</th>
                                <th class="text-center">Pseudo</th>
                                <th class="text-center">Commentaire</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">Coucou</td>
                                <td class="text-center"><i class="icofont-eye-alt"></i></td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchesTop1">
                                        <label class="custom-control-label" for="customSwitchesTop1"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="text-center mt-4 mb-4">Réaction</h5>
                <div class="table-responsive col-12 col-md-6 mx-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">ID utilisateur</th>
                                <th class="text-center">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">2</td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>