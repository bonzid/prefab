<!DOCTYPE html>
<html>
<head>
    <title>Plateforme PREFAB - Visualisation de fichier</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Charger les données depuis traitement_xml.php
        $.getJSON('traitement_xml.php?file=<?php echo urlencode($_GET['file']); ?>', function(data) {
            if (data.error) {
                console.error('Erreur:', data.error);
                return;
            }

            // Remplir les options des listes déroulantes
            var types = [];
            var declenchements = [];
            var portees = [];
            var modes = [];

            data.forEach(function(item) {
                if (!types.includes(item.type)) {
                    types.push(item.type);
                    $('#type').append('<option value="' + item.type + '">' + item.type + '</option>');
                }

                if (!declenchements.includes(item.declench)) {
                    declenchements.push(item.declench);
                    $('#declenchement').append('<option value="' + item.declench + '">' + item.declench + '</option>');
                }

                if (!portees.includes(item.portee)) {
                    portees.push(item.portee);
                    $('#portee').append('<option value="' + item.portee + '">' + item.portee + '</option>');
                }

                if (!modes.includes(item.mode)) {
                    modes.push(item.mode);
                    $('#mode').append('<option value="' + item.mode + '">' + item.mode + '</option>');
                }
            });
        });
    });
    </script>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <header>
            <h1>PREFAB</h1>
            <nav>
                <a href="index.php">ACCUEIL</a>
                <a href="guide.html" target="_blank">GUIDE D'ANNOTATION</a>
                <a href="references.html">EN SAVOIR PLUS</a>
            </nav>
        </header>
        
        <aside>
            <div class="filters">
                <h3>Filtres</h3>
                <form method="get" action="view.php">
                    <label for="type">TYPE</label>
                    <select name="type" id="type"></select>
                    <br>
                    <label for="declenchement">DECLENCHEMENT</label>
                    <select name="declenchement" id="declenchement"></select>
                    <br>
                    <label for="portee">PORTEE</label>
                    <select name="portee" id="portee"></select>
                    <br>
                    <label for="mode">MODE</label>
                    <select name="mode" id="mode"></select>
                    <br>
                    <label for="geste">GESTE</label><br>
                    <input type="checkbox" name="geste" value="avec" id="avec"><label for="avec">Avec</label>
                    <input type="checkbox" name="geste" value="sans" id="sans"><label for="sans">Sans</label>
                    <br><br>
                    <label for="extralinguistique">SITUATION EXTRALINGUISTIQUE</label><br>
                    <input type="checkbox" name="extralinguistique" value="avec" id="avec_ext"><label for="avec_ext">Avec</label>
                    <input type="checkbox" name="extralinguistique" value="sans" id="sans_ext"><label for="sans_ext">Sans</label>
                    <input type="submit" value="Appliquer">
                </form>
            </div>
        </aside>
        
        
        
        <main>
            <?php
            if (isset($_GET['file'])) {
                $filename = pathinfo($_GET['file'], PATHINFO_FILENAME);
                $xmlFilePath = "data/" . $_GET['file'];
                
                if (is_file($xmlFilePath)) {
                    echo "<h2>Corpus sélectionné : $filename</h2>";
                    echo "<div class='metadata-container'>";
                    
                    //Ici on ajoute des infos supplémentaires sur les corpus "à la main" (conditions, si fichier sélectionné = x, on affiche y).
                    
                    //Affichage des métadonnées pour aperitif_chat
                    if ($filename==="aperitif_chat") {
                        echo "<p class='metadata'><b>Date de collecte :</b> novembre 2009</p>";
                        echo "<p class='metadata'><b>Durée :</b> 31min55</p>";
                        echo "<p class='metadata'><b>Nombre de locuteurs :</b> 4</p>";
                        echo "<p class='metadata'><b>Transcripteurs :</b> J. Triburce et S. Ibnelkaid</p>";
                        echo "<p class='metadata'><b>Date des annotations :</b> juillet 2024</p>";
                        echo "<p class='metadata'><b>Annotateurs :</b> -</p>";
                        echo "<p class='metadata'><a href='http://clapi.ish-lyon.cnrs.fr/V3_Feuilleter.php?num_corpus=107' target='_blank'>Plus d'informations sur ce corpus</a></p>";
                    
                    //Affichage des métadonnées pour Fromagerie
                    } elseif ($filename==="fromagerie") {
                        echo "<p class='metadata'><b>Date de collecte :</b> novembre 2014</p>";
                        echo "<p class='metadata'><b>Durée :</b> 3h2min22</p>";
                        echo "<p class='metadata'><b>Nombre de locuteurs :</b> 39</p>";
                        echo "<p class='metadata'><b>Transcripteurs :</b> J. Triburce et E. Chernyshova</p>";
                        echo "<p class='metadata'><b>Date des annotations :</b> juillet 2024</p>";
                        echo "<p class='metadata'><b>Annotateurs :</b> -</p>";
                        echo "<p class='metadata'><a href='http://clapi.ish-lyon.cnrs.fr/V3_Feuilleter.php?num_corpus=110' target='_blank'>Plus d'informations sur ce corpus</a></p>";
                    }
                    
                    //Affichage des métadonnées pour (autre corpus)
                    //...
                    
                    //Affichage des métadonnées pour (autre corpus)
                    //...
                    
                    //Affichage des métadonnées pour (autre corpus)
                    //...
                    
                    //Affichage des métadonnées pour (autre corpus)
                    //...
                    
                    
                    echo "</div><br>"; //On ferme la boîte "métadonnées" 
                    
                   //On fait écho au script "traitement_xml" qui va intépreter le fichier XML sélectionné
                    echo "<iframe src='traitement_xml.php?file=" . urlencode($_GET['file']) . "' width='100%' height='800px' style='border: none;'></iframe>";
                } else {
                    echo "<p>Fichier $filename inexistant</p>";
                }
            } else {
                echo "<p>Aucun fichier sélectionné.</p>";
            }
            ?>
        </main>
    </div>


</body>
</html>

