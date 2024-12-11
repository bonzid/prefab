<?php
if (isset($_GET['file'])) {
    $xmlFile = "data/" . $_GET['file'];

    if (is_file($xmlFile)) {
        //En-tête pour spécifier que c'est un document XML
        header('Content-Type: application/xml');
        
        //Lecture et affichage du contenu du fichier XML
        readfile($xmlFile);
        
    } else {
        // Si le fichier XML est inexistant, erreur
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<error>Fichier XML inexistant.</error>';
    }
} else {
    //Si aucun fichier spécifié, erreur
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<error>Aucun fichier spécifié.</error>';
}
?>
