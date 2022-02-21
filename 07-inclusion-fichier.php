<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le PHP - inclure des fichiers </title>
</head>

<body>


    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3"> </h1>
            <p class="lead">

        </div>
    </div><!-- fin de jumbotron -->



    <?php


    echo " <p>On ouvre le fichier header.inc.php</p>";

    include('inc/header.inc.php');

    echo "<p>Fin de notre fichier header.inc.php</p>";

    ?>

    <main class="container">

        <p>ici, nous avons inclus notre fichier header.inc.php qui contient le jumbotron grâce à la fonction PHP <code>include('')</code> cette fonction prendra comme seul argument le chemin de notre fichier.</p>


<?php include_once('inc/coucou.inc.php'); ?>


<p><code>include_once</code> s'appuie sur include et a donc les même actions a une différence près : lorsque l'on utilise cette fonction, le fichier visé ne peut être appelé qu'une seule fois dans la page.</p>


<h2>La propriété require ()</h2>

<?php require('inc/require.inc.php');

?>


<?php require_once('inc/require_once.inc.php');

?>

<h2>Différences entre include, require, include_once et require_once</h2>

<p>En français,  <em>include</em> signifiera plutôt " inclus moi ce fichier" et <em>require</em> signifiera "fichier requis"</p>

<p> S'il y a une erreur : </p>

<ol>

<li> <code>include()</code> fera une erreur mais poursuivra quand l'exécution du code</li>
<li> <code>require()</code> require fera une erreur et elle sera fatale : on arrête l'exécution du code.</li>
<li> <code>_once</code> fera l'erreur de son parent et il est présent pour s'assurer que le fichier n'est qu'une fois dans le code. </li>

</ol>



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