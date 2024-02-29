<h2>
    <?= esc($title) ?>
</h2>

<?php if (!empty($oggetti) && is_array($oggetti)): ?>


        <img src="<?= base_url('uploads/noimage.jpg') ?>" alt="Card image cap">
            <h5 class="card-title">
                <?= esc($oggetti[0]->nome) ?>
            </h5>
            <p class="card-text">
                <?= esc($oggetti[0]->descrizione) ?>
            </p>

    <table>
        <thead>
            <tr>
                <th>Prezzo</th>
                <th>Sconto</th>
                <th></th>
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
                        }
                        else {
                            echo "Non in sconto";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="/cart/add?id=<?= esc($oggetto->id) ?>" class="btn btn-primary">
                            <i class="bi bi-cart"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php else: ?>

        <p>Unable to find this product for you.</p>

    <?php endif ?>