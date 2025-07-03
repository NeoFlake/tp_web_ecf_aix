<?php

session_start();

if(!isset($_SESSION["admin_logged"])){
    header("location: ../../views/index.php");
}

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
    <script src="../utils/bootstrap.bundle.min.js"></script>
</body>

</html>