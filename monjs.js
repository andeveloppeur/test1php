var nom = document.getElementById("nom");
var nomEr = document.getElementById("nomEr");

var prenom = document.getElementById("prenom");
var prenomEr = document.getElementById("prenomEr");

var sexe = document.getElementById("sexe");
var naiss = document.getElementById("naiss");
var pays = document.getElementById("pays");

var email = document.getElementById("email");
var emailEr = document.getElementById("emailEr");

var login = document.getElementById("login");
var loginEr = document.getElementById("loginEr");

var loisir1 = document.getElementById("loisir1");
var loisir2 = document.getElementById("loisir2");

var MDP=document.getElementById("MDP");
var MDPEr=document.getElementById("MDPEr");

var ConfMDP=document.getElementById("ConfMDP");
var MDPerr=document.querySelector(".verMDP");
var Envoie=document.getElementById("BEnvoie");

//var homme=document.getElementById("homme");
//var SexVide=document.getElementById("verSexe");
Envoie.addEventListener("click",verification);


//teste
/*var vtf=document.getElementById("vtf");
vtf.addEventListener("click",tvtf);
function tvtf(){
    var reg1=/^[a-zA-ZéèëêîïÉÈÏËÊ][a-zéèëçêîï]+([-'\s][a-zA-ZéèëêîïÉÈÏËÊ][a-zéèëçêîï])?/;
    var reg2=/a/;
    var reg3=/[\{]/;
    alert(reg3.test(login.value));
    alert("ok");
    
    if(reg3.test(login.value)==true){
    
        //e.preventDefault();
        alert("erreur sur le nom");
    }
}*/
//fin test


function verification(e){
    if(MDP.value!=ConfMDP.value){
        MDPerr.textContent="MOT DE PASSE DIFFERENT";
        MDPerr.style.color="red";
        MDPerr.style.display="block";
        MDPerr.style.marginLeft="256px";
        MDPerr.style.marginTop="10px";
        e.preventDefault();
    }
    nomEr.textContent=""; //pour lorsqu on modifie et on appuie de nouveau sur envoyer
    prenomEr.textContent="";
    emailEr.textContent="";
    loginEr.textContent="";
    MDPEr.textContent="";

    var reg1=/[<>\/*\+\|\.=@\{\},\[\[\?!\$]/;
    if(reg1.test(nom.value)==true){
        e.preventDefault();
        nomEr.textContent="Erreur";
        nomEr.style.color="red";
    }
    if(reg1.test(prenom.value)==true){
        e.preventDefault();
        prenomEr.textContent="Erreur";
        prenomEr.style.color="red";
    }
    var reg2=/[@\.]/;
    if(reg2.test(email.value)==false){
        e.preventDefault();
        emailEr.textContent="Erreur";
        emailEr.style.color="red";
    }
    var reg3=/[\s<>\/*\+\|\.=@\{\},\[\[\?!\$]/;
    if(reg3.test(login.value)==true){
        e.preventDefault();
        loginEr.textContent="Erreur";
        loginEr.style.color="red";
    }
    var reg4=/[<>]/;
    if(reg4.test(MDP.value)==true){
        e.preventDefault();
        MDPEr.textContent="Erreur";
        MDPEr.style.color="red";
    }
}
