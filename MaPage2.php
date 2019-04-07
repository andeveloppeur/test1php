<?php
session_start(); //pour pouvoir utiliser les variables $_SESSION
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
                        value="<?php //ce code php permet de mettre le login sur "" lors du chargement de la page 
                        //et si il y a une erreur sur le mot de passe ou le login d afficher 
                        //la valeur le login qu on avait mis precédement
                        if ($_SESSION['login']==NULL){
                            echo"";
                        }
                        elseif ($_SESSION['login']!=NULL){
                            echo $_SESSION['login'];
                        }
                        ?>">
                        <span id="Erlog"></span>
                    </p>
                    <p>
                        <label for="seConnecter" class="Cleft">Mot de passe</label>
                        <input type="password" name="seConnecter" id="seConnecter"                        
                        value="<?php //même chose pour le mot de passe
                        if ($_SESSION['MDP']==NULL){
                            echo"";
                        }
                        elseif ($_SESSION['MDP']!=NULL){
                            echo $_SESSION['MDP'];
                        }
                        ?>">
                        <span id="ErMotDpass"></span>
                    </p>
                    <input type="submit" value="CONNEXION" id="BConnexion">
                    <?php
                        if($_SESSION["Incorrect"]==true){
                            echo"<p id='LogMDPERR'>Erreur : Login ou Mot de passe erroné</p>";
                        }//pour en cas d erreur sur le login ou le MDP (elle est definie sur login.php)
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
        <script>
            var sonPseudo=document.getElementById("pseudo");
            var ErsonPseudo=document.getElementById("Erlog");
            var SonMDP=document.getElementById("seConnecter");
            var ErSonMDP=document.getElementById("ErMotDpass");
            var Connex=document.getElementById("BConnexion");

            Connex.addEventListener("click",verif);
            function verif(e){
                var reg3=/[\s<>\/*\+\|\.=@\{\},\[\[\?!\$]/;
                if(reg3.test(sonPseudo.value)==true){
                    e.preventDefault();
                    ErsonPseudo.textContent="Erreur";
                    ErsonPseudo.style.color="red";
                }
                var reg4=/[<>]/;
                if(reg4.test(SonMDP.value)==true){
                    e.preventDefault();
                    ErSonMDP.textContent="Erreur";
                    ErSonMDP.style.color="red";
                }
            }
        </script>
    </body>
</html>