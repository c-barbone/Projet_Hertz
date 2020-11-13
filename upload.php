 <!-- image/nom du fichier -->
 <?php 
 include('functions.php');
$target_dir = "voiture/";                               
$target_file = $target_dir . basename($_FILES["image_voitures"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["ajouter"])) {
  $check = getimagesize($_FILES["image_voitures"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["image_voitures"]["size"] > 500000) {
  echo "Désolé,votre fichier est trop grand.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé,les formats autorisés sont JPG, JPEG, PNG & GIF.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Désolé, votre fichier n'a pas été téléchargé.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image_voitures"]["tmp_name"], $target_file)) {
    $nomimg = $target_dir."".htmlspecialchars( basename( $_FILES["image_voitures"]["name"]));
    ajouterv($nomimg);
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["image_voitures"]["name"])). " a été téléchargé.";
    $delai=1;
			$url='http://localhost/hertz/administration.php';
			header("Refresh: $delai;url=$url");
  } else {
    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
  }
}
?>