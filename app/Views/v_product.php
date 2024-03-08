<?php if (!empty($oggetti) && is_array($oggetti)): ?>

    <div class="container mt-4">
        <div class="text-center">
            <img style="height : 50vh;" class="rounded" src="<?= file_exists('uploads/' . $oggetti[0]->immagine) ? base_url('uploads/' . $oggetti[0]->immagine) : base_url('uploads/noimage.jpg') ?>" alt="Card image cap">
        </div>
        <?php $session = session();
        if (!is_null($session->livello) && $session->livello > 4): ?> <!-- Seller -->
            <div class="text-center mt-3 mb-0 p-2 bg-dark rounded">
                <a href="/cart/add?id=<?= esc($oggetti[0]->id) ?>" class="btn text-success"><i class="bi bi-plus-square"></i> Aggiungi Oggetto</a> <!-- TODO: Modifica Prodotto -->
                <a href="seller/modProduct?id=<?= esc($oggetti[0]->id_prodotto) ?>" class="btn text-warning"><i class="bi bi-wrench"></i> Modifica Prodotto</a> <!-- TODO: Modifica Prodotto -->
                <a href="/cart/add?id=<?= esc($oggetti[0]->id) ?>" class="btn text-danger"><i class="bi bi-trash"></i> Rimuovi Prodotto</a> <!-- TODO: Rimuovi Prodotto -->
            </div>
        <?php endif ?>
        <h1 class="card-title">
            <?= esc($oggetti[0]->nome) ?>
        </h1>
        <p class="card-text">
            <?= esc($oggetti[0]->descrizione) ?>
        </p>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="col-5">Prezzo</th>
                    <th class="col-5">Sconto</th>
                    <th class="col-1"></th>
                    <?php if ($session->livello > 4): ?><th class="col-1 text-danger text-center bg-dark rounded">Comandi Oggetti</th><?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oggetti as $oggetto): ?>
                    <tr>
                        <td>
                            <?php
                            if ($oggetto->sconto == 0 or is_null($oggetto)) {
                                echo "€" . $oggetto->prezzo;
                            } else {
                                echo "€" . ($oggetto->prezzo - $oggetto->prezzo * $oggetto->sconto / 100);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($oggetto->sconto != 0 or !is_null($oggetto->sconto)) {
                                echo $oggetto->sconto . "%";
                            } else {
                                echo "Non in sconto";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                                <a href="/cart/add?id=<?= esc($oggetto->id) ?>" class="btn btn-primary">
                                    <i class="bi bi-cart"></i>
                                </a>
                        </td>
                                <!-- Menu Speciali -->
                            <?php if ($session->livello > 4): ?> <!-- Seller -->
                                <td class="text-center bg-dark rounded">
                                <a href="/cart/add?id=<?= esc($oggetto->id) ?>" class="btn text-danger"><i
                                        class="bi bi-trash"></i></a> <!-- TODO: Rimuovi oggetto -->
                                </td>
                            <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>

        <p>Unable to find this product for you.</p>

    <?php endif ?>