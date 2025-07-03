<?php

include __DIR__ . "/../repositories/admin_repositorie.php";

function get_connexion($login)
{
    $result = "Échec de connexion : ";
    if ($login["email"] === "") {
        $result .= "Veuillez entrer un email s'il vous plait";
    } else if ($login["password"] === "") {
        $result .= "Mot de passe invalide";
    } else {
        try {
            $result = get_admin_by_email($login["email"]);
            if ($result["password"] !== $login["password"]) {
                $result .= "Votre mot de passe est invalide";
            }
        } catch (PDOException $pdo_error) {
            $result .= "Échec fatal lors de la tentative de connexion; veuillez réessayer " . $pdo_error->getMessage();
        } catch (Exception $error) {
            $result .= $error->getMessage();
        }
    }

    return $result;
}
