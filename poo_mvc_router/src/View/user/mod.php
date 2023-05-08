<?php
$u = $this->d;
?>
<form action="user/<?= $u->id ?>/upd" method="post">
  <input type="hidden" name="id" value="<?= $u->id ?>">
  <label for="fname">First name</label>
  <input type="text" name="fname" value="<?= $u->fname ?>">
  <label for="lname">Last name</label>
  <input type="text" name="lname" value="<?= $u->lname ?>">
  <label for="user">User</label>
  <input type="text" name="user" value="<?= $u->user ?>">
  <label for="pass">Pass</label>
  <input type="text" name="pass" value="<?= $u->pass ?>">
  <input type="submit">
</form>