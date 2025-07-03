<?php

include __DIR__ . "/../services/book_service.php";

session_start();

// Travail métier lors de la soumission du formulaire de calcul lors de la calculette
if (str_contains($_SERVER['HTTP_REFERER'], "index.php") and $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST["book_search_validation"]) and $_POST["book_search_validation"] === "validated") {
    $_SESSION["book_search"] = htmlentities($_POST["book_search"]);

     $_SESSION["booklist"] = get_booklist_by_text_or_author($_SESSION["book_search"]);

    header("location: ../../views/index.php");
    die();
}
