<?php
session_start();

include('./includes/connexionDB.php');

if(isset($_POST["send"])){
    if(!empty($_POST["foodName"]) && !empty($_POST["calorie"])){
        $firstName = htmlspecialchars($_POST["foodName"]);
        $age = htmlspecialchars($_POST["calorie"]);
       
        $sql= 'INSERT INTO food (foodName, calorie) 
        VALUES (:foodName, :calorie)';
        $query = $bdd->prepare($sql);
        $query -> bindValue(':foodName', $foodName, PDO::PARAM_STR);
        $query -> bindValue(':calorie', $calorie, PDO::PARAM_INT);
        $query -> execute();

        /*$recupFood = $bdd -> prepare('SELECT * FROM food WHERE foodName = ? 
        AND calorie = ?');
        $recupFood -> execute(array($foodName, $calorie));
        if($recupFood->rowCount() > 0){
            $_SESSION['foodName'] = $foodName;
            $_SESSION['calorie'] = $calorie;
            $_SESSION['user_id'] = $recupFood->fetch()['user_id'];
        }*/
        header('Location:index.php');
        }else{
        echo"veuiller compléter tous les champs...";
    }
}
/*$id = $_GET['id'];
$recupUser = $bdd -> prepare('SELECT * FROM food WHERE user_id = ?');
$recupUser -> execute($id);
$foods = $recupUser -> fetchAll();
var_dump($foods);*/


// connexion à la bdd

// un user s'est connecté

// on stocke les infos du user dans un variables

$user = [
  "name"=>"Anton",
  "age"=>22,
  "sexe"=>"homme",
  "weight"=>75,
  "size"=>180,
  "IMC"=>18.5,
  "email"=>"anton@yahoo.fr",
  "isLogged"=>true,

];
if(!$user["isLogged"]){
  header('Location: login.php');
  exit;
}


$page = [
  'title' => "App alimentation - Acceuil"

];
include_once("includes/header.php");


?>

<div class="containerApp">
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title">Track Calories</div>
                </div>
                <div class="col">
                    <div class="title"><a href="login.php">login</a></div>
                </div>
                <div class="col-auto">
                    <div class="profile"><i class="bi bi-person"></i>
                        <span><?php echo $user["name"];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="dataUser">
            <div class="doughnuts">
                <canvas id="myChart"></canvas>
                <div class="kcal">1200 kcal</div>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col">IMC</div>
                    <div class="col"><?php echo $user["weight"];?>kg</div>
                </div>
            </div>
            <!-- graphique -->
            <div class="custom-shape-divider-bottom-1671192821">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"
                        class="shape-fill"></path>
                </svg>

            </div>
        </section>

        <section class="date">
            <div class="text-center py-3"><?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                echo $formatter->format(time());?></div>
        </section>

        <section class="list">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <?php

                        ?>

                        <div class="food">
                            <div class="titleFood">
                                <h3>Big Burger</h3>
                            </div>
                            <div class="kgFood">
                                <p>504kcal</p>
                            </div>
                        </div>



                    </div>
                </div>


            </div>
        </section>
    </main>

    <footer class="py-3">
        <div class="text-center">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">+</button>
        </div>
        <!-- modal --->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nouveau repas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="">
                                        <div class="mb-3">
                                            <label for="foodName" class="form-label mt-3">Repas</label>
                                            <input type="text" class="form-control" id="foodName" name="foodName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="calorie" class="form-label">Calories</label>
                                            <input type="text" class="form-control" id="calorie" name="calorie">
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="send" class="btn btn-dark">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php include_once('includes/footer.php');?>