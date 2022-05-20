<?php
 require_once('actions/fonctions/loginAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="containeur">
        <form action="" method="POST" id="form" class="form">
            <header>
                <h2>Connexion Admin</h2>
            </header>
            <small class="errorId"><?php if(isset($messageId)){echo $messageId;}?></small>
            <div class="form-control">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo...">
                <i class="fas fa-user"></i>
                <small><?php if(isset($messageP)){echo $messageP;}?></small>
            </div>
            <div class="form-control">
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe...">
                <i class="fas fa-password"></i>
                <small><?php if(isset($messageMdp)){echo $messageMdp;}?></small>
            </div>
            <button class="btn" type="submit" name="valider">LOGIN</button>
        </form>
    </div>
</body>
</html>