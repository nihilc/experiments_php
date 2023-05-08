<?php $users = $this->data["users"]; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Rol</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $o) { ?>
    <tr>
        <td><?= $o->getId() ?></td>
        <td><?= $o->getUsername() ?></td>
        <td><?= $o->getPassword() ?></td>
        <td><?= $o->getRol() ?></td>
        <td><a href="?mod=<?= $o->getId() ?>">Editar</a></td>
        <td><a href="?del=<?= $o->getId() ?>">Eliminar</a></td>
    </tr>
    <?php } ?>
</table>

<form action="user/add" method="post">
    <div>
        <label for="">Username</label>
        <input type="text" name="username" id="">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" id="">
    </div>
    <div>
        <label for="">Rol</label>
        <select name="rol" id="">
            <option value="1">Admin</option>
            <option value="2">Dev</option>
            <option value="3">Test</option>
        </select>
    </div>
    <button type="submit">Nuevo</button>
</form>

<p><?= isset($_SESSION["mensaje"]) ? $_SESSION["mensaje"] : null ?></p>