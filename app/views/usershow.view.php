<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';

?>

<div class="container">

      <form id="useradd" class="form-signin" action="store" method="post">
        <hr>
        <h2 class="form-signin-heading">User profile</h2>
        <hr>
        <label for="inputEmail" class="sr-only">Name</label>
        <input name="name" type="name" id="inputName" class="form-control" value="<?= $user->getName() ?>" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" value="<?= $user->getEmail() ?>" required autofocus>
        <select name="role" class="custom-select" required>
          <option value="user" <?= ($user->getRole() == 'user') ? 'selected' : '' ?> >user</option>
          <option value="admin" <?= ($user->getRole() == 'admin') ? 'selected' : '' ?> >admin</option>
        </select>
        <hr>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
        
        <button class="btn btn-lg btn-danger btn-block" type="submit" formaction="userdel" <?= ($user->getEmail() == Auth::userEmail()) ? 'disabled' : '' ?>>Delete</button>
      </form>
      <?php
        errShow();
      ?>
    </div> <!-- /container -->

    <?php require 'partials/footer.php'; ?>