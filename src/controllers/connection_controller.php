<?php

include __DIR__ . "/../services/connection_service.php";

session_start();

if (str_contains($_SERVER["HTTP_REFERER"], "connection.php") and $_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["email"] = htmlentities($_POST["email"]);
    $login = [
        "email" => $_SESSION["email"],
        "password" => htmlentities($_POST["password"])
    ];

    $connected = get_connexion($login);

    if(is_string($connected)){
        $_SESSION["fail_connexion"] = $connected;
        header("location: ../../views/connection.php");
    } else {
        $_SESSION["admin_logged"] = $connected;
        header("location: ../../views/gestion_admin.php");
    }

    die();
}

if (isset($_POST["deconnection"]) and $_POST["deconnection"] == true) {

    unset($_SESSION["admin_logged"]);

    header("location: ../../views/index.php");
    die();
}