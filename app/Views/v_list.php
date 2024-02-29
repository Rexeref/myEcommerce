<?php if (!empty($prodotti) && is_array($prodotti)): ?>

    <div class="album py-5">
        <div class="container">
            <div class="row">

                <?php foreach ($prodotti as $prodotti_item): ?>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= esc($prodotti_item->nome) ?>
                                </h5>
                                <p class="card-text">
                                    <?= esc($prodotti_item->descrizione) ?>
                                </p>
                                <a href="/product?id=<?= esc($prodotti_item->id) ?>" class="btn btn-primary">Vedi Articolo</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    
<?php else: ?>

    <h3>No prodotti</h3>

    <p>Unable to find any prodotti for you.</p>

<?php endif ?>