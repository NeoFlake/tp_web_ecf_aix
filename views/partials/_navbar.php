<?php

$book_search = $_SESSION["book_search"] ?? null;

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                <?php } ?>
            </ul>
            <form class="d-flex" role="search" action="../../src/controllers/book_controller.php" method="post">
                <input class="form-control me-2" type="search" placeholder="cherchez votre livre..." aria-label="Search" name="book_search" value="<?php echo isset($book_search) ?? null ?>">
                <button class="btn btn-outline-success" type="submit" name="book_search_validation" value="validated" >Rechercher</button>
            </form>
        </div>
    </div>
</nav>