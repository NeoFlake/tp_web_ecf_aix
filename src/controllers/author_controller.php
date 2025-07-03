<?php

include __DIR__ . "/../services/author_service.php";

session_start();

if (str_contains($_SERVER["HTTP_REFERER"], "gestion_admin.php") and $_SERVER["REQUEST_METHOD"] == "POST") {

   $new_author = [
    "complete_name" => $_POST["complete_name"],
    "nationality" => $_POST["nationality"]
   ];

   add_new_author($new_author);

    header("location: ../../views/gestion_admin.php");
    die();
}