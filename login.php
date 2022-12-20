<?php


$page = [
    'title' => " App alimentation - Login"
    
  ];
include_once("includes/header.php");


?>





<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Login Page!</h1>

            </div>
        </div>
    </div>

</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="$_POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label mt-3">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>

                <a href="register.php">
                    <button type="button" class="btn btn-dark mt-2">
                        register
                    </button>
                </a>

            </div>
        </div>
    </div>

</main>
<footer>
    <?php include_once('includes/footer.php');?>
</footer>