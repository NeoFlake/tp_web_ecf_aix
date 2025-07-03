<?php

include __DIR__ . "/../services/book_service.php";

session_start();

if (str_contains($_SERVER['HTTP_REFERER'], "index.php") and $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST["book_search_validation"]) and $_POST["book_search_validation"] === "validated") {
    $_SESSION["book_search"] = htmlentities($_POST["book_search"]);

     $_SESSION["booklist"] = get_booklist_by_text_or_author($_SESSION["book_search"]);

    header("location: ../../views/index.php");
    die();
}

if (str_contains($_SERVER['HTTP_REFERER'], "gestion_admin.php") and isset($_GET["id"])) {

    delete_book_by_book_id(htmlentities($_GET["id"]));

    header("location: ../../views/gestion_admin.php");
    die();
}

if(str_contains($_SERVER['HTTP_REFERER'], "gestion_admin.php") and $_SERVER['REQUEST_METHOD'] == 'POST'){

    $new_book = [
        "title" => htmlentities($_POST["title"]),
        "category" => htmlentities($_POST["category"]),
        "publishing_year" => htmlentities($_POST["publishing_year"]),
        "resume" => htmlentities($_POST["resume"]),
        "id_author" => htmlentities($_POST["id_author"]),
        "id_admin" => htmlentities($_SESSION["admin_logged"]["id"])
    ];

    add_new_book($new_book);

    header("location: ../../views/gestion_admin.php");
    die();

}