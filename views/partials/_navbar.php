<?php

$book_search = $_SESSION["book_search"] ?? null;
$admin_logged = $_SESSION["admin_logged"] ?? null;

unset($_SESSION["book_search"]);

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../views/index.php">Accueil</a>
                </li>
                <?php if (isset($_SESSION["admin_logged"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/gestion_admin.php">Gestion Administrative</a>
                    </li>
                    <li class="nav-item">
                        <form action="../src/controllers/connection_controller.php" method="post">
                            <button type="submit" class="btn btn-outline-primary btn-sm mt-1" name="deconnection" value="true">Déconnexion</button>
                        </form>
                    </li>
                    <span class="navbar-text ms-3">
                        <?php echo $admin_logged["last_name"] . " " . $admin_logged["first_name"] ?>
                    </span>
                <?php } else { ?>
                    <li>
                        <a class="nav-link" href="../views/connection.php">Connexion</a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (isset($_SESSION["main_page_displayed"])) { ?>
                <form class="d-flex" role="search" action="../src/controllers/book_controller.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="cherchez votre livre..." aria-label="Search" name="book_search" value="<?php echo isset($book_search) ? $book_search : null ?>">
                    <button class="btn btn-outline-success" type="submit" name="book_search_validation" value="validated">Rechercher</button>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>