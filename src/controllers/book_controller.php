<?php

session_start();

// Travail métier lors de la soumission du formulaire de calcul lors de la calculette
if (str_contains($_SERVER['HTTP_REFERER'], "index.php") and $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST["book_search_validation"]) and $_POST["book_search_validation"] === "validated") {

    // Redirection vers la vue adéquate
    header("location: ");
    die();
}
