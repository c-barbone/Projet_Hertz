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
<div>
<div class="d-flex justify-content-end">
    <a href="logout.php">Déconnexion</a>
    </div>
		<div class="sucess">
        <center><img src="hertz.png" alt="img"/></center>
        </div>
        <div class="d-flex justify-content-center">
        <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
  <a href="administration.php"><button class="btn btn-sm btn-outline-secondary" type="button">Voiture</button></a>
    <button class="btn btn-outline-success" type="button">Fiche Client</button>
    <a href="location.php"><button class="btn btn-sm btn-outline-secondary" type="button">Location</button></a>
</div>
  </form>
</nav>
        <hr>
	</div>
    
    <main class="container">

        <div class="row">
            <section class="col-12">
                <h2 class="d-flex justify-content-center mt-5 pt-5">Liste des clients :</h2><br />
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Code Postale</th>
                        <th>Ville</th>
                    </thead>
                    <tbody>
                        <?php
                        listec();
                        ?>
                    </tbody>
                </table>
        </div>

        <!-- partie Ajouter un client -->
        <div class="row">
            <section class="col-12">
                <h2 class="d-flex justify-content-center">Ajouter un client</h2>
                <form name="ajout" method="POST">
                <div class="form-group pt-3">
                        <label for="Nom_clients">Nom du client</label>
                        <input type="text" id="nom_clients" name="nom_clients" class="form-control">
                    </div>
                    <div class="form-group pt-3">
                        <label for="prenom_clients">Prenom du client</label>
                        <input type="text" id="prenom_clients" name="prenom_clients" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adresse_clients">Adresse du client</label>
                        <input type="text" id="adresse_clients" name="adresse_clients" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cp_clients">Code Postale</label>
                        <input type="text" id="cp_clients" name="cp_clients" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ville_clients">Ville</label>
                        <input type="text" id="ville_clients" name="ville_clients" class="form-control">
                    </div>
                    <button class="btn btn-warning" type="submit" name="ajouter" value="OK">Ajouter</button>
                </form>
                </form>
                <?php
                    ajouterc();
                ?>
            </section>
        </div>
        <div class="row">
<section class="col-12">
<h2 class="d-flex justify-content-center">Modifier un clients</h2>

<?php
modifierc();
supprimerc();
historiquec();

?>  
    </main>
    <section class="col-12" id=historique>
</section>
</body>
</html>