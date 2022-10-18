<?php 

// ------- ETAPE 1 - Création de la BDD sur PhpMyAdmin
/*
    Nom de la BDD : meubles
    Nom de la table : produit
        Colonnes : 
            id_produit      INT PK AI (PK = Primary Key, AI = Auto Increment)
            titre           VARCHAR(255)
            prix            FLOAT
            description     TEXT
            photo           VARCHAR(255)
    Moteur de stockage InnoDB
    Interclassement UTF8_general_ci
*/

// ------- ETAPE 3 - Création de la connexion à la BDD

try {
        $bdd = new PDO('mysql:host=localhost;dbname=meubles', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
    ]);
} catch (Exception $e) {
    die("ERREUR CONNEXION BDD : " . $e->getMessage());
}

// 4 - Initialisation des variables globales
$errorMessage = "";
$successMessage = "";

require_once "functions.php";