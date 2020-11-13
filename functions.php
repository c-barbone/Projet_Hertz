<?php


// =======================================================================================================
    // <!-- connexion base  de données -->
// =======================================================================================================
function functionbdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=camilleb_projethertz;charset=utf8', 'camilleb', 'gSfF/JN1/Dzcmw==');
    return $bdd;
}


// =======================================================================================================
    // <!-- connexion Admin -->
// =======================================================================================================
function connexion(){
    // functionbdd();
    // Initialiser la session
    session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit(); 
    }
}
// =========================================PARTIE CLIENT=================================================
// -------------------------------------------------------------------------------------------------------


// =======================================================================================================
    // <!-- afficher liste véhicules -->
// =======================================================================================================
function listev(){
    $bdd=functionbdd();
    // On écrit notre requête
    $sql = 'SELECT * FROM `voitures`';

    // On prépare la requête
    $query = $bdd->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($reponse as $produit){
                   
    echo "<tr>
        <td>".$produit['id_voitures']."</td>
        <td><img src='".$produit['image_voitures']."'</td>
        <td>".$produit['nom_voitures']."</td>
        <td>".$produit['marque_voitures']."</td>
        <td>".$produit['description_voitures']."</td>
        <td><img src='".$produit['disponibilite']."'</td>
        </tr>";
                        
        }
        
}


// =====================================PARTIE ADMINISTRATION=============================================
// -------------------------------------------------------------------------------------------------------

// =======================================PARTIE VOITURE==================================================
// -------------------------------------------------------------------------------------------------------


// =======================================================================================================
    // <!-- Ajouter un véhicule -->
// =======================================================================================================
function ajouterv($ajoutimg){
        $bdd=functionbdd();
        if(isset($_POST['ajouter'])&&!empty($_POST['modele'])&&!empty($_POST['marque'])&&!empty($_POST['disponibilite'])){
        $req = functionbdd()->prepare('INSERT INTO voitures(id_voitures, image_voitures, nom_voitures, marque_voitures, description_voitures, disponibilite) VALUES(NULL, :image, :modele, :marque, :description, :disponibilite)');
        $req->execute(array(
        'image' => $ajoutimg,
	    'modele' => $_POST['modele'],
        'marque' => $_POST['marque'],
        'description' => $_POST['description'],
        'disponibilite' => $_POST['disponibilite'],));

        echo 'Le nouveau véhicule a été ajouté !';
        }
}


// =======================================================================================================
// <!-- Modifier un véhicule -->
// =======================================================================================================
function modifierv(){
    $bdd=functionbdd();
    $recuperation = $bdd->query('SELECT * FROM voitures');
    while ($voitures = $recuperation->fetch()) {
    echo " <form>
    <div>

    <input type='text' size='13' name='id' value='".$voitures['id_voitures']."'>
    <input type='text' name='modelev' value='".$voitures['nom_voitures']."'>
    <input type='text' name='marquev' value='".$voitures['marque_voitures']."'>
    <input type='text' name='descriptionv' value='".$voitures['description_voitures']."'>
    <input type='text' name='disponibilitev' value='".$voitures['disponibilite']."'>

    <button type='submit' class='btn btn-dark' value='modifier' name='modifier'>Modifier</button>
    <button type='submit' class='btn btn-danger' value='supprimer' name='supprime'>Supprimer</button>

    </form>
    </div>";
    }
    if(isset($_GET['modifier'])&&!empty($_GET['id'])&&!empty($_GET['modelev'])){
        $id=$_GET['id'];
        $req = $bdd->prepare('UPDATE voitures SET nom_voitures = :newmodele, marque_voitures = :newmarque, description_voitures = :newdescription, disponibilite = :newdisponibilite WHERE id_voitures= :id');
        $req->execute(array(
        'newmodele' => $_GET['modelev'],
        'newmarque' => $_GET['marquev'],
        'newdescription' => $_GET['descriptionv'],
        'newdisponibilite' => $_GET['disponibilitev'],
        ':id' => $id ));
        echo "la modification a été effectuée ";
        echo '<script language="Javascript">
        document.location.replace("administration.php");
        </script>';
        }
}


