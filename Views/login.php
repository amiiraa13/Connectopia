<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css" />
    <title>Connectopia</title>
</head>

<body>
    <header>
        <h1>Bienvenue chez Connectopia !</h1>
    </header>
    <main>
        <div id="boxOne">
            <h2>Connectez - vous !</h2>

            <!-- Formulaire de connexion -->
            <form method="post">

                <input type="text" name="username" placeholder="Votre nom" />
                <input type="text" name="password" placeholder="Votre mot de passe" />
                <button>Se connecter</button>
            </form>
            <!-- Affichage de l'erreur si elle n'est pas vide -->
            <?= $errorCo !== "" ? $errorCo : null ?>
        </div>
        <div id="boxTwo">
            <?php
            if (isset($_SESSION["message-success"])) {
                echo $_SESSION["message-success"];
                $_SESSION["message-success"] = "";
            }

            ?>
            <h2>Inscrivez vous !</h2>
            <form method="post">
                <input name="newUser" placeholder="Votre nom" />
                <input name="Newpass" placeholder="Votre mot de passe" />
                <button type="submit" name="regis">S'inscrire</button>
            </form>
            <!-- Affichage de l'erreur si elle n'est pas vide -->
            <?= $error !== "" ? $error : null ?>
        </div>
    </main>
</body>

</html>