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
            <?php
                $serveur="localhost";
                $Monlogin="root";
                $Monpass="101419";

                $nom=$_POST["nom"];//nom recuperer sur le formulaire d inscription
                $prenom=$_POST["prenom"];
                $sexe=$_POST["sexe"];
                $naiss=$_POST["naiss"];
                $pays=$_POST["pays"];
                $email=$_POST["email"];
                $MDP=$_POST["MDP"];
                $login=$_POST["login"];

                if($_POST["loisir1"]=="lecture" && $_POST["loisir2"]=="natation"){ //j ai essayé avec insset mais ca n a pas marché
                    $loisir="lecture,natation";
                }
                elseif($_POST["loisir1"]==NULL && $_POST["loisir2"]=="natation"){ 
                    $loisir="natation";
                }
                elseif($_POST["loisir1"]=="lecture" && $_POST["loisir2"]==NULL){ 
                    $loisir="lecture";
                }
                elseif($_POST["loisir1"]==NULL && $_POST["loisir2"]==NULL ){ //si les 2 ne sont pas cocher
                    $loisir="";
                }

                function securisation($donnees){
                    $donnees=trim($donnees);//trim supprime les espaces (ou d'autres caractères) en début et fin de chaîne
                    $donnees=stripslashes($donnees); //Supprime les antislashs d'une chaîne
                    $donnees=strip_tags($donnees); //neutralise le code html et php
                    return $donnees;
                }
                $nom=securisation($nom);//securisation du nom
                $prenom=securisation($prenom);
                $sexe=securisation($sexe);
                $naiss=securisation($naiss);
                $pays=securisation($pays);
                $email=securisation($email);
                $login=securisation($login);
                $MDP=securisation($MDP);
                $loisir=securisation($loisir);
                

                try {
                    $connexion=new PDO("mysql:host=$serveur;dbname=testperso;charset=utf8",$Monlogin,$Monpass);//se connecte au serveur mysquel
                    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//setAttribute — Configure l'attribut PDO $connexion
                    $codemysql="INSERT INTO Utilisateurs (nom,prenom,sexe,naissance,pays,email,login,MDP,loisir)
                    VALUES(:nom,:prenom,:sexe,:naissance,:pays,:email,:login,:MDP,:loisir)";//le code mysql
                        
                    $requete=$connexion->prepare($codemysql);//Prépare la requête $codemysql à l'exécution 
                    $requete->bindParam(":nom",$nom);//bindParam lie un paramètre (:nom) à un nom de variable spécifique ($nom)
                    $requete->bindParam(":prenom",$prenom);
                    $requete->bindParam(":sexe",$sexe);
                    $requete->bindParam(":naissance",$naiss);
                    $requete->bindParam(":pays",$pays);
                    $requete->bindParam(":email",$email);
                    $requete->bindParam(":login",$login);
                    $requete->bindParam(":MDP",$MDP);
                    $requete->bindParam(":loisir",$loisir);
                    
                    $requete->execute();//excecute la requete qui a été preparé
                    
                } 
                catch (PDOException $e) {
                    echo "ECHEC : ".$e->getMessage();//en cas d erreur lors de la connexion à la base de données mysql
                    exit();//arreter le code
                }
            ?>

            <h1>Inscription réalisée avec succés, vous allez être rediriger dans quelques instant...</h1>
        </div>
        <?php
           include("piedDePage.php");
        ?>
        <script>
            function rediriger(){
                document.location.href="http://localhost/Moi/MaPage2.php"; 
            }
            setTimeout(rediriger,5000);//pour etre rediriger apres 5 secondes à la page de login
        </script>
    
    </body> 
</html>