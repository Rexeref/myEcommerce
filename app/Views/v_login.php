<h2><?= esc($title) ?></h2>

<?php
    $session = session();
    if ( empty( $session->active ) || $session->active == false ):
        
        echo '<div class="warning">';
        switch ($error) {
            case 1:
                    echo '<h3>Username Vuoto</h3>';
                break;
            case 2:
                    echo '<h3>Password Vuota</h3>';
                break;
            case 3:
                    echo '<h3>Account non trovato</h3>';
                break;
            case 4:
                    echo "<h3>L'account è stato registrato correttamente, ora fai il login</h3>";
                break;
            default:
                break;
        }
        echo '</div>';
?>
    <form action="login/check" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
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