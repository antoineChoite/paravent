# paravent

Énoncé

Pas de répit pour les Prolosaures ! La mer étant à peine redescendue à son niveau normal, une nouvelle prophétie annonce la venue d'un ouragan.
Des vents violents venus de l'ouest emporteront tout ce qui sera exposé, mais ils seront interceptés par le relief montagneux, derrière lequel les
Prolosaures seront à l'abri de la catastrophe imminente.
Votre but est de déterminer la surface totale protégée par les montagnes.

Entrée
La première ligne est un entier n, la largeur du continent.
La ligne suivante contient n entiers h , …, h séparés par des espaces donnant les altitudes du terrain, d'ouest en est.
Le vent arrive de la gauche (de l'ouest) et lorsqu'il rencontre une montagne, toutes les terres qui sont plus à droite et de hauteurs inférieures à celle-ci
sont à l'abri.

Chaque altitude correspond à un terrain d'une unité de surface.

Sortie :
Un entier qui est la surface d'abri disponible.

Contraintes
1 ≤ n ≤ 100 000
0 ≤ h ≤ 100 000

Contraintes d'exécution
Utilisation mémoire maximum
2000 kilo-octets
Temps d'exécution maximum
500 millisecondes

Pour tester mon script PHP

entrez dans le repertoire src et modifier l'entrée via le fichier surface.txt

ensuite taper la commande : php Surface.php pour lancer le script et afficher la sortie
