<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';
?>

<div class="container">

      <form class="form-signin" action="login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a href="/" class="btn btn-lg btn-secondary btn-block">Cancel</a>
      </form>
    <?php
        errShow();
    ?>
    </div> <!-- /container -->

    <?php require 'partials/footer.php'; ?>