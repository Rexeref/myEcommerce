<h2>
    <?= esc($title) ?>
</h2>

<?php if (!empty($prodotto) && is_array($prodotto)): ?>

        <?php print_r($prodotto);?>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= esc($prodotto[0]->nome) ?></h5>
                <p class="card-text"><?= esc($prodotto[0]->descrizione) ?></p>
            </div>
        </div>

<?php else: ?>

    <p>Unable to find this product for you.</p>

<?php endif ?>