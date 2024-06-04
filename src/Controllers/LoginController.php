<?php
class LoginController extends Controller {
    public function index() {
        // Variable pour stocker les erreurs
        $errorCo = "";
        $error="";

        // Vérification de la soumission du formulaire
        if (isset($_POST["username"])) {
            // Vérification des regex pour le nom d'utilisateur et le mot de passe
            if (preg_match("/^[A-z]*$/", $_POST["username"])) {
                $userInfo = User::getUserByName($_POST["username"], $_POST["password"]);

                if (!$userInfo) {
                    $errorCo = "Nom d'utilisateur ou mot de passe incorrect";
                } else {
                    // Si les identifiants sont valides, rediriger vers la page index.php
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["id"] = $userInfo["Id"];
                    header("Location:/main");
                    // Arrêter l'exécution du script pour éviter toute sortie indésirable
                    exit();
                }
            }
            // Si les identifiants ne sont pas valides
            else {
                $errorCo = "Nom d'utilisateur ou mot de passe incorrect";
            }
        }

       
      // Vérification de l'inscription
      if (isset($_POST["regis"])) {
        // Vérification de la regex pour le nom d'utilisateur
        if (preg_match("/^[a-zA-Z]*$/", $_POST["newUser"])) {
            // Vérification de la regex pour le mot de passe
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["Newpass"])) {
                // Tentative d'inscription
                $registerSucces= "";
                $verif = User::recup($_POST["newUser"]);
                // Si l'inscription a réussi, redirigez vers la page principale
                if (!$verif) {
                    
                    $registrationSuccess = User::register($_POST["newUser"], $_POST["Newpass"]);
                     $_SESSION["message-success"]= "Inscription réussi, connecte toi !";
                    header("Location:/login");
                    exit();
                } else {
                    // Sinon, affichez un message d'erreur approprié
                    $error = "L'utilisateur existe déjà.";
                }
            } else {
                $error = "Le mot de passe doit contenir au moins 8 caractères avec au moins une lettre majuscule, une lettre minuscule et un chiffre";
            }
        } 
    }

        // Afficher la vue avec les éventuelles erreurs
        require(__DIR__ . "/../../views/Login.php");
    }
}
?>

