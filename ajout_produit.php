<?php 

// ###### Etape 1 - Inclusion du fichier init.php
require_once "./inc/init.php";

// ###### Etape 5 - Traiter les données du formulaire
if (!empty($_POST)) {
    // debug($_POST);
    // ------- Récupération des données du formulaire 
    // ------- Vérification des données reçu dans le formulaire
    if (empty($_POST['titre'])) {
        $errorMessage .= "Le titre est obligatoire <br>";
    }
    if (empty($_POST['prix'])) {
        $errorMessage .= "Le prix est obligatoire <br>";
    }
    if (empty($_POST['description'])) {
        $errorMessage .= "La description est obligatoire <br>";
    } 
    if (empty($_POST['photo'])) {
        $errorMessage .= "La photo est obligatoire <br>";
    } 
    // ------- Gestion récupération de l'upload de la photo
    $photo = ''; 
    if (!empty($_FILES['photo']['name'])) {
        // debug($_FILES);
        $photo = $_FILES['photo']['name']; 
        copy($_FILES['photo']['tmp_name'], "./photos/$photo"); 
    }
    // ------- Insertion des données
    if(empty($errorMessage)){
        $requete = $bdd->prepare("INSERT INTO produit(titre, prix, description, photo) VALUES (:titre, :prix, :description, :photo)");    
        $success = $requete->execute([
        ':titre' => $_POST['titre'],
        ':prix' => $_POST['prix'],
        ':description' => $_POST['description'],
        ':photo' => $photo
        ]);
        if ($success == true) {
        $successMessage = "Bravo le produit '$_POST[titre]' est bien enregistré";
        } else {
        $errorMessage = "Erreur lors de l'enregistrement";
        }
    }
}

// ------- ETAPE 2 - CREATION DU FORMULAIRE HTML

// AJOUT DU HEADER EN PHP
$title = "Ajout produit";
require_once "./inc/header.php";
?>

<!-- CREATION DU FORMULAIRE -->
<div class="container">

    <!-- TITRE -->
    <h1 class="text-center mt-5">Ajouter un Produit</h1>

    <!-- MESSAGE DE SUCCES -->
    <?php require_once "./inc/messages.php" ?>

    <form action="#" class="col-6 mx-auto" method="post" enctype="multipart/form-data">
        
        <label for="titre" class="form-label">Titre</label>            
        <input type="text" class="form-control" id="titre" name="titre">

        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">

        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">

        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">

        <button class="d-block mx-auto btn btn-primary mt-3">Enregistrer</button>

    </form>

</div>

<!-- AJOUT DU FOOTER EN PHP -->
<?php
require_once "./inc/footer.php";