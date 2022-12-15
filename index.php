<?php

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

<div class="container">
  <header>
    <div class="title">Alimentation App</div>
    <div class="profile"><? echo $user["name"];?></div>
  </header>

  <section class="dataUser">
    <div>Graph</div>
    <div>IMC</div>
    <div><?php echo $user["weight"];?>kg</div>
  </section>

  <section class="date">
    <div><?php echo date('l d M Y');?></div>
  </section>

  <section class="list">
    <div class="food">
      <div class="titleFood">Big Burger</div>
      <div class="kgFood">504kcal</div>
    </div>
  </section>

  <footer>
   <button>+</button>
  </footer>
</div>

<?php include_once('includes/footer.php');?>
