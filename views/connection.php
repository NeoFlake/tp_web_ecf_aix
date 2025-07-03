<?php

session_start();

$email = $_SESSION["email"] ?? null;

unset($_SESSION["main_page_displayed"])

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../utils/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "/partials/_navbar.php" ?>
        <div class="d-flex justify-content-center">
            <h1>Connexion</h1>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <form action="../../src/controllers/user/user_controller.php" method="post">
                <div class="row">
                    <div class="col-12">
                        <label for="email" class="col-form-label">Email </label>
                        <input type="email" id="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : null ?>" />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <label for="password" class="col-form-label">Mot de passe</label>
                        <input type="password" id="password" class="form-control" name="password" />
                    </div>
                </div>
                <div class="row mt-5 d-flex justify-content-center">
                    <button class="btn btn-primary col-10">Connexion</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
</body>

</html>