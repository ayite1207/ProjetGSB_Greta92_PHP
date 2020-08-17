<?php
?>

<body>
    <div id="main" class="container-fluid" >
        <div id="secondmain" class="container" >
            <header id="logo" class="row"  >
                <div id="image" class="col-md-3">
                    <img src="/GSB/image/gsb_logo.png" alt="logo_gsb">
                </div>
                <div id="titre" class="col-md-9">
                    <h2>Bienvenue chez GSB</h2>
                    
                </div>
            </header>
            <div id="form">
                <section class="row" >
                    <form action="/GSB/index.php/login" method="POST" id="formlogin" class="col-md-12">
                    
                    <p style="display:none;"> <?php echo csrf_token_tag(); ?> </p>
                    <table class="login" class="row">
                        <p id="id">IDENTIFIANTS DE CONNEXION</p>
                        <p> Les informations de connexion sont identiques à celles du site central</p>
                            <tr class="col-md-12" >
                                <td><label for="login">login</label></td> 
                                <td><input name="login" type="text" id="login<?php if ($background == 1 | $background == 11) {echo "1";}?>"></td>
                            </tr>
                            <tr class="col-md-12"> 
                                <td><label for="mdp">Password</label></td>
                                <td><input name="mdp" type="text" id="mdp<?php if ($background == 1  || $background == 12) {echo "1";}?>"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Connexion" id="enregister"></td>
                                <td></td>
                            </tr>
                        </table>
                            <p class="erreur"><?php if ($existe == 1) {echo $erreur;}?>  </p>   
                    </form>
                </section>
          	</div>
        </div>
    </div>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>



