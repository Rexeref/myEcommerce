<h2><?= esc($title) ?></h2>

<?php
    $session = session();
    if ( empty( $session->active ) || $session->active == false ):
        
        echo '<div class="warning">';
        switch ($error) {
            case 1:
                    echo '<h1>Nickname Vuoto</h1>';
                break;
            case 2:
                    echo '<h1>Password Vuota</h1>';
                break;
            case 3:
                    echo '<h1>Account non trovato</h1>';
                break;
            default:
                break;
        }
        echo '</div>';
?>
    <form action="login/check" method="POST">
        <div class="mb-3">
            <label for="nickname" class="form-label">Nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php else: ?>

    You're already logged in!

<?php endif ?>