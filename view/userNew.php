<?php 
?>
<body>
<div id="visiteur" class="container-fluid">
        <div id="visiteur2" class="container">
            
            <div class="article">
                <div id="enTete" class="row">
                    <div id="image" class="col-md-3">
                        <img class="logo" src="../image/gsb_logo.png" alt="logo_gsb">
                    </div>
                    <div class=" col-md-7">
                        <h2>Gestion des frais</h2>
                        <p class="espaceVisiteur" >Espace visteur medical</p>
                    </div>
                    <div id="deconnexion" class="col-md-2">
                         <a class="deconnexion" class="nav-link" href="../index.php">Deconnexion</a>
                    </div>
                </div>
                <div  class="formulaire1" class="row" >
                    <div class="nav" class=" col-m-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" style="color:red;">Nouveau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/GSB/index.php/consulter">Consulter</a>
                            </li>
                            
                        </ul>
                        <p id="name">Bonjour Mr <?php echo $online->getNom();?></p>
                    </div>
                    <form action="/GSB/index.php/gestion" method="POST" class="formulaire">
                    <!-- <p style="display:none;">  </p> -->
                        <h3>Periode d'engagement</h3>
                        <table id="periodeEngagementVisiteur" class="">
                            <tr>
                                <td><label for="mois">mois :</label></td>
                                <td><input class="encadrer" name="mois" type="text" id="mois" ></td>
                                <td><label for="année">année :</label></td>
                                <td><input class="encadrer" name="année" type="text" id="année"></td>
                                <input type="hidden" name="idvisiteur" value="<?php echo $online->getId(); ?>">
                                <input type="hidden" name="today" id="today" value="">
                                
                            </tr>
                        </table>
                        <h3>Frais au forfait</h3>
                        <table id="frais">
                            <tr>
                                <td><label for="repasmidi">Repas midi : </label></td>
                                <td><input class="encadrer" name="repas" type="number" id="repasmidi"></td>               
                            </tr>
                            <tr>
                                <td><label for="nuitées">Nuitées : </label></td>
                                <td><input class="encadrer" name="nuitees" type="number" id="nuitées"></td>
                            </tr>
                            <tr>
                                <td><label for="etape">Etape : </label></td>
                                <td><input class="encadrer" name="etape" type="number" id="etape"></td>
                            </tr>
                            <tr>
                                <td><label for="km">Km : </label></td>
                                <td><input class="encadrer" name="km" type="number" id="km"></td>
                            </tr>
                        </table id="horsforfait">
                        <h3>Hors forfait</h3>
                        <input type="hidden" value="1" name="compteur" id="compteur">
                        <table class="horsforfait" id="tablehorsforfait">
                            <tr>
                                <td> </td>
                                <td><p>Date</p></td>
                                <td><p>Lbellé</p></td>
                                <td><p>Quantité</p></td>
                                <td></td>
                            </tr>
                            <tr class="one">
                                <td> <p class="compteur">1 : </p> </td>
                                <td><input class="encadrer" name="dateHorsForfait1" type="date" id="datehorsforfait1"></td>
                                <td><input class="encadrer" name="libelleHorsForfait1" type="text"></td>
                                <td><input class="encadrer" name="quantiteHorsForfait1" step="0.01" type="number"></td>
                                <td><input type="button" value="+" id="ajout"></td>
                            </tr>
                                
                        </table >
                        <h3>Hors classification</h3>
                        <table>
                            <tr>
                                <td><label for="justificatif">Nombre de justificatifs</label></td>
                                <td><input class="encadrer" name="nombreJustificatif" type="text" id="justificatif"></td>
                            </tr>
                            <tr>
                                <td><label for="total">Montant total</label></td>
                                <td><input class="encadrer" name="total" type="text" id="total"></td>
                            </tr>
                        </table>
                        <input name="enregistrer" type="submit" id="enregistrer" value="enregistrer">
                    </form>

                </div>
                
            </div>
            
        </div>
    </div>
    
    <script type="text/javascript">
		
		var repas = document.getElementById("repasmidi");
		repas.addEventListener('mouseleave',horsClassification);
		var nuitée = document.getElementById("nuitées");
		nuitée.addEventListener('mouseleave',horsClassification);
		var etape = document.getElementById("etape");
		etape.addEventListener('mouseleave',horsClassification);
		var km = document.getElementById("km");
		km.addEventListener('mouseleave',horsClassification);
		document.getElementById("today").value = date();
		
		function date(){
			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); 
			var yyyy = today.getFullYear();
			today = yyyy +"-"+ mm +"-"+ dd ;
			if (dd<=7 ){
				mm-= 1;
				document.getElementById("mois").value = mm;
				document.getElementById("année").value = yyyy;
			}else{
				document.getElementById("mois").value = mm;
				document.getElementById("année").value = yyyy;
			}
			return today;
		}
		date();

		function horsClassification(){
			var repas = document.getElementById("repasmidi").value;
			var nuitée = document.getElementById("nuitées").value;
			var etape = document.getElementById("etape").value;
			var km = document.getElementById("km").value;
			var total = document.getElementById("total");
			var resultRepas=repas*25;
			var resultNuitées=nuitée*80;
			var resultEtape=etape*110;
			var resultKm=km*0.62;
			var resultTotal=resultRepas + resultNuitées + resultEtape + resultKm;

			document.getElementById("total").value = resultTotal;
				
		}
		horsClassification()
		
		var i=1;
		document.getElementById("compteur").value = i;

		document.getElementById("ajout").onclick=function(){
			i++;
			document.getElementById("tablehorsforfait").insertAdjacentHTML("beforeend",'<td> <p class="compteur'+i+'"> '+i+': </p> </td><td><input class="encadrer" name="dateHorsForfait'+i+'" type="date"></td><td><input class="encadrer" name="libelleHorsForfait'+i+'" type="text"></td> <td><input class="encadrer" name="quantiteHorsForfait'+i+'" type="number"></td><td></td>');
			document.getElementById("compteur").value = i;
		}

		var ajout = document.getElementById("ajout");
		ajout.addEventListener("click",bonneDate);
		function bonneDate(){
			var date = document.getElementById("datehorsforfait1").value;
			console.log(date);
		}
		
		
    </script>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>