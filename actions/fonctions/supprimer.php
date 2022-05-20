<?php
    session_start();
    require_once('actions/dbase.php');
    if (!$_SESSION['pseudo']) {
        header('Location: login.php');
    }

    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $getId = $_GET['id'];
        $checkIfExist = $bdd->prepare('SELECT * FROM etudiants WHERE id = ?');
        $checkIfExist->execute(array($getId));

        if ($checkIfExist->rowcount()> 0) {
            $supEtudiant = $bdd->prepare('DELETE FROM etudiants WHERE id = ?');
            $supEtudiant->execute(array($getId));
            header('Location: index.php');
            exit();
        }else {
            $message_erreur = 'Aucun etudiant trouvé!';
        }
        
    }else {
        $message_erreur = 'Aucun identifiant trouvé!';
    }
?>