Les indexes sont stockés dans les fichiers *.index, chaque ligne correspond à une image selon l'ordre de 'index.txt'.

Les distances sont stockées dans les fichiers *.dist, chaque ligne contient les distances d'une image à toutes les autres, selon l'ordre de 'index.txt'. Notez que la matrice est symétrique.

Edge.java est le même que Sobel.java, le nouveau nom est juste plus parlant..


Les scripts *.sh permettent de créer les fichiers *.index.

La classe Distance calcule la distance entre les images deux à deux pour un index donné en argument. La matrice de distance est écrite sur la sortie standard.

ex: java Distance edge.index > edge.dist

