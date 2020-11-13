<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">  	
    <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
    <title>location de voiture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '5a7ec6eccd8ac33aed09c7b2892d5032968b238e';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

</head>
<body>
       <center><img src="image/header-bg.jpg" class="img-fluid"></center>
       <a href="administration" target="_blank"> <button type="button" class="admin btn btn-danger">Espace Administration</button></a>
    <section id="services">
        <div class="container">
        <?php

// On inclut la connexion à la base
$bdd = new PDO('mysql:host=localhost;dbname=camilleb_projethertz;charset=utf8', 'camilleb', 'gSfF/JN1/Dzcmw==');


// On écrit notre requête
$sql = 'SELECT * FROM `voitures`';

// On prépare la requête
$query = $bdd->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$reponse = $query->fetchAll(PDO::FETCH_ASSOC);

?>
    <main class="container">

        <div class="row">
            <section class="col-12">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Modèle</th>
                        <th>Marque</th>
                        <th>Disponibilité</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($reponse as $produit){
                        ?>
                        <tr>
                            <td><?= $produit['id_voitures'] ?></td>
                            <td>

<aside class="profile-card">

  <header>

    <!-- here’s the avatar -->
      <img src="<?= $produit['image_voitures'] ?>">



  </header>

  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">

    <p><b><?= $produit['description_voitures'] ?></b></p>

  </div>



  </ul>

</aside>
<!-- that’s all folks! --></td>
                            <td><?= $produit['nom_voitures'] ?></td>
                            <td><?= $produit['marque_voitures'] ?></td>
                            <td><img src="<?= $produit['disponibilite'] ?>"</td>
                        </tr>
                        <?php
            }
        ?>
                    </tbody>
                </table>
        </div>
    </section>
</body>
</html>