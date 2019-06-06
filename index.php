<?php 
?>
<!DOCTYPE html>
<html>
<head>
	<title>association medianet</title>
	<link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/formulaire.css">
    <link rel="stylesheet" href="css/comptable.css"> -->
</head>
<body>
<?php

$r=1;
$action = explode ("/",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$action=end($action);

if ( $action=="index.php") {
    include ("view/login.php");
}
if ( $action=="login") {
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    if (empty($login) && empty($mdp)) {
        echo "zut";
    }else {
        include ("view/comptable.php");
    }
}

?>