<?php
require_once "validation_functions.php";
if (isset($_POST['bouton'])){
	//Teste la presence des champs en php
	//On stock le nom des champs dans un tableau
	$required_fields=['username','password','age','salaire'];
	//On definis untableau dans lequel les erreurs
	$errors = [];
	//On definis une fonction pour tester les champs
	function validate_presence_on($required_fields) {
		global $errors;
		//on parcours le tableau et on recupere chaque champs
		foreach($required_fields as $field) {
			//On teste si le champs existe et n'est pas vide dans le cas 
			//ou il n'existe pas et n'est pas vide on stocke l'erreur dans un tableau $erreur
			if (!has_presence($_POST[$field])) {
				$errors[$field] = "'" . $field . "' ne peut être vide"."</br>";
			} 
		}
		return $errors;
	}
	//On appel la fonction on reccupere les erreurs et on fait un echo des erreurs
	$errors=validate_presence_on($required_fields);
	foreach($errors as $error) echo $error;


	//teste la taille des champs en php
	if (!has_length($_POST["username"], ['min' => 5, 'max' => 30])) echo "taille du nom entre 5 et 30"."</br>";

	//teste le format d'un champ
	if (!has_format_matching($_POST["salaire"],  '/\d{4}/')) echo "le format doit être xxxx"."</br>";

	//teste si la valeur appartient à un ensemble
	if (!has_inclusion_in($_POST["username"], ["paul","patrick",'francois',"albert"])) echo "le nom n'est pas valide"."</br>";

	//teste si la valeur n'appartient pas à un ensemble
	if (!has_exclusion_from($_POST["username"], ["marie","mustapha",'etienne',"hamid"])) echo "le nom n'est pas valide"."</br>";
}

?>
<form method="POST" action=''>
	name <input type="text" name="username" />
	password<input type="text" name="password"/>
	age<input type="text" name="age" />
	salaire<input type="text" name="salaire"/>
	<input type="submit" value="envoyer" name="bouton">
</form>