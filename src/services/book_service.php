<?php

include __DIR__ . "/../repositories/book_repositorie.php";

function add_new_book($new_book)
{
    $result = "Échec lors de la création d'un nouveau livre : ";
    try {
        $result = insert_new_book($new_book);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    } catch (Exception $error) {
        $result .=  $error->getMessage();
    }

    return $result;
}

function get_booklist_by_text_or_author($book_search)
{

    $result = "Échec lors de la recherche de livre : ";
    try {
        $result = get_all_books_by_text_or_author($book_search);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    } catch (Exception $error) {
        $result .=  $error->getMessage();
    }

    return $result;
}

function get_all_books($id)
{
    $result = null;

    try {
        $result = get_all_by_admin_id($id);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    }

    return $result;
}

function delete_book_by_book_id($id)
{
    $result = "Échec dans la suppression du livre : ";

    try {
        $result = delete_book_by_id($id);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    }

    return $result;
}
