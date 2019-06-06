<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/formulaire.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>User</title>
</head>
<body>
<div class="container-fluid">
        <div class="container">
            
            <div class="article">
                <div class="enTete" class="row">
                    <div class="col-md-3">
                        <img class="logo" src="../image/gsb_logo.png" alt="logo_gsb">
                    </div>
                    <div class=" col-md-9">
                        <h2>Gestion des frais</h2>
                        <p class="espaceVisiteur" >Espace visteur medical</p>
                    </div>
                    
                </div>
                
                <div  class="formulaire1" class="row" >
                    <div class="nav" class=" col-m-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Nouveau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="userConsult.php">Consulter</a>
                            </li>
                        </ul>
                    </div>
                    <form class="formulaire" action="">
                        <h3>Periode d'engagement</h3>
                        <table id="periodeengagement" class="">
                            <tr>
                                <td><label for="mois">mois :</label></td>
                                <td><input name="mois" type="text" id="mois" ></td>
                                <td><label for="année">année :</label></td>
                                <td><input name="année" type="text" id="année"></td>
                            </tr>
                        </table>
                        <h3>Frais au forfait</h3>
                        <table id="frais">
                            <tr>
                                <td><label for="repasmidi">Repas midi : </label></td>
                                <td><input name="repas" type="text" id="repasmidi"></td>
                            </tr>
                            <tr>
                                <td><label for="nuitées">Nuitées : </label></td>
                                <td><input name="nuitées" type="text" id="nuitées"></td>
                            </tr>
                            <tr>
                                <td><label for="etpae">Eatpe : </label></td>
                                <td><input name="etape" type="text" id="etape"></td>
                            </tr>
                            <tr>
                                <td><label for="km">Km : </label></td>
                                <td><input name="km" type="text" id="km"></td>
                            </tr>
                        </table id="horsforfait">
                        <h3>Hors forfait</h3>
                        <table class="horsforfait">
                            <tr>
                                <td> </td>
                                <td><p>Date</p></td>
                                <td><p>Lbellé</p></td>
                                <td><p>Quantité</p></td>
                                <td></td>
                            </tr>
                            <tr class="one">
                                <td> <p class="compteur">1 : </p> </td>
                                <td><input name="datehorsforfait" type="date"></td>
                                <td><input name="libellé" type="text"></td>
                                <td><input name="quantité" type="text"></td>
                                <td><input type="button" value="+" id="ajout"></td>
                            </tr>
                        </table id="classification">
                        <h3>Hors classification</h3>
                        <table>
                            <tr>
                                <td><label for="justificatif">Nombre de justificatifs</label></td>
                                <td><input name="nombrejustificatif" type="text" id="justificatif"></td>
                            </tr>
                            <tr>
                                <td><label for="total">Montant total</label></td>
                                <td><input name="total" type="text" id="total"></td>
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