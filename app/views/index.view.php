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

<?php errShow(); ?>
    
<form class="form-inline" action='/f' method="GET">
  <div class="form-group">
    <input name="filtQuery" class="form-control" type="text" 
    placeholder="<?= (isset($_GET['filtQuery']) && $_GET['filtQuery'] != '' ) ? $_GET['filtQuery'] : 'Filter by' ?>">
  </div>
  <div class="form-group mx-sm-3">
    <select name="filtBy" class="form-control">
        <option>id</option>
        <option <?= (isset($_GET['filtBy']) && $_GET['filtBy'] == 'name') ? 'selected' : '' ?> >name</option>
        <option <?= (isset($_GET['filtBy']) && $_GET['filtBy'] == 'email') ? 'selected' : '' ?> >email</option>
        <option>role</option>
    </select>
  </div>
  <div class="form-group mx-sm-1">
    <button type="submit" class="btn btn-primary">Filter</button>
  </div>
    <a href="/filterReset" class="btn btn-secondary">Reset</a>
  </div>


</form>
<hr>
<?php
if (getSort()) {
    $chunks = preg_split('/(?=[A-Z])/', getSort());
    $sortType = $chunks[0];
    $sortDir = $chunks[1];
} else {
    $sortType = '';
}

$filt = getFilt() ?? '';

?>


<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
        <?= ($sortType != 'id') ? "<a href='?{$filt}sort=idAz' class='btn btn btn-dark'>Id</a>" : ''?>
        <?= (($sortType == 'id')&&($sortDir == 'Az')) ?
        "<div class='btn-group dropup'>
            <a href='?{$filt}sort=idZa' class='btn btn-dark dropdown-toggle'>Id</a>
        </div>" : ''
        ?>
        <?= (($sortType == 'id')&&($sortDir == 'Za')) ? "<a href='?{$filt}sort=idAz' class='btn btn-dark dropdown-toggle'>Id</a>" : ''?>
      </th>
      <th scope="col">
        <?= ($sortType != 'name') ? "<a href='?{$filt}sort=nameAz' class='btn btn btn-dark'>Name</a>" : ''?>
        <?= (($sortType == 'name')&&($sortDir == 'Az')) ?
        "<div class='btn-group dropup'>
            <a href='?{$filt}sort=nameZa' class='btn btn-dark dropdown-toggle'>Name</a>
        </div>" : ''
        ?>
        <?= (($sortType == 'name')&&($sortDir == 'Za')) ? "<a href='?{$filt}sort=nameAz' class='btn btn-dark dropdown-toggle'>Name</a>" : ''?>
      </th>
      <th scope="col">
        <?= ($sortType != 'email') ? "<a href='?{$filt}sort=emailAz' class='btn btn btn-dark'>Email</a>" : ''?>
        <?= (($sortType == 'email')&&($sortDir == 'Az')) ?
        "<div class='btn-group dropup'>
            <a href='?{$filt}sort=emailZa' class='btn btn-dark dropdown-toggle'>Email</a>
        </div>" : ''
        ?>
        <?= (($sortType == 'email')&&($sortDir == 'Za')) ? "<a href='?{$filt}sort=emailAz' class='btn btn-dark dropdown-toggle'>Email</a>" : ''?>
      </th>
      <th scope="col">
        <?= ($sortType != 'role') ? "<a href='?{$filt}sort=roleAz' class='btn btn btn-dark'>Role</a>" : ''?>
        <?= (($sortType == 'role')&&($sortDir == 'Az')) ?
        "<div class='btn-group dropup'>
            <a href='?{$filt}sort=roleZa' class='btn btn-dark dropdown-toggle'>Role</a>
        </div>" : ''
        ?>
        <?= (($sortType == 'role')&&($sortDir == 'Za')) ? "<a href='?{$filt}sort=roleAz' class='btn btn-dark dropdown-toggle'>Role</a>" : ''?>
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

