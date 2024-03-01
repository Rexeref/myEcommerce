<?php
if (!empty($ordini) && is_array($ordini)):
    $organizedResults = [];
    $ordini = array_reverse($ordini);
    foreach ($ordini as $row) {
        $idOrdine = $row->id_ordine;

        if (!isset($organizedResults[$idOrdine])) {
            $organizedResults[$idOrdine] = [];
        }

        $organizedResults[$idOrdine][] = $row;
    }
    ?>
    <div class="container"><h1>Ordini</h1></div>
    <?php foreach ($organizedResults as $idOrdine => $oggetti): ?>
        <div class="container my-2">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                ID Ordine:
                                <?= esc($idOrdine) ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-5">Nome</th>
                                        <th class="col-2">Prezzo</th>
                                        <th class="col-2">Sconto</th>
                                    </tr>
                                </thead>
                                <?php
                                $totaleTot = 0;
                                $totaleScon = 0;
                                foreach ($oggetti as $oggetto):
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?= esc($oggetto->nome) ?></td>
                                            <td>
                                                <?php
                                                if ($oggetto->sconto == 0 or is_null($oggetto)) {
                                                    echo "€" . $oggetto->prezzo;
                                                    $totaleScon += $oggetto->prezzo;
                                                } else {
                                                    echo "€" . ($oggetto->prezzo - $oggetto->prezzo * $oggetto->sconto / 100);
                                                    $totaleScon += $oggetto->prezzo - $oggetto->prezzo * $oggetto->sconto / 100;
                                                }
                                                $totaleTot += $oggetto->prezzo;
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
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td><!--Spazio Vuoto--></td>
                                            <td>
                                                €
                                                <?= esc($totaleScon) ?>
                                            </td>
                                            <td>
                                                <?= esc("Hai risparmiato €" . ($totaleTot - $totaleScon) . "!") ?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    <?php else: ?>
        <div class="mx-5 my-5">
            <h3>Non hai fatto nessun ordine! </h3>

            <p>Siamo sempre pronti per la tua spedizione! <i class="bi bi-truck"></i></p>
        </div>
    <?php endif ?>