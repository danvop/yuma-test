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
    
<form class="form-inline">
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Filter by">
  </div>
  <div class="form-group mx-sm-3">
    <select class="form-control">
        <option>id</option>
        <option>name</option>
        <option>email</option>
        <option>role</option>
    </select>
  </div>
  <div class="form-group mx-sm-1">
    <button type="submit" class="btn btn-primary">Filter</button>
  </div>
    <a href="filterReset" class="btn btn-secondary">Reset</a>
  </div>


</form>
<hr>

<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
          <a href="" class="btn btn btn-dark">Id</a>
          <div class="btn-group dropup">
            <a href="" class="btn btn-dark dropdown-toggle">Id</a>
          </div>
          <a href="" class="btn btn-dark dropdown-toggle">Id</a>


      </th>
      <th scope="col">
      <a href="" class="btn btn btn-dark">Name</a>
        <div class="btn-group dropup">
            <a href="?sortZA=name" class="btn btn-dark dropdown-toggle">Name</a>
        </div>
        <a href="?sortAZ=name" class="btn btn-dark dropdown-toggle">Name</a>
      </th>
      <th scope="col">
          <a href="" class="btn btn btn-dark">Email</a>
          <div class="btn-group dropup">
            <a href="" class="btn btn-dark dropdown-toggle">Email</a>
          </div>
          <a href="" class="btn btn-dark dropdown-toggle">Email</a>
      </th>
      <th scope="col">
      <a href="" class="btn btn btn-dark">Role</a>
          <div class="btn-group dropup">
            <a href="" class="btn btn-dark dropdown-toggle">Role</a>
          </div>
        <a href="" class="btn btn-dark dropdown-toggle">Role</a>
      </th>
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

