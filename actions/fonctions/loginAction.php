<?php
session_start();
    require_once('./actions/dbase.php');

    if (!empty($_POST)) {
        extract($_POST);
        $valide = true;

        if (isset($_POST['valider'])) {
    
            //Definition des indentifiants par defaut
            $defaultpseudo = 'Admin';
            $defaultmdp = 'Admin1234';

            // Récuperation des données saisies par l'admin
            $pseudo_saisi = htmlspecialchars(trim($_POST['pseudo']));
            $mdp_saisi = htmlspecialchars(trim($_POST['mdp']));

            // verification des champs
            if (empty($pseudo_saisi)) {
                $valide = false;
                $messageP = 'Pseudo ne doit pas être vide!';
            }elseif (iconv_strlen($pseudo_saisi) < 4) {
                $valide = false;
                $messageP = 'Pseudo doit être compris etre 4 et 12 caratères!';
            }elseif(iconv_strlen($pseudo_saisi) > 12){
                $valide = false;
                $messageP = 'Pseudo doit être compris entre 4 et 12 caractères!';
            }elseif (!preg_match("/^[\p{L}0-9-]*$/u", $pseudo_saisi)) {
                $valide = false;
                $messageP = 'Caractères acceptés : a à z, A à Z, 0 à 9, -, espace!';
            }
              // verif mot de passe mot de passe
            if (empty($mdp_saisi)) {
                $valide = false;
                $messageMdp = 'Mot de passe ne doit pas être vide!';
            }else {

            if ($defaultpseudo == $pseudo_saisi AND $defaultmdp == $mdp_saisi) {
                $_SESSION['mdp'] = $mdp_saisi;
                $_SESSION['pseudo'] = $pseudo_saisi;
                header('Location: index.php');
                exit();
            }else{
                $valide = false;
                $messageId = 'Identifiant non défini!';
              }
            }
        }
    }
?>