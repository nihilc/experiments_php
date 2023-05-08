<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>User</th>
      <th>Pass</th>
    </tr>
    <?php
    $users = $this->d['users'];
    foreach ($users as $u) {
      ?>
      <tr>
        <td><?= $u->id ?></td>
        <td><?= $u->fname ?></td>
        <td><?= $u->lname ?></td>
        <td><?= $u->user ?></td>
        <td><?= $u->pass ?></td>
        <td><a href="user/<?= $u->id ?>"><button>Detalle</button></a></td>
        <td><a href="?mod=<?= $u->id ?>"><button>Modificar</button></a></td>
        <td><a href="user/<?= $u->id ?>/del"><button>Eliminar</button></a></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <a href="?new"><button>Nuevo</button></a>
</body>

</html>