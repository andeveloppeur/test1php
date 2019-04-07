<?php
empty($_SESSION)? session_start():print""; 

if ($_SESSION['nom']==NULL)//si la variable session est NULL se la voudra dire que la personne ne c est pas connectée
{ 
    echo "Entrée interdite";
    exit(); //bloquer le code et ne pas afficher le reste
}
$_SESSION['ouvert']=true; //comme ca si la session est ouvert et qu on se trouve sur le login elle sera detruite
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="pqge utilisateur">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ma page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="MonStyle.css">
    </head>
    <body>
        <img src="logoo.pnj" alt="logo pic">
        <p id="textPhenix">SONATEL ACADEMY</p>
        <div class="menu">
            <ul>
                <li><a href="MaPage3.php"> Page perso</a></li>
                <li><a href="MaPage4.php"> Contact</a></li>
            </ul>
        </div>

        <div id="perso">
            <h1>Bonjour <?php 
            if($_SESSION["sexe"]=="homme"){
                echo "monsieur";
            }
            else{
                echo "madame";
            }
            echo ' '.$_SESSION["nom"].' '.$_SESSION["prenom"];
                
            ?>, bienvenue sur votre page personnel</h1>
            <p id="pinf">
                <span id='VosInf'>Vos informations personnelles :</span> <br><br>
                <?php
                    echo"<span id='Inf'>Nom</span>: ".$_SESSION["nom"].'<br>';//les span sont utilisés pour les aligner
                    echo"<span id='Inf'>Prenom</span>: ".$_SESSION["prenom"].'<br>';
                    echo"<span id='Inf'>Date de naissance</span>: ".$_SESSION["naissance"].'<br>';
                    echo"<span id='Inf'>Pays d'origine</span>: ".$_SESSION["pays"].'<br>';
                    echo"<span id='Inf'>Email</span>: ".$_SESSION["email"].'<br>';
                    echo"<span id='Inf'>Loisir</span>: ".$_SESSION["loisir"].'<br>';
                ?>
            </p>
            <a href="http://localhost/Moi/MaPage2.php"><button id="BDeco">Déconnexion</button></a><!--lien qui renvoi sur la page login-->
        </div>
        <?php
            include("piedDePage.php");
        ?>
    </body>

</html>