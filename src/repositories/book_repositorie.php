<?php

include __DIR__ . "/../config/connexion.php";

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
