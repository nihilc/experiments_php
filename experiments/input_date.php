<p>Aquí estoy verificando el formato de la fecha que entrega un input:date</p>
<form action="" method="post">
    <input type="date" name="date" id="date" value="<?php if (isset($_POST['date'])) echo $_POST['date'] ?>">
    <button type="submit">Enviar</button>
</form>
<pre>
    <?php print_r($_POST); ?>
</pre>