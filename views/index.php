<?php

include __DIR__ . "../../src/services/book_service.php";

session_start();

$booklist = $_SESSION["booklist"] ?? null;
$_SESSION["main_page_displayed"] = true;

if (!isset($booklist)) {
    $booklist = get_all();
}

unset($_SESSION["booklist"]);

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
        <?php if (isset($booklist)) { ?>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1>Les dix livres les plus récents correspondant à votre recherche</h1>
                </div>
            </div>
            <div class="row">
                <?php if (is_string($booklist)) { ?>
                    <p><?php echo $booklist ?></p>
                <?php } else { ?>
                    <ul class="d-flex justify-content-center row">
                        <?php foreach ($booklist as $book) { ?>
                            <li class="mt-3">
                                <?php echo $book["title"] . " a été écrit par " . $book["complete_name"] . " en " . $book["publishing_year"] ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/44e9c18f39.js" crossorigin="anonymous"></script>
</body>

</html>