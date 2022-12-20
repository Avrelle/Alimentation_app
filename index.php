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
                echo $formatter->format(time());//echo dat-e('l d M Y');?></div>
        </section>

        <section class="list">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="food">
                            <div class="titleFood">
                                <h3>Big Burger</h3>
                            </div>
                            <div class="kgFood">
                                <p>504kcal</p>
                            </div>
                        </div>
                        <div class="food">
                            <div class="titleFood">
                                <h3>Pain au chocolat</h3>
                            </div>
                            <div class="kgFood">
                                <p>250kcal</p>
                            </div>
                        </div>
                        <div class="food">
                            <div class="titleFood">
                                <h3>Pates carbonaras</h3>
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
                                    <form>
                                        <div class="mb-3">
                                            <label for="meal" class="form-label mt-3">Repas</label>
                                            <input type="text" class="form-control" id="meal">
                                        </div>
                                        <div class="mb-3">
                                            <label for="calories" class="form-label">Calories</label>
                                            <input type="text" class="form-control" id="calories">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php include_once('includes/footer.php');?>