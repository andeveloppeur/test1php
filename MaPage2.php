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
        <div id="perso">
            <div id="divConnexion">
                <form method="POST" action="login.php">
                    <p>
                        <label for="pseudo" class="Cleft">Login</label>
                        <input type="text" id="pseudo" name="pseudo">
                    </p>
                    <p>
                        <label for="seConnecter" class="Cleft">Mot de passe</label>
                        <input type="password" name="seConnecter" id="seConnecter">
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
        ?>
    </body>
</html>