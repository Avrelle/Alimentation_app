<?php
session_start();


include("./includes/connexionDB.php");



if(isset($_POST["send"])){
    if(!empty($_POST["firstName"]) && !empty($_POST["age"]) && !empty($_POST["email"]) 
    && !empty($_POST["sex"]) && !empty($_POST["size"]) && !empty($_POST["weight"]) 
    && !empty($_POST["password"])){
        $firstName = htmlspecialchars($_POST["firstName"]);
        $age = htmlspecialchars($_POST["age"]);
        $email = htmlspecialchars($_POST["email"]);
        $sex = htmlspecialchars($_POST["sex"]);
        $size = htmlspecialchars($_POST["size"]);
        $weight = htmlspecialchars($_POST["weight"]);
        $password = sha1($_POST["password"]);
       
        $sql= 'INSERT INTO user (firstName, age, email, sex, size, weight, password) 
        VALUES (:firstName, :age, :email, :sex, :size, :weight, :password)';
        $query = $bdd->prepare($sql);
        $query -> bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $query -> bindValue(':age', $age, PDO::PARAM_INT);
        $query -> bindValue(':email', $email, PDO::PARAM_STR);
        $query -> bindValue(':sex', $sex, PDO::PARAM_STR);
        $query -> bindValue(':size', $size, PDO::PARAM_INT);
        $query -> bindValue(':weight', $weight, PDO::PARAM_INT);
        $query -> bindValue(':password', $password, PDO::PARAM_STR);
        $query -> execute();

        $recupUser = $bdd -> prepare('SELECT * FROM user WHERE firstName = ? 
        AND age = ? AND email = ? AND sex = ? AND size = ? AND weight = ? 
        AND password = ?');
        $recupUser -> execute(array($firstName, $age, $email, $sex, $size, $weight, $password));
        if($recupUser->rowCount() > 0){
            $_SESSION['firstName'] = $firstName;
            $_SESSION['age'] = $age;
            $_SESSION['email'] = $email;
            $_SESSION['sex'] = $sex;
            $_SESSION['size'] =$size;
            $_SESSION['weight'] = $weight;
            $_SESSION['password'] = $password;
            $_SESSION['user_id'] = $recupUser->fetch()['user_id'];
        }
        header('Location:login.php');
        }else{
        echo"veuiller compléter tous les champs...";
    }
}

$page = [
    'title' => " App alimentation - Register"
    
  ];
include_once("includes/header.php");


?>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Register Page!</h1>

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
                        <label for="firstName" class="form-label mt-3">Prénom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <select name="sex" class="form-select" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected>Sexe</option>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        <option value="3">Non binaire</option>
                    </select>
                    <div class="mb-3">
                        <label for="size" class="form-label mt-2">Taille</label>
                        <input type="range" class="form-range" id="size" name="size" min=0 max=255 step="1" oninput="sliderChangeSize
                        (this.value)">
                        <output id="output">170</output>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label mt-2">Poids</label>
                        <input type="range" class="form-range" id="weight" name="weight" min=0 max=255 step="1" oninput="sliderChangeWeight
                        (this.value)">
                        <output id="outputBis">70</output>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" name="send" class="btn btn-dark">Submit</button>
                </form>
                <a href="login.php">
                    <button type="button" class="btn btn-dark mt-2">
                        login
                    </button>
                </a>


            </div>
        </div>
    </div>

</main>
<footer>

</footer>





<?php include_once('includes/footer.php');?>