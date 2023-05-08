<form action="auth" method="post">
    <div>
        <label for="">Username</label>
        <input type="text" name="username" placeholder="username" />
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="password" />
    </div>
    <input type="submit" />
</form>

<p><?= isset($_SESSION["mensaje"]) ? $_SESSION["mensaje"] : null ?></p>
