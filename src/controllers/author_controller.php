<?php

include __DIR__ . "/../services/author_service.php";

session_start();

if(str_contains($_SERVER['HTTP_REFERER'], "gestion_admin.php") and $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST["modification"])){

    $udpated_author = [
        "id" => htmlentities($_POST["modification"]),
        "complete_name" => htmlentities($_POST["complete_name"]),
        "nationality" => htmlentities($_POST["nationality"])
    ];

    update_author($udpated_author);

    header("location: ../../views/gestion_admin.php");
    die();

}

if (str_contains($_SERVER["HTTP_REFERER"], "gestion_admin.php") and $_SERVER["REQUEST_METHOD"] == "POST") {

   $new_author = [
    "complete_name" => htmlentities($_POST["complete_name"]),
    "nationality" => htmlentities($_POST["nationality"])
   ];

   add_new_author($new_author);

    header("location: ../../views/gestion_admin.php");
    die();
}

if (str_contains($_SERVER["HTTP_REFERER"], "gestion_admin.php") and isset($_GET["id"])) {

   delete_author(htmlentities($_GET["id"]));

    header("location: ../../views/gestion_admin.php");
    die();
}