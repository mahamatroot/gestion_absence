<?php
    require_once('actions/dbase.php');
    if (isset($_POST['validate'])) {
        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['heure']) AND !empty($_POST['filiere'])) {
            //recuperation des données
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenom = htmlspecialchars(trim($_POST['prenom']));
            $nombre_heure = $_POST['heure'];
            $filiere = $_POST['filiere'];
            $heure_total = 5208;
            $taux = round(($nombre_heure/$heure_total) * 100, 2);

            // Insertion de l'étudiant dans la base
            $insertEtudiant = $bdd->prepare('INSERT INTO etudiants(nom, prenom, nombre_absent, filiere, taux) VALUES(?,?,?,?,?)');
            $insertEtudiant->execute(array($nom, $prenom, $nombre_heure, $filiere, $taux));

            // message de succès et rdirection vers la page index
            $message_succes = 'Etudiant ajouté avec succès!';
            header('Location: index.php');
            exit();
        }else {
            $message = 'Veuillez completer tous les champs!';
        }
    }
?>