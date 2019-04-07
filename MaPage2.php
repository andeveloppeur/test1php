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
        <img src="logoo.pnj" alt="logo pic">
        <p id="textPhenix">SONATEL ACADEMY</p>
        <div class="menu">
            <ul>
                <li><a href="MaPage1.php">Inscription</a></li>
                <li><a href="MaPage2.php"> Login</a></li>
            </ul>
        </div>
        <div id="perso">
            <div id="divConnexion">
                <form method="POST" action="login.php">
                    <p>
                        <label for="pseudo" class="Cleft">Login</label>
                        <input type="text" id="pseudo" name="pseudo" 
                        value="<?php 
                        if ($_SESSION['login']==NULL){
                            echo"";
                        }
                        elseif ($_SESSION['login']!=NULL){
                            echo $_SESSION['login'];
                        }
                        ?>">
                    </p>
                    <p>
                        <label for="seConnecter" class="Cleft">Mot de passe</label>
                        <input type="password" name="seConnecter" id="seConnecter"                        
                        value="<?php 
                        if ($_SESSION['MDP']==NULL){
                            echo"";
                        }
                        elseif ($_SESSION['MDP']!=NULL){
                            echo $_SESSION['MDP'];
                        }
                        ?>">
                    </p>
                    <input type="submit" value="CONNEXION" id="BConnexion">
                    <label id="err" value="un erreur">
                    <?php
                        if($_SESSION["Incorrect"]==true){
                            echo"<p id='LogMDPERR'>Erreur : Login ou Mot de passe erroné</p>";
                        }
                        
                    ?>
                </form>
            </div>
        </div>

        <?php
            include("piedDePage.php");
            if ($_SESSION['ouvert']==true){
                session_destroy();/*lorsque la session est ouvert 
                et qu on se deconnecte on revient sur cette page et la session est detruite*/
            }
        ?>

    </body>
</html>