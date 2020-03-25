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
    <title>Message</title>
</head>

<body>
    <?php require 'header.php'; ?>

    <main class="container-fluid">
        
        <h5 class="text-center">Message</h5>
        <form method="post" class="form-group my-5 messagesendform" action="">
            <div class="row d-md-flex mx-auto justify-content-center align-items-center">
                <div class="col-12 col-md-3 col-xl-2 my-1 my-lg-2 text-center">
                    <p>Nom : <br><span class="font-weight-bold">Laslaa</span></p>
                </div>
                <div class="col-12 col-md-3 col-xl-2 my-1 my-lg-2 text-center name">
                    <p>Prénom : <br><span class="font-weight-bold">Mohammed</span></p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-3 my-1 my-lg-2 text-center">
                    <p>Email : <br><span class="font-weight-bold">mohamed.laslaa@gmail.com</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 col-lg-6 my-4 mx-auto text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ipsa soluta aspernatur consequatur eius mollitia doloribus blanditiis ex. Magni soluta suscipit in. Ad velit mollitia hic explicabo minus a quaerat?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 col-lg-5 my-2 my-lg-4 text-center mx-auto">
                    <textarea class="w-100" name="response" rows="4"></textarea>
                </div>
            </div>
            <div class="col-12 my-1 my-lg-2 text-center">
                <button type="submit" class="btn btninscription bgcolor68c2e8 text-white">Répondre</button>
            </div>
            </div>
        </form>

    </main>
    <script src="https://kit.fontawesome.com/a2bab1df4f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="admin.js"></script>

</body>

</html>