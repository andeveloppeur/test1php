<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ma page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="MonStyle.css">
    </head>
    <body>
        <?php
            include("menu.php");
        ?>
        <?php
            $serveur="localhost";
            $Monlogin="root";
            $Monpass="101419";

            $login=$_POST["pseudo"];
            $MDP=$_POST["seConnecter"];

            try {
                $connexion=new PDO("mysql:host=$serveur;dbname=testperso;charset=utf8",$Monlogin,$Monpass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $codemysql="SELECT * FROM Utilisateurs WHERE login='$login'";
                $requete=$connexion->prepare($codemysql);
                $requete->execute();
                $resultat=$requete->fetchAll();
                /*echo"<pre>";
                    print_r($resultat);
                echo"<pre>";*/

                if($MDP==$resultat["0"]["MDP"]){
                    $_SESSION['login'] = $_POST["pseudo"];
                    $_SESSION['nom'] = $resultat["0"]["nom"];
                    $_SESSION['prenom'] = $resultat["0"]["prenom"];
                    $_SESSION['sexe'] = $resultat["0"]["sexe"];
                    $_SESSION['naissance'] = $resultat["0"]["naissance"];
                    $_SESSION['pays'] = $resultat["0"]["pays"];
                    $_SESSION['email'] = $resultat["0"]["email"];
                    $_SESSION['loisir'] = $resultat["0"]["loisir"];
                    header("Location: http://localhost/Moi/MaPage3.php?user_name=".$_SESSION['login']);//redirection
                    $_SESSION["Incorrect"]=false;
                }
                else{
                    $_SESSION["Incorrect"]=true;
                    header('Location: http://localhost/Moi/MaPage2.php');   
                }
            }
            catch(PDOException $e){
                echo "ECHEC : ".$e->getMessage();
            }
        ?>

        <?php
            include("piedDePage.php");
        ?>
    </body>
</html>