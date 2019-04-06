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
                
                $codemysql="SELECT MDP FROM Utilisateurs WHERE login='$login'";
                $requete=$connexion->prepare($codemysql);
                $requete->execute();
                $resultat=$requete->fetchAll();
                if($MDP==$resultat["0"]["MDP"]){
                    $_SESSION['session_user_name'] = $_POST["pseudo"];
                    header("Location: http://localhost/Moi/MaPage3.php?user_name=".$_SESSION['session_user_name']);//redirection
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