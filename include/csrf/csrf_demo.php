<?php
session_start();
require_once 'csrf_request_type_functions.php';
require_once 'csrf_token_functions.php';
// on s assure que la methode http qui soumet le formulaire est de type poste
if(request_is_post()) {
	// on va tester que le token est valid (le token envoye a partir du champ cache
	// du formulaire est identique à celui stocke dans la variable de session)
	if(csrf_token_is_valid()) {
		$message = "LE FORMULAIRE DE SOUMISSION EST VALIDE";
		// on va tester si le tocken est recent
		if(csrf_token_is_recent()) {
			$message .= " (recent)";
                        //on fait le traitement

		} else {
			$message .= " (not recent)";
                        //formulaire invalide
		}
	} else {
		$message = "CSRF TOKEN MISSING OR MISMATCHED";
		// on interdit les traitements avec la base de donnee par exemple
	}
} else {
	// form not submitted or was GET request
	$message = "Please login.";
}

?>
<html>
	<head>
		<title>CSRF Demo</title>
	</head>
	<body>
		<?php echo $message; ?><br />
		<form action="" method="post">
			<?php //echo csrf_token_tag(); ?>

			Username: <input type="text" name="username" /><br />
			Password: <input type="password" name="password"><br />
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>
