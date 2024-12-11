<!DOCTYPE html>
<html>
<head>
    <title>Plateforme PREFAB - Accueil</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <header>
            <h1>PREFAB</h1>
            <nav>
                <a href="index.php">ACCUEIL</a>
                <a href="guide.html" target="_blank">GUIDE D'ANNOTATION</a>
                <a href="references.html" target="_blank">EN SAVOIR PLUS</a>
            </nav>
        </header>
        
        <main>
            <h2>Plateforme de visualisation d'annotations de corpus</h2>
            <p>PREFAB est un projet pluridisciplinaire ayant pour objectif d'aborder la thématique des phrases préfabriquées de l'oral et de l'écrit dans les interactions langagières. 
            Sur cette plateforme, sélectionnez un corpus pour visualiser le texte et les annotations faites dans le cadre de ce projet.</p>
            <br><br><div class="dropdown">
                <form method='get' action='view.php'>
                    <select name='file'>
                        <option value=''></option>
                        <?php
                        if (is_dir("data")) {
                            $doss = opendir("data");
                            while ($fichier = readdir($doss)) {
                                if (is_file("data/" . $fichier)) {
                                    $filename = pathinfo($fichier, PATHINFO_FILENAME);
                                    echo "<option value='$fichier'>$filename</option>";
                                }
                            }
                            closedir($doss);
                        }
                        ?>
                    </select>
                    <br><br><input type='submit' name='ok' value='SÉLECTIONNER'/>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

