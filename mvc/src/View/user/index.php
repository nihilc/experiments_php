<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name">
        <input type="number" name="age">
        <input type="submit" name="submit" value="Enviar">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $user = $this->d['user'];
        echo 'Hola ' . $user['name'] . ' Tienes ' . $user['age'] . ' años';
    }
    ?>
</body>

</html>