<div class="container mt-5">
    <h2 class="mb-4">Inserisci Nuovo Prodotto</h2>

    <!-- Form Bootstrap -->
    <form action="/seller/addProduct/confirm" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione:</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo:</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <select class="form-select" id="categoria" name="id_categoria" required>
                <?php foreach ($categorie as $categoria): ?>
                    <option value=<?= '"' . esc($categoria->id) . '">' . esc($categoria->nome) ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="immagine" class="form-label">Seleziona un'immagine:</label>
            <input type="file" class="form-control" id="immagine" name="immagine" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="id_prodotto" class="form-label">È un accessorio per:</label>
            <select class="form-select" id="id_prodotto" name="id_prodotto" required>
                <option value='0'>Non è un accessorio per nessun prodotto</option>
                <?php foreach ($prodotti as $prodotto): ?>
                    <option value=<?= '"' . esc($prodotto->id) . '">' . esc($prodotto->nome) ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Inserisci Prodotto</button>
    </form>
</div>