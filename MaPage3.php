<?php
empty($_SESSION)? session_start():print""; 

if ($_SESSION['nom']==NULL)//vérification variable de session
{ 
    echo "Entrée interdite";
    exit(); 
}
$_SESSION['ouvert']=true; //comme ca si la session est ouvert et qu on se trouve sur le login elle sera detruite
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
                    echo"<span id='Inf'>Nom</span>: ".$_SESSION["nom"].'<br>';
                    echo"<span id='Inf'>Prenom</span>: ".$_SESSION["prenom"].'<br>';
                    echo"<span id='Inf'>Date de naissance</span>: ".$_SESSION["naissance"].'<br>';
                    echo"<span id='Inf'>Pays d'origine</span>: ".$_SESSION["pays"].'<br>';
                    echo"<span id='Inf'>Email</span>: ".$_SESSION["email"].'<br>';
                    echo"<span id='Inf'>Loisir</span>: ".$_SESSION["loisir"].'<br>';
                ?>
            </p>
            <a href="http://localhost/Moi/MaPage2.php"><button id="BDeco">Déconnexion</button></a>
        </div>
        <?php
            include("piedDePage.php");
        ?>
        <script>
            var BDeco=document.getElementById("BDeco");
            BDeco.addEventListener("click", SeDeconnecter);     
            function SeDeconnecter(){
                //detuire ma section
                //section_destroy();
            }
        </script>

    </body>

</html>