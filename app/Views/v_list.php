<h2><?= esc($title) ?></h2>

<?php if (! empty($prodotti) && is_array($prodotti)): ?>

    <?php foreach ($prodotti as $prodotti_item): ?>

        <h3><?= esc($prodotti_item->nome) ?></h3>

        <div class="main">
            <?= esc($prodotti_item->descrizione) ?>
            Codice: <?= esc($prodotti_item->id) ?>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No prodotti</h3>

    <p>Unable to find any prodotti for you.</p>

<?php endif ?>