<?php
if (isset($_POST['bouton'])){

/*$html_string = "<div style=\"color: red; font-size: 30px;\">" . 
	"This <strong>string</strong> contains text & " .
	"<span style=\"color: green;\">HTML</span>.".
	"</div>".
	"<br />";

$javascript_string = "<script>alert('Gotcha!');</script>";*/

echo htmlspecialchars($_POST['username']);
echo strip_tags($_POST['password']);

 //htmlspecialchars($html_string)
 //echo htmlentities($html_string);
 //echo strip_tags($html_string);
}

?>
<form method="POST" action=''>
	name <input type="text" name="username" />
	password<input type="text" name="password"/>
	age<input type="text" name="age" />
	salaire<input type="text" name="salaire"/>
	<input type="submit" value="envoyer" name="bouton">
</form>
