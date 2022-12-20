<?php
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
                <form>
                    <div class="mb-3">
                        <label for="firstName" class="form-label mt-3">Prénom</label>
                        <input type="text" class="form-control" id="firstName">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Sexe</option>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        <option value="3">Non binaire</option>
                    </select>
                    <div class="mb-3">
                        <label for="size" class="form-label mt-2">Taille</label>
                        <input type="range" class="form-range" id="size" min=0 max=255 step="1" oninput="sliderChangeSize
                        (this.value)">
                        <output id="output">170</output>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label mt-2">Poids</label>
                        <input type="range" class="form-range" id="weight" min=0 max=255 step="1" oninput="sliderChangeWeight
                        (this.value)">
                        <output id="outputBis">70</output>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
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