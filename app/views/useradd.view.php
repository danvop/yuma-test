<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';

?>

<div class="container">

      <form id="useradd" class="form-signin" action="store" method="post">
        <hr>
        <h2 class="form-signin-heading">Add user</h2>
        <hr>
        <label for="inputEmail" class="sr-only">Name</label>
        <input name="name" type="name" id="inputName" class="form-control" placeholder="Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <select name="role" class="custom-select" required>
          <option value="" selected>Select role</option>
          <option value="user">user</option>
          <option value="admin">admin</option>
        </select>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      </form>
      <?php
        errShow();
      ?>
    </div> <!-- /container -->

    <?php require 'partials/footer.php'; ?>