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

<div class="containerApp">
  <header>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="title">Track Calories</div>
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
        <div class = "col">IMC</div>
        <div class = "col"><?php echo $user["weight"];?>kg</div>
      </div>
    </div>
      <div class="custom-shape-divider-bottom-1671192821">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
    </svg>
    
    </div>
    </section>

    <section class="date">
      <div class="text-center py-3"><?php $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                echo $formatter->format(time());//echo dat-e('l d M Y');?></div>
    </section>

    <section class="list">
      <div class="container">
        <div class="row">
          <div class="col">
            
            <div class="food">
              <div class="titleFood"><h3>Big Burger</h3></div>
              <div class="kgFood"><p>504kcal</p></div>
            </div>
            <div class="food">
              <div class="titleFood"><h3>Big Burger</h3></div>
              <div class="kgFood"><p>504kcal</p></div>
            </div>
            <div class="food">
              <div class="titleFood"><h3>Big Burger</h3></div>
              <div class="kgFood"><p>504kcal</p></div>
            </div>
            
          
          </div>
        </div>


      </div>
    </section>
  </main>  

  <footer class="py-3"> 
    <div class="text-center">
      <button class="btn btn-primary">+</button>
    </div>
  </footer>
</div>

<?php include_once('includes/footer.php');?>
