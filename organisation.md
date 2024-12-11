# Organisation de la plateforme

Cette plateforme nécessite PHP pour fonctionner. Vous trouverez dans le dossier de la plateforme plusieurs autres dossiers : 
data, où se trouve les corpus annotés (fichiers XML) et deux autres dossiers (CSS et dtd pour y placer les fichiers liés aux fichiers XML).
fonts : un dossier contenant les différentes polices d’écriture utilisées par la plateforme
images : un dossier contenant les images utilisées par la plateforme 
js, où se trouve le fichier jquery

Pour ce qui est des fichiers : 

- guide.html : il s’agit de la page “Guide d’annotation” 
- index.php : il s’agit de la page d’accueil
- references.html : il s’agit de la page “En savoir plus”
- style.css : il s’agit de la feuille de style pour toutes les pages de la plateforme
- traitement_xml.php : sert à récupérer des informations sur un fichier XML sélectionné et à charger le contenu du document dans la page view.php
- view.php : il s’agit de la page de visualisation de corpus et fait notamment appel au script traitement_xml.php pour récupérer des informations et le contenu d’un fichier XML sélectionné. 

## Fonctionnement global : 

La page d’accueil index.php récupère le nom des fichiers XML présents dans le dossier data et les inclut dans sa liste déroulante.
En sélectionnant un fichier, la page view.php appelle au script traitement_xml.php pour récupérer toutes les valeurs des attributs des PPI (type, déclenchement, portée, mode) pour constituer les options des filtres. 
La page view.php appelle au script traitement_xml.php également pour charger le contenu du fichier XML dans un cadre.
A chaque fois qu’une série de filtres est soumise par l’utilisateur, view.php fait encore une fois appel au script traitement_xml.php qui va formuler une requête et récupérer les PPI filtrées, et recharger le contenu du cadre.


- NB

Il y a, notamment dans view.php, traitement_xml.php et style.css, des morceaux de script pour afficher une infobulle avec toutes les informations d’une PPI lorsque celle-ci est survolée par la souris. Cependant, aucune info bulle ne s’affiche actuellement sur la plateforme lors d’un survol de souris. Cette fonctionnalité n’est pas opérationnelle mais n’interfère pas avec le bon fonctionnement de la plateforme. 
