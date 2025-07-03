<?php

include_once __DIR__ . "/../config/connexion.php";

function insert_new_author($new_author) {
    $pdo = get_connection();

    try {
        $insert = "INSERT INTO author (
        complete_name,
        nationality
        ) VALUES (
        :complete_name,
        :nationality
        )";

        $query = $pdo->prepare($insert);
        $query->bindValue(":complete_name", $new_author["complete_name"]);
        $query->bindValue(":nationality", $new_author["nationality"]);
        $query->execute();
        
    } catch(PDOException $pdo_exception) {

    }
}

function get_all_authors_and_count()
{

    $pdo = get_connection();

    try {

        $select = "SELECT auth.id AS id,
        auth.complete_name AS author_name, 
       auth.nationality AS nationality,
       COUNT(b.title) AS nombre_livre FROM author AS auth
        LEFT JOIN book AS b ON b.id_author = auth.id
        GROUP BY auth.complete_name";

        $query = $pdo->prepare($select);
        $query->execute();

        return $query->fetchAll();
    } catch (PDOException $pdo_error) {
        throw new PDOException($pdo_error->getMessage());
    }
}

function delete_author_by_id($id){
    $pdo = get_connection();

    try {

        $delete = "DELETE FROM author WHERE id = :id";

        $query = $pdo->prepare($delete);
        $query->bindValue(":id", $id);
        $query->execute();

    } catch (PDOException $pdo_error) {
        throw new PDOException($pdo_error->getMessage());
    }
}
