<h2><?= esc($title) ?></h2>

<?php
    $session = session();
    if (empty($_SESSION["active"])):
?>

    <form action="login/check" method="POST">
        <div class="mb-3">
            <label for="nickname" class="form-label">nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname" aria-describedby="emailHelp">
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