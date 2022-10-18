<?php

// ############ TRAITEMENT PHP ############

// ###### ETAPE 1 - Inclusion du fichier init.php qui contient notre connexion à la BDD
require_once "./inc/init.php";

// ###### ETAPE 2 - Récupération des données 
$resultat = $bdd->query("SELECT * FROM produit ORDER BY id DESC");
// debug($resultat);

// ############ TRAITEMENT HTML ############ 

// AJOUT DU HEADER EN PHP
$title = "Boutique";
require_once "./inc/header.php";
?>
<!-- CREATION DU FORMULAIRE -->
<div class="container">

    <!-- TITRE -->
    <h1 class="text-center">Boutique</h1>

    <!-- Affichage des utilisateurs dans un tableau -->
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <!-- Affichage dynamique des données -->
            <?php while($contact = $resultat->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td><?= $contact['id'] ?></td>
                    <td><?= $contact['titre'] ?></td>
                    <td><?= $contact['prix'] ?></td>
                    <td><?= $contact['description'] ?></td>
                    <td>
                        <img src="./photos/<?= $contact['photo'] ?>" alt="">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <!-- <tfoot></tfoot> -->
    </table>
</div>

<!-- AJOUT DU FOOTER EN PHP -->
<?php
require_once "./inc/footer.php";

