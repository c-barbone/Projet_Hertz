<?php
include('functions.php');  
functionbdd();
connexion();
?>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
    <title>location</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex justify-content-end">
    <a href="logout.php">Déconnexion</a>
    </div>
		<div class="sucess">
        <center><img src="hertz.png" alt="img"/></center>
        </div>
        <div class="d-flex justify-content-center">
        <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <button class="btn btn-outline-success" type="button">Voiture</button>
    <a href="client.php"><button class="btn btn-sm btn-outline-secondary" type="button">Fiche Client</button></a>
    <a href="location.php"><button class="btn btn-sm btn-outline-secondary" type="button">Location</button></a>
</div>
  </form>
</nav>
        <hr>
        
    <main class="container">

        <div class="row">
            <section class="col-12">
                <h2 class="d-flex justify-content-center mt-5 pt-5">Liste des véhicules disponible à la location :</h2><br />
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Description</th>
                        <th>Disponibilité</th>
                    </thead>
                    <tbody>
                    <?php
                            listev();
                        ?>
                    </tbody>
                </table>
        </div>

        <!-- partie Ajouter un véhicule -->
        <div class="row">
            <section class="col-12">
                <h2 class="d-flex justify-content-center">Ajouter un véhicule</h2>
                <form name="ajout" action="upload.php" method="POST" enctype="multipart/form-data">
                    Selectionner l'image à télécharger : <br />
                    <input type="file" name="image_voitures" id="fileToUpload" >
                    <div class="form-group pt-3">
                        <label for="nom_voiture">Marque du véhicule</label>
                        <input type="text" id="nom_voitures" name="modele" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="marque_voiture">Modèle du véhicule</label>
                        <input type="text" id="marque_voitures" name="marque" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description_voitures">Description du véhicule</label>
                        <input type="text" id="description_voitures" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                    <legend>Disponibilité du véhicule :</legend>
                        <input type="radio" id="dispo" name="disponibilite" value="image/valide.png">
                        <label for="dispo">Disponible</label>
                    </div>
                    <div>
                        <input type="radio" id="invalide" name="disponibilite" value="image/invalide.png">
                        <label for="indispo">Indisponible</label>
                    </div>
                    <button class="btn btn-warning" type="submit" name="ajouter" value="ok">Ajouter</button>
                </form>
            </section>
        </div>

<div class="row">
<section class="col-12">
<h2 class="d-flex justify-content-center">Modifier un véhicule</h2><br />

<?php
modifierv();
supprimerv();
?>
    </main>
</body>
</html>