<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>User</title>
</head>
<body>
<div class="container-fluid">
        <div class="container">
            
            <div class="article">
                <div class="enTete" class="row">
                    <div class="col-md-2">
                        <img class="logo" src="../image/gsb_logo.png" alt="logo_gsb">
                    </div>
                    <div class=" col-md-10">
                        <h2>Validation des frais</h2>
                        <p class="espaceVisiteur" >Espace comptable</p>
                    </div>
                </div>
                
                <div  class="formulaire1" class="row" >
                    <div class="nav" class=" col-m-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="userNew.php">Nouveau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Deconnexion</a>
                            </li>
                        </ul>
                    </div>
                    <form class="formulaire" action="">
                        <h3>Periode d'engagement</h3>
                        <table id="periodeengagement" class="">
                            <tr>
                                <td><label for="choisirvisiteur">Choisir visiteur :</label></td>
                                <td>
                                    <select>
                                        <option name="nom" value="">Dupond</option>
                                        <option name="nom" value="">Lefranc</option>
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="mois">Mois :</label></td>
                                <td>
                                    <input type="date" id="mois">
                                </td>
                            </tr>
                        </table>
                        <h3>Frais au forfait</h3>
                        <table id="frais">
                            <tr>
                                <td><p name="" for="repasmidi">Repas midi  </p></td>
                                <td><p name="" for="nuitées">Nuitées  </p></td>
                                <td><p name="" for="etpae">Etape  </p></td>
                                <td><p name="" for="km">Km  </p></td>
                                <td><p name="" for="nuitées">Situation  </p></td>
                            </tr>
                            <tr>
                                <td ><p class="tableforfait" name="repas" type="text" id="repasmidi"></p></td>
                                <td ><p class="tableforfait" name="nuitées" type="text" id="nuitées"></p></td>
                                <td ><p class="tableforfait" name="etape" type="text" id="etape"></p></td>
                                <td ><p class="tableforfait" name="km" type="text" id="km"></p></td>
                                <td >
                                    <p class="tableforfait" name="situation" type="text" id="situation">
                                        <select name="situationforfait" id="">
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
                                
                            </tr>
                            <tr class="one">
                                
                                <td>
                                    <p name="datehorsforfait" type="text"></p></td>
                                    <td><p name="libellé" type="text"></p></td>
                                    <td><p name="montant" type="text"></p></td>
                                <td >
                                    <p class="tableforfait" name="situation" type="text" id="situation">
                                        <select name="situationforfait" id="">
                                            <option value="enregister">Enregistrer</option>
                                            <option value="validé">Validé</option>
                                            <option value="remboursé">Remboursé</option>
                                        </select>
                                    </p>
                                </td>
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
                            <td><p class="horsclassification" name="nombrejustificatifs" ></p></td>
                            <td><p class="horsclassification" name="montanttotal" ></p></td>
                            <td >
                                    <p class="tableforfait" name="situation" type="text" id="situation">
                                        <select name="situationforfait" id="">
                                            <option value="enregister">Enregistrer</option>
                                            <option value="validé">Validé</option>
                                            <option value="remboursé">Remboursé</option>
                                        </select>
                                    </p>
                                </td>
                    
                            </tr>
                        </table>
                        <input name="enregistrer" type="button" id="enregistrer" value="enregistrer">
                    </form>

                </div>
                
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>