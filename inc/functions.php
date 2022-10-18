<?php

/**
 * Fonction DEV qui permet un affichage clair des données
 */
function debug($variable){
    echo "<pre>";
        print_r($variable);
    echo "</pre>";
}

