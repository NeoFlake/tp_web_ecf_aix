<?php

include __DIR__ . "/../config/connexion.php";

function get_admin_by_email($email)
{

    $pdo = get_connection();

    try {

        $select = "SELECT * FROM admin WHERE email= :email";

        $query = $pdo->prepare($select);
        $query->bindValue(":email", $email);
        $query->execute();

        $result = $query->fetch();

        if ($result) {
            return $result;
        } else {
            throw new Exception("Aucun utilisateur avec cet email n'existe");
        }
    } catch (PDOException $error) {
        throw new PDOException($error->getMessage());
    }

}
