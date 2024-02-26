<!doctype html>
<html>
<head>
    <title>eCom | <?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        <h1><a href="/">eCom</a> | <?= esc($title) ?></h1>
<?php 
    $session = session();
    if ( empty( $session->active ) ):
?>

        <form action="/login">
            <input type="submit" value="Login"/>
        </form>
        <form action="/register">
            <input type="submit" value="Register"/>
        </form>

<?php else: ?>

        <form action="/logout">
            <input type="submit" value="Logout" />
        </form>
<?php endif ?>