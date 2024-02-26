<h2><?= esc($title) ?></h2>

<?php
    $session = session();
    if ( empty( $session->active ) || $session->active == false ):
?>

    <form action="login/check" method="POST">
        <div class="mb-3">
            <label for="nickname" class="form-label">Nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3">
            <label for="cognome" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome">
        </div>
        <div class="mb-3">
            <label for="indirizzo" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="indirizzo" name="indirizzo">
        </div>
        <div class="mb-3">
            <label for="completamento_indirizzo" class="form-label">Completamento Indirizzo</label>
            <input type="text" class="form-control" id="completamento_indirizzo" name="completamento_indirizzo">
        </div>
        <div class="mb-3">
            <label for="stato" class="form-label">Stato</label>
            <input type="text" class="form-control" id="stato" name="stato">
        </div>
        <div class="mb-3">
            <label for="regione" class="form-label">Regione</label>
            <input type="text" class="form-control" id="regione" name="regione">
        </div>
        <div class="mb-3">
            <label for="citta" class="form-label">Città</label>
            <input type="text" class="form-control" id="citta" name="citta">
        </div>
        <div class="mb-3">
            <label for="codice_postale" class="form-label">Codice Postale</label>
            <input type="text" class="form-control" id="codice_postale" name="codice_postale">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<?php else: ?>

    You're already logged in!

<?php 
    return redirect()->to("/"); 
    endif 
?>