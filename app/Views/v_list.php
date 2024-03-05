<div class="container mt-4 mb-0 p-0">
    <div class="jumbotron-fluid rounded">
        <div class="d-flex align-items-center"> 
            <img src="<?= base_url('assets/images/logo.png') ?>" width="50" alt="">
            <h1 class="display-4">eCom</h1>
        </div>
        <p class="lead">Ogni dettaglio conta</p>
        <hr class="my-4">
        <p>Esplora la perfezione nei nostri prodotti artigianali. Entra nel mondo dell'eleganza con i nostri prodotti
            esclusivi!</p>
    </div>
</div>
<?php if (!empty($prodotti) && is_array($prodotti)): ?>

    <div class="album py-5">
        <div class="container">
            <div class="row gy-3">

                <?php foreach ($prodotti as $prodotti_item): ?>
                    <div class="col-lg-3">
                        <div class="card mb-4 h-100 box-shadow">
                            <div style="height:30vh; overflow: hidden;">
                                <img class="card-img-top h-100 img-fluid object-cover" src="<?= file_exists('uploads/' . $prodotti_item->immagine) ? base_url('uploads/' . $prodotti_item->immagine) : base_url('uploads/noimage.jpg') ?>" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= esc($prodotti_item->nome) ?>
                                </h5>
                                <div class="text-center">
                                    <div style='display: flex; align-items: center;'>
                                        <?php
                                        if ($prodotti_item->sconto == 0 or is_null($prodotti_item)) {
                                            echo "<h3>€" . $prodotti_item->prezzo . "</h3>";
                                        } else {
                                            echo "<h3  style='margin-right: 10px' class='text-primary'>€" . ($prodotti_item->prezzo - $prodotti_item->prezzo * $prodotti_item->sconto / 100) . "</h3><h6><del class='text-danger'>€" . $prodotti_item->prezzo . "</del> -" . $prodotti_item->sconto . "%</h6>";
                                        }
                                        ?>
                                    </div>
                                    <a href="/cart/add?id=<?= esc($prodotti_item->id_oggetto)?>"
                                        class="btn btn-primary"><i class="bi bi-cart"></i> Acquista</a>
                                    <a href="/product?id=<?= esc($prodotti_item->id) ?>" class="btn btn-secondary"><i
                                            class="bi bi-book"></i> Vedi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

<?php else: ?>
    <div class="container">
    <h3>No prodotti</h3>

    <p>Unable to find any prodotti for you.</p>
    </div>
<?php endif ?>