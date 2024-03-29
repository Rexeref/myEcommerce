<!doctype html>
<html>

<?php if ($title === "Login" or $title === "Register"): ?>

    <head>
        <title>eCom |
            <?= esc($title) ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    </head>
<?php else: ?>

    <head>
        <title>eCom |
            <?= esc($title) ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
<?php endif ?>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house"> eCom</i></a>
                    </li>
                    <?php
                    $session = session();
                    if (empty($session->active)):
                        ?>

                        <li class="nav-item active">
                            <a class="nav-link" href="/login"><i class="bi bi-door-open"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="bi bi-key"></i> Register</a>
                        </li>
                    <?php else: ?>

                        <li class="nav-item active">
                            <a class="nav-link" href="/cart"><i class="bi bi-cart"></i> Cart</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Ciao,
                                <?= esc($session->userName) ?>!
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-left"></i></a>
                        </li>

                    <?php endif ?>
                </ul>

                <!-- Menu Speciali -->
                <?php if (!is_null($session->livello) && $session->livello > 4): ?> <!-- Seller -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 rounded bg-dark">
                        <li class="nav-item bg-danger">
                            <a class="nav-link text-white rounded" aria-current="page">Danger Zone</i></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-warning" href="seller/addProduct"><i class="bi bi-database"></i> Aggiungi Prodotto</a>
                        </li>
                        <?php if ($session->livello > 24): ?> <!-- Admin -->
                            <li class="nav-item active">
                                <a class="nav-link text-danger" href="admin/roles"><i class="bi bi-person-lock"></i> Ruoli</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link text-danger" href="admin/users"><i class="bi bi-people"></i> Utenti</a>
                            </li>
                        <?php endif ?>
                    </ul>
                <?php endif ?>


                <form class="d-flex" role="search" action="search">
                    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button> <!-- TODO: Ricerca -->
                </form>
            </div>
        </div>
    </nav>