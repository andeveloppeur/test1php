<?php
empty($_SESSION)? session_start():print""; 
//session_start();
if ($_SESSION['session_user_name']==NULL)//vérification variable de session
{ 
    echo "Entrée interdite";
    exit(); 
} 

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
            <div>
                <?php
                
                ?>
            </div>
        </div>
        <?php
            include("piedDePage.php");
        ?>
    <script>
        
        //alert("ok");
        //alert(nom);
    </script>
    </body>

</html>