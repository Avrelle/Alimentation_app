<?php
session_start();
include('./includes/connexionDB.php');


if(isset($_POST['send'])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        
        $recupUser = $bdd->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
        $recupUser -> execute(array($email, $password));
        if($recupUser->rowCount()>0){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['user_id'] = $recupUser->fetch()['user_id'];
        }
        header('Location:index.php?id='.$_SESSION['user_id']);
    } else{
        echo"veuiller remplir les champs";
    }
}

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
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label mt-3">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button name="send" type="submit" class="btn btn-dark">Submit</button>
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