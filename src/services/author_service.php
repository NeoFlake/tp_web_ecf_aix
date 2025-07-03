<?php


include __DIR__ . "/../repositories/author_repositorie.php";

function add_new_author($new_author)
{

    $result = "Échec lors de la création d'un nouvel auteur : ";

    try {
        insert_new_author($new_author);
    } catch (PDOException $pdo_error) {
    }
}

function get_all_authors()
{
    $result = "Échec lors de la récupération de l'ensemble des auteurs : ";

    try {
        $result = get_all_authors_and_count();
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    }

    return $result;
}

function delete_author($id){
    $result = "Échec dans la suppression de l'auteur : ";

    try {
        $result = delete_author_by_id($id);
    } catch (PDOException $pdo_error) {
        $result .= "Erreur fatale, veuillez réessayer";
    }

    return $result;
}
