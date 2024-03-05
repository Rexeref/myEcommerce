<div class="container mt-5">
    <h2 class="mb-4">Inserisci Nuovo Prodotto</h2>

    <!-- Form Bootstrap -->
    <form action="/seller/modProduct/confirm" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required
                value="<?= esc($prodotto_singolo[0]->nome); ?>">
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione:</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required><?= esc($prodotto_singolo[0]->descrizione); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo:</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" required
                value="<?= esc($prodotto_singolo[0]->prezzo); ?>">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <select class="form-select" id="categoria" name="id_categoria" required>
                <?php foreach ($categorie as $categoria): ?>
                    <option value="<?= esc($categoria->id) ?>" <?php if ($categoria->id == $prodotto_singolo[0]->id_categoria)
                          echo 'selected'; ?>>
                        <?= esc($categoria->nome) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="mb-3">
            <label for="id_prodotto" class="form-label">È un accessorio per:</label>
            <select class="form-select" id="id_prodotto" name="id_prodotto" required>
                <option value='null' <?php if ($prodotto_singolo[0]->id_prodotto == null)
                    echo 'selected'; ?>>
                    Non è un accessorio per nessun prodotto
                </option>
                <?php foreach ($prodotti as $prodotto): ?>
                    <option value="<?= esc($prodotto->id) ?>" <?php if ($prodotto->id == $prodotto_singolo[0]->id_prodotto)
                          echo 'selected'; ?>>
                        <?= esc($prodotto->nome) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <button name="id" value="<?= esc($prodotto_singolo[0]->prezzo) ?>" type="submit" class="btn btn-primary">Modifica Prodotto</button>
    </form>
</div>