<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>enregistrement GSB</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="main" class="container-fluid" >
        <div id="secondmain" class="container" >
            <header id="logo" class="row"  >
                <div id="image" class="col-md-3">
                    <img src="image/gsb_logo.png" alt="logo_gsb">
                </div>
                <div id="titre" class="col-md-9">
                    <h2>Bienvenue chez GSB</h2>
                </div>
            </header>
            <section id="form" class="row" >
                <form id="formlogin" class="col-md-12" action="index.php/login" method="POST">
                <table class="row">
                    <p>IDENTIFIANTS DE CONNEXION</p><p id="reponse"></p>
                    <p> Les informations de connéxion sont identiques à celle du site central</p>
                        <tr class="col-md-12" >
                            <td><label for="login">login</label></td> 
                            <td><input name="login" type="text" id="login"></td>
                        </tr>
                        <tr class="col-md-12"> 
                            <td><label for="mdp">Password</label></td>
                            <td><input name="mdp" type="password" id="mdp"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="Connexion" id="enregister"></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </section>
        </div>
    </div>

<script>
    var login    = document.getElementById("login");
    var password = document.getElementById("mdp");
    var enregister  = document.getElementById("enregister");
    enregister.addEventListener("click",verifier);
    var reponse = document.getElementById("reponse");

    function verifier(){
        var login    = document.getElementById("login");
        var password = document.getElementById("mdp");
        var reponse  = document.getElementById("reponse");
        if (login.value=="" && password.value==""){
            reponse.innerHTML              = "Veuillez remplir tout les champs!";
            login.style.backgroundColor    = "red";
            password.style.backgroundColor = "red";
            reponse.style.color            = "red";
            return false;
        } else if(login.value=="" || password.value==""){
            if(login.value==""){
                reponse.innerHTML           = "Veuillez remplir tout les champs!";
                login.style.backgroundColor = "red";
                reponse.style.color         = "red";
                }else{
                    login.style.backgroundColor="white";
                }
            if (password.value=="" ){
                password.style.backgroundColor = "red";
                reponse.style.color            = "red";
                reponse.innerHTML              = "Veuillez remplir tout les champs!";
            } else{
                    password.style.backgroundColor="white";
                }
            return false;
        }else{
            reponse.innerHTML              = "";
            login.style.backgroundColor    = "white";
            password.style.backgroundColor = "white";
            return true;
        }
    }
</script>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>



