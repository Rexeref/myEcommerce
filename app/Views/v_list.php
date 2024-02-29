<?php if (!empty($prodotti) && is_array($prodotti)): ?>

    <div class="album py-5">
        <div class="container">
            <div class="row">

                <?php foreach ($prodotti as $prodotti_item): ?>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="<?= base_url('uploads/noimage.jpg') ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= esc($prodotti_item->nome) ?>
                                </h5>
                                <p class="card-text">
                                    <?= esc($prodotti_item->descrizione) ?>
                                </p>
                                <div class="text-center">
                                    <div style='display: flex; align-items: center;'>
                                    <?php 
                                        if($prodotti_item->sconto == 0 or is_null($prodotti_item))
                                        {
                                            echo "<h3>€" . $prodotti_item->prezzo . "</h3>";
                                        }
                                        else
                                        {
                                            echo "<h3  style='margin-right: 10px' class='text-primary'>€"  . ( $prodotti_item->prezzo - $prodotti_item->prezzo * $prodotti_item->sconto / 100 ) .  "</h3><h6><del class='text-danger'>€" . $prodotti_item->prezzo . "</del> -" . $prodotti_item->sconto . "%</h6>";
                                        }
                                    ?>
                                    </div>
                                    <a href="/product?id=<?= esc($prodotti_item->id) ?>" class="btn btn-primary"><i class="bi bi-cart"></i> Acquista</a> //TODO: Aggiungi all'ordine
                                    <a href="/product?id=<?= esc($prodotti_item->id) ?>" class="btn btn-secondary"><i class="bi bi-book"></i> Vedi</a>
                                </div>
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