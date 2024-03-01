<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Prodotto</title>
    <!-- Includi gli stili Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

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
                <input type="file" class="form-control" id="immagine" name="immagine" accept="image/*" required>
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

    <!-- Includi gli script Bootstrap e jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>

</html>