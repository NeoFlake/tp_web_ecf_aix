<?php

session_start();

unset($_SESSION["main_page_displayed"]);

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
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
</body>

</html>