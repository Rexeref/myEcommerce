<h2><?= esc($title) ?></h2>

<?php if (! empty($oggetti) && is_array($oggetti)): ?>

    <?php foreach ($oggetti as $oggetti_item): ?>

        <h3><?= esc($oggetti_item['id_ordine']) ?></h3>

        <div class="main">
            <?= esc($oggetti_item['id_prodotto']) ?>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No oggetti</h3>

    <p>Unable to find any oggetti for you.</p>

<?php endif ?>