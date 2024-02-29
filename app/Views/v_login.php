<h2>
    <?= esc($title) ?>
</h2>

<div class="container-md">

<?php
$session = session();
if (empty($session->active) || $session->active == false):

    if($error != 0)
    {
        echo '<div class="bg-warning rounded-3 p-3 bs-text-primary-danger border border-danger-subtle container"><i class="bi-alarm"></i><h5>';
        switch ($error) {
            case 1:
                echo 'Username Vuoto';
                break;
            case 2:
                echo 'Password Vuota';
                break;
            case 3:
                echo 'Credenziali non corrette';
                break;
            case 4:
                echo "L'account è stato registrato correttamente, ora fai il login";
                break;
            default:
                break;
        }
        echo '</h5></div>';
    };
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
</div>

<?php else: ?>
    <h1>sei già loggato!</h1>
<?php endif ?>