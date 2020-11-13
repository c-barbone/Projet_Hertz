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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="d-flex justify-content-end">
        <a href="logout.php">Déconnexion</a>
    </div>
    <div class="sucess">
        <center><img src="hertz.png" alt="img" /></center>
    </div>
    <div class="d-flex justify-content-center">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <a href="administration.php"><button class="btn btn-sm btn-outline-secondary"
                        type="button">Voiture</button></a>
                <a href="client.php"><button class="btn btn-sm btn-outline-secondary" type="button">Fiche
                        Client</button></a>
                <a href="location.php"><button class="btn btn-outline-success" type="button">Location</button></a>
    </div>
    </form>
    </nav>
    <hr>

    <body>
        <main class="container">

            <div class="row">
                <section class="col-12">
                    <h2 class="d-flex justify-content-center mt-5 pt-5">Historique de location :</h2><br />
                    <table class="table">
                        <thead>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse</th>
                            <th>Code Postale</th>
                            <th>ville</th>
                            <th>marque</th>
                            <th>modele</th>
                            <th>Date du debut</th>
                            <th>Date de fin</th>


                        </thead>
                        <tbody>
                            <?php
                 historiquel();
                ?>
                        </tbody>
                    </table>
            </div>

            <main class="container">

               <div class="row">
                    <section class="col-12">
                        <h2 class="d-flex justify-content-center mt-5 pt-5">Retard de location :</h2><br />
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Date de retour initial</th>
                            </thead>
                            <tbody>
                                <?php
                        retardl();
                        ?>
                            </tbody>
                        </table>
                </div>

                <!-- Ajouter une location -->
                <div class="row">
                    <section class="col-12">
                        <h2 class="d-flex justify-content-center">Ajouter une location</h2>
                        <form name="ajout" method="POST">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_clients">ID client</label>
                                    <input type="text" id="id_clients" name="idc" class="form-control">
                                </div>
                                <label for="id_voitures">ID voitures</label>
                                <input type="text" id="id_voitures" name="idv" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_debut">Date début de location</label>
                                <input type="date" id="date_debut" name="datedl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_fin">Date de fin de location</label>
                                <input type="date" id="date_fin" name="datefl" class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit" name="ajouter" value="OK">Ajouter</button>
                        </form>
                        <?php
                ajouterl();
                ?>
                    </section>
                </div>
                <div class="row">
                    <section class="col-12">
                        <h2 class="d-flex justify-content-center mt-5 pt-5">Retour retard location</h2><br />

                        <?php
                        retourl();
                        ?>
    </main>
</body>
</html>