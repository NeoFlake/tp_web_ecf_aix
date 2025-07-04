<?php

include __DIR__ . "/../src/services/book_service.php";
include __DIR__ . "/../src/services/author_service.php";

session_start();

if (!isset($_SESSION["admin_logged"])) {
    header("location: ../../views/index.php");
}

$booklist = get_all_books($_SESSION["admin_logged"]["id"]);
$authorlist = get_all_authors();

$modify_in_progress = $_GET["modify_in_progress"] ?? null;
$id_of_modifiyng_element = $_GET["id"] ?? null;

unset($_GET["modify_in_progress"], $_GET["id"]);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../utils/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "/partials/_navbar.php" ?>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1>Gestion Administrative des livres et auteurs</h1>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 text-decoration-underline">
                <h4>Livres</h4>
            </div>
            <?php if (!is_string($booklist) and count($booklist) > 0) { ?>
                <div class="row">
                    <table class="col-8 text-center">
                        <thead>
                            <tr>
                                <th class="border border-dark">Titre</th>
                                <th class="border border-dark">Catégorie</th>
                                <th class="border border-dark">Année de publication</th>
                                <th class="border border-dark">Auteur</th>
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($booklist as $index => $book) { ?>
                                <tr>
                                    <td class="border border-dark"><?php echo $book["title"] ?></td>
                                    <td class="border border-dark"><?php echo $book["category"] ?></td>
                                    <td class="border border-dark"><?php echo $book["publishing_year"] ?></td>
                                    <td class="border border-dark"><?php echo $book["author_name"] ?></td>
                                    <td class="border border-dark">
                                        <a href="<?php echo "./gestion_admin.php?modify_in_progress=book&id=" . $index ?>">
                                            <i class="fa-solid fa-pencil text-black"></i>
                                        </a>
                                    </td>
                                    <td class="border border-dark">
                                        <a href="<?php echo "../src/controllers/book_controller.php?id=" . $book['id'] ?>">
                                            <i class="fa-solid fa-trash text-black"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div>
                    <p>Vous n'avez entrée aucun livre dans votre bibliothèque ou une erreur nous empêche de vous les afficher pour le moment</p>
                </div>
            <?php } ?>
            <div class="mt-3">
                <?php if (isset($modify_in_progress) and $modify_in_progress === "book") { ?>
                    <p>Modifier un livre</p>
                    <div class="d-flex mt-3">
                        <form action="../src/controllers/book_controller.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for="title" class="form-label">Titre </label>
                                    <input type="text" id="title" name="title" class="form-control" value="<?php echo $booklist[$id_of_modifiyng_element]["title"] ?>" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="category" class="form-label">Catégorie </label>
                                    <input type="text" id="category" name="category" class="form-control" value="<?php echo $booklist[$id_of_modifiyng_element]["category"] ?>" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="publishing_year" class="form-label">Année de publication </label>
                                    <input type="number" id="publishing_year" name="publishing_year" class="form-control" value="<?php echo $booklist[$id_of_modifiyng_element]["publishing_year"] ?>" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="resume" class="form-label">Résumé </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="resume" cols="50" rows="3"><?php echo $booklist[$id_of_modifiyng_element]["resume"] ?></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <select class="form-select" name="id_author">
                                        <?php foreach ($authorlist as $author) { ?>
                                            <option value=<?php echo $author["id"] ?> <?php echo $booklist[$id_of_modifiyng_element]["author_name"] === $author["author_name"] ? "selected" : null ?>><?php echo $author["author_name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 d-flex offset-1">
                                <button class="btn btn-outline-success col-6" name="modification" value="<?php echo $booklist[$id_of_modifiyng_element]["id"] ?>">Modifier</button>
                            </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <p>Ajouter un livre</p>
                    <div class="d-flex mt-3">
                        <form action="../src/controllers/book_controller.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for="title" class="form-label">Titre </label>
                                    <input type="text" id="title" name="title" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="category" class="form-label">Catégorie </label>
                                    <input type="text" id="category" name="category" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="publishing_year" class="form-label">Année de publication </label>
                                    <input type="number" id="publishing_year" name="publishing_year" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="resume" class="form-label">Résumé </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="resume" cols="50" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <select class="form-select" name="id_author">
                                        <?php foreach ($authorlist as $author) { ?>
                                            <option value=<?php echo $author["id"] ?>><?php echo $author["author_name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 d-flex offset-1">
                                <button class="btn btn-outline-success col-6">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="mt-5 text-decoration-underline">
                <h4>Auteurs</h4>
            </div>
            <?php if (!is_string($authorlist) and count($authorlist) > 0) { ?>
                <div class="row">
                    <table class="col-8 text-center">
                        <thead>
                            <tr>
                                <th class="border border-dark">Auteur</th>
                                <th class="border border-dark">Nationalité</th>
                                <th class="border border-dark">Nombre de livre(s) entré(s)</th>
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($authorlist as $index => $author) { ?>
                                <tr class="col-8 border border-dark">
                                    <td class="border border-dark text-align-center"><?php echo $author["author_name"] ?></td>
                                    <td class="border border-dark"><?php echo $author["nationality"] ?></td>
                                    <td class="border border-dark"><?php echo $author["nombre_livre"] ?></td>
                                    <td class="border border-dark">
                                        <a href="<?php echo "./gestion_admin.php?modify_in_progress=author&id=" . $index ?>" class="text-decoration-none">
                                            <i class="fa-solid fa-pencil text-black"></i>
                                        </a>
                                    </td>
                                    <td class="border border-dark ">
                                        <?php if (intval($author["nombre_livre"]) > 0) { ?>
                                            <i class="fa-solid fa-trash text-secondary opacity-50"></i>
                                        <?php } else { ?>
                                            <a href="<?php echo "../src/controllers/author_controller.php?id=" . $author['id'] ?>">
                                                <i class="fa-solid fa-trash text-black"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div>
                    <p>Il n'existe aucun auteur ou une erreur nous empêche de vous les afficher pour le moment</p>
                </div>
            <?php } ?>
            <div class="mt-3">
                <?php if (isset($modify_in_progress) and $modify_in_progress === "author") { ?>
                    <p>Modifier un auteur</p>
                    <div class="d-flex mt-3">
                        <form action="../src/controllers/author_controller.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for="complete_name" class="form-label">Nom intégral de l'auteur </label>
                                    <input type="text" id="complete_name" name="complete_name" value="<?php echo $authorlist[$id_of_modifiyng_element]["author_name"] ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="nationality" class="form-label">Nationalité </label>
                                    <input type="text" id="nationality" name="nationality" value="<?php echo $authorlist[$id_of_modifiyng_element]["nationality"] ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-4 d-flex offset-1">
                                <button class="btn btn-outline-success col-8 mb-5" name="modification" value="<?php echo $authorlist[$id_of_modifiyng_element]["id"] ?>">Modifier</button>
                            </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <p>Ajouter un auteur</p>
                    <div class="d-flex mt-3">
                        <form action="../src/controllers/author_controller.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for="complete_name" class="form-label">Nom intégral de l'auteur </label>
                                    <input type="text" id="complete_name" name="complete_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="nationality" class="form-label">Nationalité </label>
                                    <input type="text" id="nationality" name="nationality" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-4 d-flex offset-1">
                                <button class="btn btn-outline-success col-8 mb-5">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="../utils/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/44e9c18f39.js" crossorigin="anonymous"></script>
</body>

</html>