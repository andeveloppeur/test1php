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
                    //echo "même mot de passe";
                    header('Location: http://localhost/Moi/MaPage3.php');
                }
                else{
                    header('Location: http://localhost/Moi/MaPage2.php');
                    //echo "Erreur sur le login ou le mot de passe";
                }
                /*echo "<pre>";
                    print_r($resultat);
                echo "</pre>";*/
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