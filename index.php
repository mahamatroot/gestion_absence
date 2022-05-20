<?php
session_start();
    if (!$_SESSION['pseudo']) {
        header('Location: login.php');
    }
    require_once('actions/fonctions/ajouter.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Espace Admin</title>
</head>
<body>
   <header class="header">
       <div class="logo"><h1>Gestion des absenteismes</h1></div>
       <div class="admin"><h2>Vous êtes connecter en tant que <span><?php echo $_SESSION['pseudo'];?></span></div>
       </h2><h4><a href="logout.php">logout</a></h4>
   </header>
   <div class="contenu">
       <div class="form">
           <fieldset><legend>Saisie des informations d'absence</legend>
           <form action="" method="POST">
                  <div class="form-control">
                      <small><?php if (isset($message)) {echo $message;}?></small>
                      <label for="nom">Nom :</label>
                      <input type="text" name="nom" id="nom" placeholder="Nom...">
                  </div>
                  <div class="form-control">
                      <label for="prenom">Prenom :</label>
                      <input type="text" name="prenom" id="prenom" placeholder="Prenom...">
                  </div>
                  <div class="form-control">
                      <label for="heure">Nombre d'heure d'absence :</label>
                      <input type="number" name="heure" id="heure" min="0" placeholder="Nombre d'heure d'absence">
                  </div>
                      <div class="form-radio"><label for="filiere">Filière :</label>
                      <input type="radio" name="filiere" value="web" checked="checked">Web Dev
                      <input type="radio" name="filiere" value="reseau">Réseaux
                      <input type="radio" name="filiere" value="marketing">Marketing
                      <small></small>
                      </div>
                  <button type="submit" name="validate">Envoyer</button>
              </form>
            </fieldset>
       </div>
             <div class="table">
             <table>
              <tr>
                  <thead>
                  <td>Id</td>
                  <td>Nom</td>
                  <td>Prénom</td>
                  <td>Nbr d'heure</td>
                  <td>Filière</td>
                  <td>Taux</td>
                  <!-- <td>Actions</td> -->
                  </thead>
              </tr>
              <tbody>
                  <?php
                    $recupereEtudiants = $bdd->query('SELECT * FROM etudiants ORDER BY id ASC LIMIT 0,20');
                    while ($etudiantRecupere = $recupereEtudiants->fetch()) {
                    ?>
                    <tr>
                        <td><?= $etudiantRecupere['id'];?></td>
                        <td><?= $etudiantRecupere['nom'];?></td> 
                        <td><?= $etudiantRecupere['prenom'];?></td> 
                        <td><?= $etudiantRecupere['nombre_absent'];?></td> 
                        <td><?= $etudiantRecupere['filiere'];?></td> 
                        <td><?= $etudiantRecupere['taux'];?>%</td>
                        <!-- <td><button><a href="edit.php?id=<?= $etudiantRecupere['id'];?>">Edit</a></button> 
                        <button><a href="supprimer.php?id=<?= $etudiantRecupere['id'];?>">Supprimer</a></button></td> -->
                    </tr> 
                    <?php
                    }
                  ?>
             </tbody>
          </table>
     </div>
   </div>
</body>
</html>