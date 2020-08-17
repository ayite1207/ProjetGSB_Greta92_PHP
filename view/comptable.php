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
                        <h2>Validation des frais</h2>
                        <p class="espaceVisiteur" >Espace comptable</p>
                    </div>
                    <div id="deconnexion" class="col-md-2">
                         <a class="deconnexion" class="nav-link" href="../index.php">Deconnexion</a>
                    </div>
                </div>
                <div  class="formulaire1" class="row" >
                    <div class="nav" class=" col-m-12 col-sm-12 col-md-12 col-lg-12">
                        <ul id="nav" class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="userNew.php">Nouveau</a>
                            </li>
                        </ul>
                         <p id="name">Bonjour Mr <?php echo $online->getNom();?></p>
                    </div>
                    <form  action="/GSB/index.php/infoVisiteur" method="POST" class="formulaire">
                    <!-- <p style="display:none;">  </p> -->
                        <h3>Periode d'engagement</h3>
                        <table id="comptable" class="">
                            <tr>
                                <td><label for="choisirvisiteur">Choisir visiteur :</label></td>
                                <td>
                                    <select name="choixNom">
                                <?php foreach ($visiteur as $nom){?>
                                        <option  value="<?php echo $nom->getId();?>"><?php echo $nom->getNom();?></option>
                        
                                    <?php }?>
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">mois</label></td>
                            	<td>
                                    <select name="choixMois" id="date">
                                        <option value="01">Janvier</option>
                                		<option value="02">Février</option>
                                		<option value="03">Mars</option>
                                		<option value="04">Avril</option>
                                		<option value="5">Mai</option>
                                		<option value="06">Juin</option>
                                		<option value="07">Juillet</option>
                                		<option value="08">Aout</option>
                                		<option value="09">Septembre</option>
                                		<option value="10">Octobre</option>
                                		<option value="11">Novembre</option>
                                		<option value="12">Décembre</option>
                                	</select>
                            	</td>
                            </tr>
                            <tr>
                            	<td></td>
                            	<td>
                                    <input class="check" type="submit" value="afficher les données" id="afficher">
                            	</td>
                            </tr>
                            <p class="erreur"><?php if ($message==1) {echo $erreur;}?></p>
                        </table>
                    </form>
                    <form action="/GSB/index.php/upDateValue" method="POST" class="formulaire">
                     
                         <input type="hidden" name="today" id="today" value="">
                    <input name="moisUpDate" type="hidden" value="<?php echo $mois; ?>" >
                    <input name="idVisiteur" type="hidden" value="<?php echo $id; ?>" >
                    <?php if ($existe===1) {?>
                        <!-- <p style="display:none;">  </p> -->
                        <h3>Frais au forfait</h3>
                        <table id="frais" class="horsforfait">
                            <tr>
                                <td><p for="repasmidi">Repas midi  </p></td>
                                <td><p for="nuitées">Nuitées  </p></td>
                                <td><p for="etpae">Etape  </p></td>
                                <td><p for="km">Km  </p></td>
                                <td><p for="nuitées">Situation  </p></td>
                            </tr>
                            
                                <tr>
                                <td class="tdComptable"><input class="comptable" name="repas" type="number" id="repasmidi" value="<?php echo $ligneFraisForfaitRepas ;?>"> </td>
                                <td class="tdComptable"><input class="comptable" name="nuitees" type="number" id="nuitees" value="<?php echo $ligneFraisForfaitNuitee;?>"> </td>
                                <td class="tdComptable"><input class="comptable" name="etape" type="number" id="etape" value="<?php echo $ligneFraisForfaitEtape;?>"> </td>
                                <td class="tdComptable"><input class="comptable" name="km" type="number" id="km" value="<?php echo $ligneFraisForfaitKm;?>"> </td>
                                <td class="tdComptable">
                                    <p class="tableforfait" name="situation" type="text" id="situation">
                                        <select class="comptable" name="situationforfait" id="">
                                            <option value="enregister">Enregistrer</option>
                                            <option value="validé">Validé</option>
                                            <option value="remboursé">Remboursé</option>
                                        </select>
                                    </p>
                                </td>
                            </tr>
                            
                        </table id="horsforfait">
                        <h3>Hors forfait</h3>
                        <table class="horsforfait">
                            <tr>
                                <td><p>Date</p></td>
                                <td><p>Lbellé</p></td>
                                <td><p>Montant</p></td>
                                <td><p>Situation</p></td>
                                <td><p></p></td>
                                
                            </tr>
                            <tr class="one">
                                	<?php $i=0; foreach ($ficheHorsForfait as $info){?>
                            <tr class="one">
                                <td class="tdComptable"><input class="comptable" name="dateHorsForfait<?php echo $i; ?>" type="date" value="<?php echo $info->getDate(); ?>"> </td>
                                <td class="tdComptable"><input class="comptable" name="libelleHorsForfait<?php echo $i; ?>" type="text" type="text" value="<?php echo $info->getLibelle()?>"></td>
                                <td class="tdComptable"><input class="comptable" name="quantiteHorsForfait<?php echo $i; ?>" type="number" type="text" value="<?php echo $info->getMontant()?>"></td>
                                <td class="tdComptable"><input class="comptable" name="situation<?php echo $i; ?>" type="text" type="text" value="<?php echo $ficheFrais->getidEtat();?>"></td>
                                <td class="tdComptable">
                                	<p name="situation" type="text" id="situation">
                                        <select class="comptable" name="situationforfait" id="">
                                            <option value="enregister">Enregistrer</option>
                                            <option value="VA">Validé</option>
                                            <option value="RB">Remboursé</option>
                                        </select>
                                    </p>
                                </td>
                            </tr>
                                	<?php $i++; }?>
                                <input id="nbLigne" name="nbLigne" type="hidden" value="<?php echo $i; ?>" >
                            </tr>
                        </table id="classification">
                        <h3>Hors classification</h3>
                        <table class="classification">
                            <tr>
                                <td><p >Nombre de justificatifs</p></td>
                                <td><p>Montant total</p></td>
                                <td><p>Situation</p></td>
                            </tr>
                            <tr>
                                <td class="tdComptable"><input class="comptable" type="number" name="nbJustificatifs" value="<?php echo $ficheFrais->getNbJustificatifs();?>"> </td>
                                <td class="tdComptable"><input class="comptable" type="number" name="total" value="<?php echo $ficheFrais->getMontantValide();?>"> </td>
                                <td class="tdComptable">
                            		<p class="tableforfait" name="situation" type="text" id="situation">
                                		<select name="situationforfait" id="">
                                     		<option value="enregister">Enregistrer</option>
                                    		<option value="VA">Validé</option>
                                    		<option value="RB">Remboursé</option>
                                     	</select>
                               		</p>
                              	</td>
                            </tr>
                        </table>
                        <input class="check" name="enregistrer" type="submit" id="enregistrer" value="enregistrer">
                    </form>
					<?php }?>
                </div>
                
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
	function date(){
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); 
		var yyyy = today.getFullYear();
		today = yyyy +"-"+ mm +"-"+ dd ;
		document.getElementById("today").value = today;
		
	}
	date();
	function nbLigne(){
		var nbLigne= document.getElementById("nbLigne").value;
		nbLigne -= 1;
		document.getElementById("nbLigne").value=nbLigne;
	}
	nbLigne()
	
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>