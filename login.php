<?php
    session_start();
    $serveur="localhost";
    $Monlogin="root";
    $Monpass="101419";
    function securisation($donnees){
        $donnees=trim($donnees);//trim supprime les espaces (ou d'autres caractères) en début et fin de chaîne
        $donnees=stripslashes($donnees); //Supprime les antislashs d'une chaîne
        $donnees=strip_tags($donnees); //neutralise le code html et php
        return $donnees;
    }
    $login=$_POST["pseudo"];
    $_SESSION['MDP'] = securisation($_POST["seConnecter"]);
    $_SESSION['login'] = securisation($_POST["pseudo"]);

    try {
        $connexion=new PDO("mysql:host=$serveur;dbname=testperso;charset=utf8",$Monlogin,$Monpass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
        $codemysql="SELECT * FROM Utilisateurs WHERE login='$login'";//selection toute les données en rapport avec le login de la personne
        $requete=$connexion->prepare($codemysql);
        $requete->execute();
        $resultat=$requete->fetchAll();//grace à $requete->fetchAll() $resultat contient toutes les information de l utilisateur sous forme te tableau
        /*echo"<pre>";
            print_r($resultat);
        echo"<pre>";*/

        if($_SESSION['MDP']==$resultat["0"]["MDP"]){//comparaison mot de passe fournir par l'utilisateur et son mot de passe qui se trouve sur la base de données
            $_SESSION['nom'] = $resultat["0"]["nom"];
            $_SESSION['prenom'] = $resultat["0"]["prenom"];
            $_SESSION['sexe'] = $resultat["0"]["sexe"];
            $_SESSION['naissance'] = $resultat["0"]["naissance"];
            $_SESSION['pays'] = $resultat["0"]["pays"];
            $_SESSION['email'] = $resultat["0"]["email"];
            $_SESSION['loisir'] = $resultat["0"]["loisir"];
            header("Location: http://localhost/Moi/MaPage3.php?user_name=".$_SESSION['login']);//redirection
            $_SESSION["Incorrect"]=false;//la variable $_SESSION["Incorrect"] nous permettra d afficher qui il y a une erreur ou non sur le login 
            //ou le mot de passe (si false pas d erreur) elle est utilisée sur MaPage2.php
        }
        else{//alors mot de passe est different
            $_SESSION["Incorrect"]=true;
            header('Location: http://localhost/Moi/MaPage2.php');   
        }
    }
    catch(PDOException $e){
        echo "ECHEC : ".$e->getMessage();//pour afficher une erreur lors de la recuperation des données
    }
?>