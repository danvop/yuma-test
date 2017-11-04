<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';

$owner = ($user->getEmail() == Auth::userEmail());
$admin = ((Auth::userRole() == 'admin'));

?>

<div class="container">

      <form id="useradd" class="form-signin" action="useredit" method="post">
        <hr>
        <h2 class="form-signin-heading">User profile</h2>
        <hr>
        <input name="id" type="hidden" value=<?= $user->getId() ?> >
        <label for="inputEmail" class="sr-only">Name</label>
        <input name="name" type="name" id="inputName" class="form-control" value="<?= $user->getName() ?>" autofocus <?= (!$admin && !$owner) ? 'disabled' : ''?>>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" value="<?= $user->getEmail() ?>" autofocus <?= (!$admin && !$owner) ? 'disabled' : ''?>>
        
        <select name="role" class="custom-select" required <?= (!$admin) ? 'disabled' : '' ?> >
          <option value="user" <?= ($user->getRole() != 'admin') ? 'selected' : '' ?> >user</option>

          <option value="admin" <?= ($user->getRole() == 'admin') ? 'selected' : '' ?> >admin</option>
        </select>
        <?php if ($user->getRole() != 'admin') : ?>
            <input name="role" type="hidden" value="<?= $user->getRole() ?>">
        
        <?php endif;?>

        <hr>
        <?php if ($admin || $owner) :?>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
        
        <?php endif; ?>
        <?php if ($admin) : ?>
        <button class="btn btn-lg btn-danger btn-block" type="submit" formaction="delete" <?= ($owner) ? 'disabled' : '' ?>>Delete</button>
        <?php endif; ?>
        <a href="/" class="btn btn-lg btn-secondary btn-block">Back</a>
      </form>
        <?php
            errShow();
        ?>
    </div> <!-- /container -->
    
    <?php require 'partials/footer.php'; ?>