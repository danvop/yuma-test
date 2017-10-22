<?php use app\Auth; ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Yuma</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="   #navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="useradd">Add User <span class="sr-only">(current)</span></a>
          </li>

          
        </ul>
        <ul class="navbar-nav ml-auto">
            
            
            <?php if (!Auth::check()) : ?> 
                <li class="nav-item active">
                    <a class="nav-link" href="login">Login <span class="sr-only"></span></a>
                </li>
            <?php endif;?>  
            
            <?php if (Auth::check()) : ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="login" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= Auth::userName() ?? 'Login' ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="logout">logout</a>
                
            <?php endif;?>
              
            </div>
          </li>
        </ul>
    </div>
</nav>