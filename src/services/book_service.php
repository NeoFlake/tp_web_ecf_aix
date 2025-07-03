<?php

include __DIR__ . "/../repositories/book_repositorie.php";

function get_booklist_by_text_or_author($book_search)

{

    $result = "Échec lors de la recherche de livre : ";
    try {
        $result = get_all_books_by_text_or_author($book_search);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer"; // À SUPPRIMER!!!!!
    } catch (Exception $error) {
        $result .=  $error->getMessage();
    }

    return $result;
}