// =======================================================================================================
// <!-- Supprimer un véhicule -->
// =======================================================================================================
function supprimerv(){
    $bdd=functionbdd();
    if(isset($_GET['supprime'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
    $req = $bdd->prepare('DELETE FROM voitures WHERE id_voitures= :id');
    $req->execute(array(
    ':id' => $id ));
    echo "le véhicule a été supprimé.";
    echo '<script language="Javascript">
        document.location.replace("administration.php");
        </script>';
    }
}


// ======================================PARTIE FICHE CLIENTS=============================================
// -------------------------------------------------------------------------------------------------------


// =======================================================================================================
// <!-- Liste clients -->
// =======================================================================================================
function listec(){
    $bdd=functionbdd();
    // On écrit notre requête
    $sql = 'SELECT * FROM `clients`';

    // On prépare la requête
    $query = $bdd->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($reponse as $produit){
    echo "<tr>
        <td>".$produit['id_clients']."</td>
        <td>".$produit['nom_clients']."</td>
        <td>".$produit['prenom_clients']."</td>
        <td>".$produit['adresse_clients']."</td>
        <td>".$produit['cp_clients']."</td>
        <td>".$produit['ville_clients']."</td>
        </tr>";
        }       
}


// =======================================================================================================
// <!-- Ajouter un client -->
// =======================================================================================================
function ajouterc(){
    $bdd=functionbdd();
    if(isset($_POST['ajouter'])&&!empty($_POST['nom_clients'])&&!empty($_POST['prenom_clients'])&&!empty($_POST['adresse_clients'])){
    $req = $bdd->prepare('INSERT INTO clients(id_clients, nom_clients, prenom_clients, adresse_clients, cp_clients, ville_clients) VALUES(NULL, :nom, :prenom, :adresse, :cp, :ville)');
    $req->execute(array(
    'nom' => $_POST['nom_clients'],
	'prenom' => $_POST['prenom_clients'],
    'adresse' => $_POST['adresse_clients'],
    'cp' => $_POST['cp_clients'],
    'ville' => $_POST['ville_clients'], ));
    echo 'Le nouveau clients a été ajouté !';
    echo '<script language="Javascript">
    document.location.replace("client.php");
    </script>';
    }
    else{
    echo'Vous devez remplir tous les champs';
    }
    
}


// =======================================================================================================
// <!-- Modifier un client -->
// =======================================================================================================
function modifierc(){
    $bdd=functionbdd();
    $recuperation = $bdd->query('SELECT * FROM clients');
    while ($clients = $recuperation->fetch()) {
    echo " <form>
    <div>

    <input type='text' size='6' name='id' value='".$clients['id_clients']."'>
    <input type='text' size='12' name='nom' value='".$clients['nom_clients']."'>
    <input type='text' size='6' name='prenom' value='".$clients['prenom_clients']."'>
    <input type='text' name='adresse' value='".$clients['adresse_clients']."'>
    <input type='text' size='6' name='cp' value='".$clients['cp_clients']."'>
    <input type='text' name='ville' value='".$clients['ville_clients']."'>

    <button type='submit' value='modifier' class='btn btn-dark' name='modifier'>Modifier</button>
    <button type='submit' value='supprimer' class='btn btn-danger' name='supprime'>Supprimer</button>
    <button type='submit' value='historique'class='btn btn-warning' name='action' onclick='window.location.hash=\"historique\";'>Historique</button>
    </form>
    </div>";
    }
    if(isset($_GET['modifier'])&&!empty($_GET['id'])&&!empty($_GET['nom'])){
        $id=$_GET['id'];
        $req = $bdd->prepare('UPDATE clients SET nom_clients = :nom, prenom_clients = :prenom, adresse_clients = :adresse, cp_clients = :cp, ville_clients = :ville WHERE id_clients= :id');
        $req->execute(array(
        'nom' => $_GET['nom'],
        'prenom' => $_GET['prenom'],
        'adresse' => $_GET['adresse'],
        'cp' => $_GET['cp'],
        'ville' => $_GET['ville'],
        ':id' => $id));
        echo "la modification a été effectuée ";
        echo '<script language="Javascript">
        document.location.replace("client.php");
        </script>';
    }
}


// =======================================================================================================
// <!-- Supprimer un client -->
// =======================================================================================================
function supprimerc(){
    $bdd=functionbdd();
    if(isset($_GET['supprime'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
    $req = $bdd->prepare('DELETE FROM clients WHERE id_clients= :id');
    $req->execute(array(
    ':id' => $id ));
    echo "le client a été supprimé.";
    echo '<script language="Javascript">
        document.location.replace("client.php");
        </script>';
    }
}


// <!--===================================================================================================-->
// <!-- Historique Client Location -->
// <!--===================================================================================================-->
function historiquec(){
    $bdd=functionbdd();
    if(isset($_GET['action']) && $_GET['action']=="historique"){
    $nom_client = $_GET['nom'];
    $prenom_client = $_GET['prenom'];
    $client = $_GET['id'];
    $recup= $bdd->prepare('SELECT clients.id_clients, nom_clients, prenom_clients, marque_voitures, id_louer, date_debut, date_fin, voitures.id_voitures, nom_voitures
    FROM clients
    INNER JOIN louer ON clients.id_clients = louer.id_clients
    INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures WHERE clients.id_clients = :client');
    $recup->bindParam(':client', $client);
    $recup->execute();

    echo '<div class="container my-5">
    <h2 class=" text-center py-5"> Historique '.$nom_client.' '.$prenom_client.'</h2>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">Marque</th>
    <th scope="col">Modèle</th>
    <th scope="col">Début de Location</th>
    <th scope="col">Fin de Location</th>
    </tr>
    </thead>
    <tbody>';

    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['nom_voitures'].'</td><td>'.$donnees['marque_voitures'].'</td><td>'.$donnees['date_debut'].'</td><td>'.$donnees['date_fin'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    if(isset($_GET['action']) && $_GET['action']=="historique"){
    $nom_client = $_GET['nom'];
    $prenom_client = $_GET['prenom'];
    $client = $_GET['id'];
    $recup= $bdd->prepare('SELECT clients.id_clients, nom_clients, prenom_clients, marque_voitures, id_louer, louer.date_debut, louer.date_fin, voitures.id_voitures, nom_voitures
    FROM clients 
    INNER JOIN louer ON clients.id_clients = louer.id_clients
    INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures WHERE (louer.date_fin >= NOW()) AND clients.id_clients = :client');
    $recup->bindParam(':client', $client);
    $recup->execute();

    echo '<div class="container my-5">
    <h2 class=" text-center py-5"> Historique des véhicules en cours de location</h2>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">Marque</th>
    <th scope="col">Modèle</th>
    <th scope="col">Début de Location</th>
    <th scope="col">Fin de Location</th>
    </tr>
    </thead>
    <tbody>';

    
    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['nom_voitures'].'</td><td>'.$donnees['marque_voitures'].'</td><td>'.$donnees['date_debut'].'</td><td>'.$donnees['date_fin'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    if(isset($_GET['action']) && $_GET['action']=="historique"){
    $nom_client = $_GET['nom'];
    $prenom_client = $_GET['prenom'];
    $client = $_GET['id'];
    $recup= $bdd->prepare('SELECT clients.id_clients, nom_clients, prenom_clients, marque_voitures, id_louer, louer.date_debut, louer.date_fin, voitures.id_voitures, nom_voitures
    FROM clients 
    INNER JOIN louer ON clients.id_clients = louer.id_clients
    INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures WHERE (louer.date_fin <= NOW()) AND clients.id_clients = :client');
    $recup->bindParam(':client', $client);
    $recup->execute();

    echo '<div class="container my-5">
    <h2 class=" text-center py-5"> Véhicule en retard</h2>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">Marque</th>
    <th scope="col">Modèle</th>
    <th scope="col">Début de Location</th>
    <th scope="col">Fin de Location</th>
    </tr>
    </thead>
    <tbody>';

    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['nom_voitures'].'</td><td>'.$donnees['marque_voitures'].'</td><td>'.$donnees['date_debut'].'</td><td>'.$donnees['date_fin'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    
    
}

// ===========================================PARTIE LOCATION=============================================
// -------------------------------------------------------------------------------------------------------


// <!--===================================================================================================-->
// <!--     Historique de Location -->
// <!--===================================================================================================-->
   function historiquel(){
$bdd=functionbdd();
    $query = $bdd->prepare('SELECT * FROM CLIENTS
  INNER JOIN louer ON clients.id_clients = louer.id_clients
  INNER JOIN voitures ON louer.id_voitures = voitures.id_voitures');


// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$reponse = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($reponse as $produit){
        
    echo "<tr>
        <td>".$produit['nom_clients']."</td>
        <td>".$produit['prenom_clients']."</td>
        <td>".$produit['adresse_clients']."</td>
        <td>".$produit['cp_clients']."</td>
        <td>".$produit['ville_clients']."</td>
        <td>".$produit['nom_voitures']."</td>
        <td>".$produit['marque_voitures']."</td>
        <td>".$produit['date_debut']."</td>
        <td>".$produit['date_fin']."</td>
    </tr>";
   
    }
} 


// <!--===================================================================================================-->
// <!--     Retard de Location -->
// <!--===================================================================================================-->
function retardl(){
    $bdd=functionbdd();
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
    
    $query = $bdd->prepare('SELECT * FROM retour
    INNER JOIN clients ON clients.id_clients = retour.id_clients
    INNER JOIN voitures ON retour.id_voitures = voitures.id_voitures
    WHERE (date_fin < NOW())');
    $query->execute();
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($reponse as $produit){
                
                        echo "<tr>
                            <td>".$produit['id_retour']."</td>
                            <td>".$produit['nom_clients']."</td>
                            <td>".$produit['prenom_clients']."</td>
                            <td>".$produit['nom_voitures']."</td>
                            <td>".$produit['marque_voitures']."</td>
                            <td>".$produit['date_fin']."</td>
                         </tr>";
                            
                         if(isset($_GET['supprimer'])&&!empty($_GET['id_louer'])){
                            $id=$_GET['id_louer'];
                            $req = $bdd->prepare('DELETE FROM louer WHERE id_louer= :id');
                            $req->execute(array(
                            ':id' => $id
                            ));
                            echo "le véhicule a été supprimé.";
                            }         
                        }
}


// <!--===================================================================================================-->
// <!--     Ajouter une Location -->
// <!--===================================================================================================-->
function ajouterl(){
    $bdd=functionbdd();
    if(isset($_POST['ajouter'])&&!empty($_POST['idc'])&&!empty($_POST['idv'])&&!empty($_POST['datedl'])&&!empty($_POST['datefl'])){
    
        $req = $bdd->prepare ('INSERT INTO louer (id_voitures, id_clients, date_debut, date_fin)
        VALUES ( :idv, :idc, :date_debut, :date_fin )');
        $req->bindParam(':idv', $_POST['idv'],PDO::PARAM_INT);
        $req->bindParam(':idc', $_POST['idc'],PDO::PARAM_INT);
        $req->bindParam(':date_debut', $_POST['datedl'],PDO::PARAM_STR);
        $req->bindParam(':date_fin', $_POST['datefl'],PDO::PARAM_STR);

        $req->execute();

    $req = $bdd->prepare ('INSERT INTO retour (id_voitures, id_clients, date_debut, date_fin)
                VALUES ( :idv, :idc, :date_debut, :date_fin )');
                $req->bindParam(':idv', $_POST['idv'],PDO::PARAM_INT);
                $req->bindParam(':idc', $_POST['idc'],PDO::PARAM_INT);
                $req->bindParam(':date_debut', $_POST['datedl'],PDO::PARAM_STR);
                $req->bindParam(':date_fin', $_POST['datefl'],PDO::PARAM_STR);

                $req->execute();
                echo '<script language="Javascript">
                document.location.replace("location.php");
                </script>';
    }
    
}


// <!--===================================================================================================-->
// <!--     Retour Location -->
// <!--===================================================================================================-->
function retourl(){
    $bdd=functionbdd();
    $recuperation = $bdd->query('SELECT * FROM CLIENTS
    INNER JOIN retour ON clients.id_clients = retour.id_clients
    INNER JOIN voitures ON retour.id_voitures = voitures.id_voitures WHERE (date_fin < NOW())');
    while ($voitures = $recuperation->fetch()) {
    echo " <form>
    <div>

    <input type='text' size='6' name='id' value='".$voitures['id_retour']."'>
    <input type='text' name='modelev' value='".$voitures['nom_clients']."'>
    <input type='text'  name='marquev' value='".$voitures['prenom_clients']."'>
    <input type='text' size='6' name='descriptionv' value='".$voitures['nom_voitures']."'>
    <input type='text' size='6' name='disponibilitev' value='".$voitures['marque_voitures']."'>
    <input type='text' name='disponibilitev' value='".$voitures['date_fin']."'>

    <button type='submit' class='btn btn-success' value='supprimer' name='suppr'>Véhicule retourner</button>

    </form>
    </div>";
    }
    if(isset($_GET['suppr'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
    $req = $bdd->prepare('DELETE FROM retour WHERE id_retour= :id');
    $req->execute(array(
    ':id' => $id
    ));
    echo "le véhicule à bien était retourner";
    echo '<script language="Javascript">
            document.location.replace("location.php");
            </script>';
    }
}
?>

