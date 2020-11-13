<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>recherche</title>
</head>
<body>

<?php
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=location;charset=utf8','root','');
 
$articles = $bdd->query('SELECT * FROM voitures ');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $bdd->query('SELECT * FROM voitures WHERE nom_voitures LIKE "%'.$q.'%" ');
   if($articles->rowCount() == 0) {
      $articles = $bdd->query('SELECT * FROM voitures WHERE nom_voitures LIKE "%'.$q.'%" ');
   }
}
?>

<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<?php if($articles->rowCount() > 0) { ?>

 <ul>
   <?php while($a = $articles->fetch()) { ?>
      <li><img src="<?= $a['image_voitures'] ?>" </li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>

-------------------------------------------------------------

<?php

$req = $bdd->prepare ('SELECT * FROM louer WHERE (date_fin < NOW())
VALUES ( :id_voitures, :id_clients, :date_debut, :date_fin )');
$req->bindParam(':id_voitures', $_POST['idv'],PDO::PARAM_INT);
$req->bindParam(':id_clients', $_POST['idc'],PDO::PARAM_INT);
$req->bindParam(':date_debut', $_POST['datedl'],PDO::PARAM_STR);
$req->bindParam(':date_fin', $_POST['datefl'],PDO::PARAM_STR);

$req->execute();
$query = $bdd->prepare('SELECT * FROM louer
INNER JOIN clients ON clients.id_clients = louer.id_clients
INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures
WHERE (date_fin < NOW())');
$query->execute();

$reponse = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($reponse as $infos)
{
echo "<br/> Retard du véhicule :".$infos['marque_voitures']." ".$infos['nom_voitures'].", ID n° ".$infos['id_voitures']." loué par ".$infos['nom_clients']." ".$infos['prenom_clients'].". Date de retour prevu initialement: ".$infos['date_fin'].".";
}

?>


--------------------------------------------------------------------------------------------------------------------------

<?php

$req = $bdd->prepare ('SELECT * FROM louer WHERE (date_fin < NOW())
VALUES ( :id_voitures, :id_clients, :date_debut, :date_fin )');
$req->bindParam(':id_voitures', $_POST['idv'],PDO::PARAM_INT);
$req->bindParam(':id_clients', $_POST['idc'],PDO::PARAM_INT);
$req->bindParam(':date_debut', $_POST['datedl'],PDO::PARAM_STR);
$req->bindParam(':date_fin', $_POST['datefl'],PDO::PARAM_STR);

$req->execute();
$query = $bdd->prepare('SELECT * FROM louer
INNER JOIN clients ON clients.id_clients = louer.id_clients
INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures
WHERE (date_fin < NOW())');
$query->execute();

?>

<main class="container">

        <div class="row">
            <section class="col-12">
                <h2 class="d-flex justify-content-center mt-5 pt-5">Retard de location :</h2><br />
                <table class="table">
                    <thead>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Date de retour initial</th>
                    </thead>
                    <tbody>
                        <?php
                        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($reponse as $produit){
                        ?>
                        <tr>
                            <td><?= $produit['nom_clients'] ?></td>
                            <td><?= $produit['prenom_clients'] ?></td>
                            <td><?= $produit['marque_voitures'] ?></td>
                            <td><?= $produit['nom_voitures'] ?></td>
                            <td><?= $produit['date_fin'] ?></td>
                        </tr>
                        <?php
            }
        ?>
                    </tbody>
                </table>
        </div>
</body>
</html>