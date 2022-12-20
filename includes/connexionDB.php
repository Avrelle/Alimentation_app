<?php
 try {
    $bdd = new PDO('mysql:host=localhost;port=8080;dbname=track_calories;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException$e){
    print"Erreur!:".$e->getMessage()."<br/>";
    die();
}
?>