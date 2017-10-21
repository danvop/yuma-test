<!DOCTYPE html>
<html>
<head>
    <title>index</title>
</head>
<body>
<div>
    <h2>INDEX</h2>
    <h3>hello <?= $_SESSION['user']['name'] ?? 'guest' ?></h3>

    <?php var_dump($users); ?>


</div>
</body>
</html>