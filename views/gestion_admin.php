<?php

session_start();

$booklist = $_SESSION["booklist"] ?? null;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../utils/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "/partials/_navbar.php" ?>
    </div>
    <div class="row">
        Coucou
        <form action="../src/controllers/connexion_controller.php">
            <div>
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Password</label>
            </div>
            <div class="col-auto">
                <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
            </div>
        </form>
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
</body>

</html>