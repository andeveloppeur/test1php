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
        <div id="Inscription">
            <form method="POST" action="traitement.php">
                <p>
                    <label for="nom" class="left">NOM</label>
                    <input type="text" name="nom" id="nom" required="required">
                    <span id="nomEr"></span> <!--pour en cas d erreur -->
                </p>   
                <p>
                    <label for="prenom" class="left">PRENOM</label>
                    <input type="text" name="prenom" id="prenom"required="required">
                    <span id="prenomEr"></span>
                </p>
                
                <p>
                    <label class="left">SEXE</label>
                    <input type="radio" name="sexe" id="homme" value="homme" checked="checked">
                    <label for="homme">HOMME</label>
                    <input type="radio" name="sexe" value="femme" id="femme">
                    <label for="femme">FEMME</label>
                    
                </p>
                <p>
                    <label for="naiss" class="left">DATE DE NAISSANCE</label>
                    <input type="date" name="naiss" id="naiss" required="required">
                </p>
                <p>
                    <label class="left">LIEUX</label>
                    <select name="pays">
                        <optgroup label="Afrique">
                            <option value="Mali">Mali</option>
                            <option value="Sénégal">Sénégal</option>
                            <option value="CI">Cote d'ivoire</option>
                            <option value="GN">Ghana</option>
                            <option value="GB">Guinée Bisseau</option>
                            <option value="GB">Gambie</option>
                        </optgroup>
                        <optgroup label="Amérique">
                            <option value="USA">Etats Unis</option>
                            <option value="Mex">Mexique</option>
                            <option value="BZ">BRESIL</option>
                        </optgroup>
                        <optgroup label="Europe">
                            <option value="FR">France</option>
                            <option value="ES">Espagne</option>
                            <option value="IT">Italie</option>
                            <option value="ALL">Allemagne</option>
                        </optgroup>
                    </select>
                </p>
                <p>
                    <label for="email" class="left">EMAIL</label>
                    <input type="email" name="email" id="email" required="required">
                    <span id="emailEr"></span>
                </p>
                <p>
                    <label for="login" class="left">LOGIN</label>
                    <input type="text" name="login" id="login" required="required">
                    <span id="loginEr"></span>
                </p>
                <p>
                    <label for="MDP" class="left">MOT DE PASSE</label>
                    <input type="password" name="MDP" id="MDP" required="required">
                    <span id="MDPEr"></span>
                </p>
                <p>
                    <label for="ConfMDP" class="left">CONFIRMEZ MDP</label>
                    <input type="password" name="ConfMDP" id="ConfMDP" required="required">
                    <span class="verMDP"> </span>
                </p>
                <p>
                <label class="left">LOISIR</label>
                    <input type="checkbox" name="loisir1" id="lecture" value="lecture">
                    <label for="lecture">LECTURE</label>
                    <input type="checkbox" name="loisir2" id="natation"  value="natation">
                    <label for="natation">NATATION</label>
                </p>
                <input type="submit" id="BEnvoie" value="ENREGISTER">
            </form>
            <!-- <button id="vtf">vtf</button> -->
        </div>

        <?php
            include("piedDePage.php");
        ?>
        <script src="monjs.js"></script>
    </body>
</html>
