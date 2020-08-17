<?php 
?>
<body>
<div id="visiteur" class="container-fluid">
        <div id="visiteur2" class="container">
            
            <div class="article">
                <div id="enTete" class="row">
                     <div id="image" class="col-sm-12 col-md-3">
                        <img class="logo" src="../image/gsb_logo.png" alt="logo_gsb">
                    </div>
                    <div class=" col-sm-12 col-md-7">
                        <h2>Suivi de remboursement des frais</h2>
                        <p class="espaceVisiteur" >Espace visteur medical</p>
                    </div>
                     <div id="deconnexion" class="col-sm-12 col-md-2">
                         <a class="deconnexion" class="nav-link" href="../index.php">Deconnexion</a>
                    </div>
                </div>
                <div  class="formulaire1" class="row" >
                    <div class="nav" class=" col-m-12 col-sm-12 col-md-12 col-lg-12">
                        <ul id="nav" class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="/GSB/index.php/userNew">Nouveau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:red;">Consulter</a>
                            </li>
                        </ul>
                        <p id="name">Bonjour Mr <?php echo $online->getNom();?></p>
                    </div>
                    <form class="formulaire" action="/GSB/index.php/affichage" method="POST">
                    <!-- <p style="display:none;">  </p> -->
                        <h3>Periode d'engagement</h3>
                        <table id="periodeEngagementComptable" class="">
                            <tr>
                            	<td>
                            		<label for="date">mois</label>
                            	</td>
                            	<td>
                                	<select name="mois" id="date">
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
                            	<td>
                            		<input type="submit" value="afficher les données" id="afficher">
                            	</td>
                            </tr>
                            <p class="erreur"><?php if ($message==1) {echo $erreur;}?></p>
                        </table>
                            <?php if ($existe===1) {?>
                        <h3>Frais au forfait</h3>
                        <table id="frais">
                            <tr>
                                <td><label for="repasmidi">Repas midi  </label></td>
                                <td><label for="nuitées">Nuitées  </label></td>
                                <td><label for="etpae">Etape  </label></td>
                                <td><label for="km">Km  </label></td>
                                <td><label for="nuitées">Situation  </label></td>
                                <td><label for="km">Date Operation  </label></td>
                            </tr>
                            <tr>
                                <td ><p class="consultation" name="repas" type="text" id="repasmidi"><?php echo $ligneFraisForfaitRepas ;?></p></td>
                                <td ><p class="consultation" name="nuitées" type="text" id="nuitées"><?php echo $ligneFraisForfaitNuitee;?></p></td>
                                <td ><p class="consultation" name="nuitées" type="text" id="nuitées"><?php echo $ligneFraisForfaitEtape;?></p></td>
                                <td ><p class="consultation" name="km" type="text" id="km"><?php echo $ligneFraisForfaitKm;?></p></td>
                                <td ><p class="consultation" name="etape" type="text" id="etape"><?php echo $ficheFrais->getidEtat();?></p></td>
                                <td ><p class="consultation" name="km" type="text" id="km"><?php echo $ficheFrais->getDateModif();?></p></td>
                                
                            </tr>
                            
                        </table id="horsforfait">
                        <h3>Hors forfait</h3>
                        <table class="horsforfait">
                            <tr>
                                <td><p >Date</p></td>
                                <td><p>Libellé</p></td>
                                <td><p>Montant</p></td>
                                <td><p>Situation</p></td>
                                <td><p>Date opération</p></td>
                                
                            </tr>
                                
                                	<?php foreach ($ficheHorsForfait as $info){?>
                            <tr class="one">
                                <td><p class="consultation" name="datehorsforfait" type="text"><?php echo $info->getDate(); ?></p></td>
                                <td><p class="consultation" name="libellé" type="text"><?php echo $info->getLibelle()?></p></td>
                                <td><p class="consultation" name="montant" type="text"><?php echo $info->getMontant()?></p></td>
                                <td><p class="consultation" name="situation" type="text"><?php echo $ficheFrais->getidEtat();?></p></td>
                                <td><p class="consultation" name="dateoperation" type="text"><?php echo $ficheFrais->getDateModif();?></p></td>
                            </tr>
                                	<?php }?>
								
                        </table id="classification">
                        <h3>Hors classification</h3>
                        <table>
                            <tr>
                                <td><p >Nombre de justificatifs</p></td>
                                <td><p>Montant total</p></td>
                                <td><p>Situation</p></td>
                                <td><p>Date opération</p></td>
                            </tr>
                            <tr>
                            	
                                <td><p class="consultation" name="nombrejustificatifs" ><?php echo $ficheFrais->getNbJustificatifs();?></p></td>
                                <td><p class="consultation" name="montanttotal" ><?php echo $ficheFrais->getMontantValide();?></p></td>
                                <td><p class="consultation" name="situationclass" ><?php echo $ficheFrais->getidEtat();?></p></td>
                                <td><p class="consultation" name="dateoperationclass" ><?php echo $ficheFrais->getDateModif();?></p></td>
                            </tr>
                        </table>
                       <?php }?>
                        
                    </form>

                </div>
                
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>