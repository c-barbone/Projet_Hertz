<?php



    function transfert(){
        $ret        = false;
        $id_voitures = '';
        $nom_voitures = '';
        $marque_voitures = '';
        $image_voitures   = '';
        $description_voitures = '';
        $disponibilite = '';
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $image_voitures  = $_FILES['fic']['name'];
        $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', '');
        $image_voitures = file_get_contents ($_FILES['fic']['tmp_name']);
        $req = "INSERT INTO voitures (" . 
                                "image_voitures".
                                ") VALUES (" .
                                "'" . $image_voitures ."'";
                                
        $ret = mysql_query ($req) or die (mysql_error ());
        return true;
        }
    }
?>