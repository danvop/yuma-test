<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';

?>

<main role="main" class="container">
    <div class="starter-template">
        <?php if (!Auth::check()) : ?>
            <h2> Please, log in ! </h2>
        <?php endif; ?>
         
    </div>
<?php if (Auth::check()) : ?>
    


<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
    <tr class="clickable-tr" href="usershow?email=<?= $user->email ?>">
      <td><?= $user->id; ?></td>
      <td><?= $user->name; ?></td>
      <td><?= $user->email; ?></td>
      <td><?= $user->role; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php endif; ?>

</main><!-- /.container -->

<?php require 'partials/footer.php'; ?>

