# Guide d'utilisation du site Prefab

## Page d'accueil

Sur cette page, vous pouvez accéder à toutes les autres pages de la plateforme. Pour visualiser un corpus, nous vous invitons à le sélectionner dans la liste déroulante et à cliquer sur le bouton “Sélectionner”. Cela vous mènera à la page de visualisation de corpus. 


## Guide d'annotation

Vous trouverez sur cette page diverses explications liées aux annotations ayant été faites sur les corpus dans le cadre du projet PREFAB. Ce guide inclut notamment l’explication des différents filtres disponibles sur la page de visualisation de corpus.


## Page de visualisation

Sur cette page, vous pouvez voir quel corpus a été sélectionné ainsi que diverses informations sur ce corpus (métadonnées). Le corpus annoté se trouve dans un cadre avec l’intégralité des PPI indiquées en gras. Les PPI surlignées en jaune sont celles répondant aux critères données par l’utilisateur selon les filtres, se trouvant à gauche de la page. Par défaut, les filtres sont vides donc lorsque vous ouvrez la page pour une première fois, toutes les PPI sont à la fois en gras et surlignées en jaune. 

Pour utiliser les filtres sur la page de visualisation, vous pouvez sélectionner les critères qui vous intéressent dans les listes déroulantes ou dans les cases à cocher. En cliquant sur “Appliquer”, vous appliquez les filtres données et actualisez automatiquement le cadre où se trouve le corpus annoté. Ainsi, vous pouvez toujours voir toutes les PPI (en gras) et celles répondant à vos critères (surlignées en jaune). 
Pour retirer les filtres, vous pouvez soit actualiser la page, soit retirer manuellement les filtres (option vide des listes déroulantes et décocher les cases cochées). 


## Ajouter un corpus 
Nous allons modifier les fichiers XML et CSS du corpus à ajouter sur la plateforme. Nous vous conseillons donc vivement de conserver une copie des fichiers annotés originaux.


### 1- Modification du fichier XML.
Pour afficher les locuteurs, ouvrir le fichier XML dans un éditeur. Avec oXygen XML Editor, faire un clic droit sur le texte > "Refactorisation" > "Attributs" > "Convertir un attribut en élément". 
Dans la nouvelle boîte de dialogue, inscrire l'élément parent "Turn" et l'attribut "speaker". Le nouvel élément sera "Locuteur". Terminer la conversion. 

Avec un Rechercher/Remplacer avec Ctrl+F, remplacer la chaîne de caractères "spk" par "Locuteur". 


### 2- Modification du fichier CSS. 
Cette modification est, pour le moment, manuelle. Elle va permettre une meilleure visibilité du fichier sur la plateforme avec notamment l'affichage du "nom" du locuteur. Voici ce que devrait contenir le CSS de votre fichier XML : 

Turn {
    display: block;
    color: black;
    width: 100%;
    margin-top : 3%;
}

/* Couleur des commentaires */
Commentaire {
    color: white
}


/*Mettre le locuteur en gras*/
Locuteur {
    font-weight: bold;
}

Locuteur::after {
    content: " : ";
}



### 2- Modification des chemins dans le fichier XML. 
Dans les premières lignes de votre fichier XML, modifier les chemins de fichier vers le CSS et la DTD : data/CSS/nomdevotrefichier.css et data/dtd/nomdevotrefichier.dtd. 
Cela devrait ressembler à : 

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE Trans SYSTEM "data/dtd/[...].dtd">
<?xml-stylesheet type="text/css" href="data/CSS/[...].css"?>


### 3- Se rendre dans le dossier "data" et y déposer votre fichier XML. Dans le dossier "CSS", déposer le fichier CSS du fichier. Dans le dossier "dtd", déposer le fichier DTD du fichier.


### 4- (optionnel) Pour afficher les métadonnées du corpus lorsque celui-ci est sélectionné, il faut ajouter manuellement ses informations dans le fichier "view.php". Après un commentaire "//Affichage des métadonnées pour (autre corpus)", remplacer le commentaire "//..." avec le texte ci-dessous, en modifiant les informations entre # :

} elseif ($filename==="#NOM_DU_CORPUS#") {
	echo "<p class='metadata'><b>Date de collecte :</b> #date#</p>";
	echo "<p class='metadata'><b>Durée :</b> #durée#</p>";
	echo "<p class='metadata'><b>Nombre de locuteurs :</b> #nb loc#</p>";
	echo "<p class='metadata'><b>Transcripteurs :</b> #transcripteurs#</p>";
	echo "<p class='metadata'><b>Date des annotations :</b> #date#</p>";
	echo "<p class='metadata'><b>Annotateurs :</b> #annotateurs#</p>";
	echo "<p class='metadata'><a href='#LIEN_CLAPI_CORPUS#' target='_blank'>Plus d'informations sur ce corpus</a></p>";
}