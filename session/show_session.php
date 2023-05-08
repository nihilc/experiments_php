<h1>Mostrar session $_SESSION['test']</h1>
<pre>
    <?php
    session_start();
    echo $_SESSION["test"];
    print_r($_SESSION);
    ?>
</pre>
<br><a href="./set_session.php">ir a crear session</a>
<br><a href="./show_session.php">ir a mostrar session</a>
<br><a href="./unset_session.php">Ir a destruir session</a>