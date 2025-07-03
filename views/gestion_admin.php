<?php

include __DIR__ . "/../src/services/book_service.php";

session_start();

if (!isset($_SESSION["admin_logged"])) {
    header("location: ../../views/index.php");
}

$booklist = get_all_books($_SESSION["admin_logged"]["id"]);

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
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1>Gestion Administrative des livres et auteurs</h1>
            </div>
        </div>
        <div class="row">
            <div class="mt-5 text-decoration-underline">
                <h4>Gestion Administrative des livres et auteurs</h4>
            </div>
            <div class="mt-4 text-decoration-underline">
                <p>Livres</p>
            </div>
            <?php if (!is_string($booklist) and count($booklist) > 0) { ?>
            <?php } else { ?>
                <div>
                    <p>Vous n'avez entrée aucun livre dans votre bibliothèque ou une erreur nous empêche de vous l'afficher pour le moment</p>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
</body>

</html>