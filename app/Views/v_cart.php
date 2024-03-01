<?php
if (!empty($oggetti) && is_array($oggetti)):
    ?>

<div class="container mt-5">
    <h1>Carrello</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="col-5">Nome</th>
                <th class="col-2">Prezzo</th>
                <th class="col-2">Sconto</th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $totaleTot = 0;
            $totaleScon = 0;
            foreach ($oggetti as $oggetto):
                ?>
                <tr>
                    <td>
                        <?= esc($oggetto->nome) ?>
                    </td>
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
                        //echo "<" . $totaleTot . " " . $totaleScon . ">"
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
                    <td  class="text-center">
                        <a href="/cart/remove?id=<?= esc($oggetto->id_oggetto) //TODO: Rimuovi  ?> " class="btn btn-danger"><i
                                class="bi bi-x-square"></i> Rimuovi</a>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td></td>
                <td>
                    €<?= esc($totaleScon) ?>
                </td>
                <td>
                    <?= esc("Risparmierai €" . ($totaleTot - $totaleScon) . "!") ?>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
    <a href="/cart/confirm?>" class="btn btn-success">
        <i class="bi bi-cart"></i> Conferma l'ordine!
    </a>
    </div>
</div>

<?php else: ?>
    <div class="mx-5 my-5">
        <h3>Il tuo carrello è ancora vuoto!</h3>

        <p>Aggiungi qualcosa al carrello prima di tornare . . .  <i class="bi bi-emoji-laughing"></i></p>
    </div>
<?php endif ?>