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
    <title>Utilisateurs</title>
</head>

<body>
    <?php require 'header.php'; ?>

    <main class="container-fluid">
        <div class="row p-0">
            <div class="col-12 col-xl-8 mx-auto my-3">
                <h5 class="text-center titlepage">Liste des utilisateurs</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom</th>
                                <th class="text-center">Voir</th>
                                <th class="text-center">Activer / Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td class="text-center">Laslaa</td>
                                <td class="text-center">Mohammed</td>
                                <td class="text-center"><i class="icofont-arrow-right"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchesTop1">
                                        <label class="custom-control-label" for="customSwitchesTop1"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="text-center">Dufour</td>
                                <td class="text-center">Olivier</td>
                                <td class="text-center"><i class="icofont-arrow-right"></td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchesTop2">
                                        <label class="custom-control-label" for="customSwitchesTop2"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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