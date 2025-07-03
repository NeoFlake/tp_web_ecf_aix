<?php

include __DIR__ . "/../config/connexion.php";

function insert_new_book($new_book){
    $pdo = get_connection();

    try {
        $insert = "INSERT INTO book (
        title,
        category,
        publishing_year,
        resume,
        id_author,
        id_admin
        ) VALUES (
        :title,
        :category,
        :publishing_year,
        :resume,
        :id_author,
        :id_admin
        )";

        $query = $pdo->prepare($insert);
        $query->bindValue(":title", $new_book["title"]);
        $query->bindValue(":category", $new_book["category"]);
        $query->bindValue(":publishing_year", $new_book["publishing_year"]);
        $query->bindValue(":resume", $new_book["resume"]);
        $query->bindValue(":id_author", $new_book["id_author"]);
        $query->bindValue(":id_admin", $new_book["id_admin"]);
        $query->execute();
        
    } catch(PDOException $pdo_exception) {

    }
}

function get_all_books_by_text_or_author($book_search)
{
    $pdo = get_connection();

    try {
        $select = "SELECT * FROM book AS b
        JOIN admin AS ad ON b.id_admin = ad.id
        JOIN author AS auth ON b.id_author = auth.id
        WHERE b.title LIKE \"%\":book_search\"%\" 
        OR auth.complete_name LIKE \"%\":author_search\"%\"
        ORDER BY b.publishing_year DESC
        LIMIT 10";

        $query = $pdo->prepare($select);
        $query->bindValue(":book_search", $book_search);
        $query->bindValue(":author_search", $book_search);
        $query->execute();

        $result = $query->fetchAll();

        if ($result) {
            return $result;
        } else {
            throw new Exception("Aucun livre n'a été trouvé avec vos critères de recherches");
        }
    } catch (PDOException $pdo_exception) {
        throw new PDOException($pdo_exception->getMessage());
    }
}

function get_all_by_admin_id($id_admin)
{

    $pdo = get_connection();

    try {

        $select = "SELECT b.id AS id,
        b.title AS title, 
        b.category AS category, 
        b.publishing_year AS publishing_year, 
        auth.complete_name AS author_name 
        FROM book AS b
        JOIN author AS auth ON b.id_author = auth.id
        WHERE b.id_admin = :id_admin
        ORDER BY publishing_year DESC";

        $query = $pdo->prepare($select);
        $query->bindValue(":id_admin", $id_admin);
        $query->execute();

        return $query->fetchAll();
    } catch (PDOException $pdo_error) {
        throw new PDOException($pdo_error->getMessage());
    }
}

function delete_book_by_id($id)
{
    $pdo = get_connection();

    try {

        $delete = "DELETE FROM book WHERE id = :id";

        $query = $pdo->prepare($delete);
        $query->bindValue(":id", $id);
        $query->execute();

    } catch (PDOException $pdo_error) {
        throw new PDOException($pdo_error->getMessage());
    }
}
