<?php
session_start();
$_SESSION ['user']="identifiant";


//redirection insert_user vers accueil
$route = (isset($_GET["insert_user"]))? $_GET["insert_user"] : "accueil";

//routeur

switch($route) {

    case "identifiant" : $Template = showUser();
    break;
    case "motdepasse" : $Template = showPassword();
    break;
   
    case "insert_user" : insert_user();
    break;
    default : $Template = ["template" => "accueil.html"];

}

//retourne le tableau formulaire.php
function showUser(): array {

    return ["template" => "formulaire.php"];

    function showPassword(): array {

        return ["template" => "Password.php"];

// instanciation d'un objet utilisateur par methode POST
    function insert_user() {

        require_once "utilisateur/User.php";
    
        $user= new User($_POST["identifiant"], $_POST["pseudo"], $_POST["motdepasse"]);
        $user->saveUser();
    
        // Pensez à commenter la redirection temporairement pour débuguer (voir vos var_dump)
        header("Location:index.php?route=formlivre");
        exit;
    }



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>

<body>
<?php require "template/$Template";?>
         
</body>
</html>





