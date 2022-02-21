<?php

require('inc/functions.php');

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les array() </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les array() </h1>
            <p class="lead">Les tableaux- appelés array() en js comme en php sont extrèmement importants car ils permettent de conserver en mémoire plussieurs valeurs. </p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">


        <h2>A quoi ça sert?</h2>


        <p>On va pouvoir conserver plusieurs valeurs, c'est là la différence majeur avec une variable.</p>

        <h2>Exemple avec un tableau prédéfini</h2>

        <?php


        $prenom = "Nicolas, Juliette, Jasmine";
        echo "Bonjour $prenom";

        /* Dans un j'enregistre plusieurs valeurs */

        $listeprenoms = array("Grégoire", "Sidonie", "Éléonore");

        jeprint_r($listeprenoms);
        jevar_dump($listeprenoms);


        echo "Bonjour" . $listeprenoms[2];
        echo "<br>";
        echo "Coucou" . $listeprenoms[0];

        ?>


        <h2>Exemple avec un tableau non prédéfini</h2>


        <?php


        $listepays[]   = 'France';
        $listepays[]   = 'Angleterre';
        $listepays[]   = 'Espagne';
        $listepays[]   = 'Portugal';

        jevar_dump($listepays);


        echo "j'habite en" . $listepays[2];


        echo implode('<br>', $listepays);
        ?>

        <p> <code>implode</code> permet d'extraire les valeurs d'un tableau (array()) et cette fonction prédéfinie attend deux arguments : le premier le séparateur et le deuxième est l'array que nous voulons explorer.</p>


        <h2>Parcourir les tableaux grâce aux boucles</h2>

        <h3> La boucle for</h3>


        <?php


        $listefourniture = array('stylo', 'crayon de couleur', 'freutres', 'crayon de papier', 'surligneurs');


        jeprint_r($listefourniture);

        for ($i = 0; $i < sizeof($listefourniture); $i++) {
            echo $listefourniture[$i] . "<br>";
        }


        ?>

        <p>La fonction <code>sizeof()</code> ou encore l'autre fonction prédéfinie <code>count</code> permettent de connaître le nombre de clé ou d'indices qui se trouvent dans un tableau. Dans cet exemple, sizeof() a compté 5 indices dans le tableau et elui-là est donc parcouru 5 fois. </p>

        <p>Ici notre variable $i représente la clé ou l'indice du tableau => au premier tour $i représente l'indice 0(stylo) et il va évoluer pour représenter les défférentes indice de notre tabmeau. C'est la raison pour laquelle on devra passer entre crochet notre $i après notre $listefourniture : on explique au programme qu'on veut afficher l'élément correspondant à l'indice indiqué.</p>

        <p>Mais une autre boucle est encore plus adaptée à la lecture de tableau : c'est la boucle <code>foreach</code> car on ne sera pas obligé de lui fournir un numéro </p>

        <h3> La boucle foreach</h3>


        <ul>


            <?php

            // indiceTbealu c'est le premier élément du tableau et objetTableau deuxième élément pour le tableau 
            foreach ($listefourniture as $indiceTableau => $objetTableau) {

                echo " <li>$indiceTableau- $objetTableau </li>";
            }



            ?>

        </ul>



        <p>Dans la boucle foreache (et dans le echo), les éléments que nous avons nommés $indiceTableau et $objetTableau auraient très bien pu s'appeler $x et$y ou encore $piscine et$chlore : leur nom n'a pas d'importance . l'ordre représente en fait la manière dont le tableau va être parcouru : 1<sup> ère </sup> variable pour la colonne indice ou clé, 2 <sup>ème</sup> variable pour la colonne valeur.</p>



        <p>Le mot clé <code>as</code> et le symbole <code>=></code> sont quant à eux prédéfinis dans le langage PHP, il faut les respecter, c'est une règle de syntaxe losrque l'on utilise une boucle <code>foreach</code>. De plus, cette boucle est la plus pratuique pour les tableaux car elles s'arrête toute seule quand elle a fini de parcourir le tableau .</p>


        <h2>Les tableaux associatifs </h2>

        <p>Il est possible de choisir les clés d'un tableau array() plutôt que d'avoir une numérotation classique , nous appelerons ça un tableau associatif. </p>



        <?php


        $listecouleurs = ['j' => 'jaune', 'b' => 'bleu', 'v' => 'vert'];
        jevar_dump($listecouleurs);

        echo "Ma couleur préférée est le " . $listecouleurs['j'];

        ?>

        <p>Avec un tableau associatif, nous utiliserons les crochets avec l'indice que nous avons défini, si cet indice est une string, il faudra mettre des apostrophes ou guillemets. </p>


        <h2> Les tableaux multidimentionnels</h2>

        <p>Il est possible de créér des tableau à l'intérieur d'autres tableaux, grâce à une imbrication : c'est alors un tableau multidimentionnel</p>

        <?php

// les indices sont les chiffres de 0 à 2 et les prenoms et noms.

        $tabMulti = array(
            0 => array('prenom' => 'Justine', 'nom' => 'perinel'),
            1 => array('prenom' => 'léa', 'nom' => 'Dolo'),
            2 => array('prenom' => 'francois', 'nom' => 'holland')
        );

        jeprint_r($tabMulti);

        echo " <p>Bonjour Mme" .$tabMulti ['1'] ['nom']."</p>";

        ?>



<p>Ici on n'a pu afficher des informations venant d'un tableau Multidimentionnel grâce aux crochets : dans un premier couple de crochets on va mettre l'indice du tableau qui entoure toutes les infos (dans cet enexmple , l'indice est [1] puis dans le deuxième coupe de crochets , on vient mettre l'indice de l'info recherchée(ici l'indice était ['nom']).</p>





    </main>











    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>