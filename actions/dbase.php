<?php
   try {
       $bdd = new PDO('mysql:host=localhost;dbname=gestion_absence;cherset=utf8;', 'root', '');
   } catch (Exception  $e) {
       die('Une erreur est survenue lors de la connexion à la base de données!' .$e->getMessage());
       exit();
   }
?>
