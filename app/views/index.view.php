<?php
use app\Auth;

require 'partials/header.php';
require 'partials/nav.php';

?>


<main role="main" class="container">

  <div class="starter-template">
    <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>

    <h2> Hello <?= Auth::userRole() ?? '' ?>!</h2> 
  </div>

</main><!-- /.container -->

<?php require 'partials/footer.php'; ?>

