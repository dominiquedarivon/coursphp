<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les fonctions prédéfinies </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les fonctions prédefinies</h1>
            <p class="lead">Les  fonction predefinies sont des morceaux de code permettant d'automatiser un traitement ou de donner un affichage particulier. PHP possède plusieurs mots clés et fonctions déjà existantes dans le langage, nous pourrons les retrouver dans la doc officielle.</p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">


<div class="col-12">


<h2 class="tex-center"> La fonction date </h2>


<p>Lorsque vou voyez un mot clé en anglais (qui n'est pas le votre) suivi de parenthèses , c'est qu'il s'agit d'une fonction PHP prédéfinie.</p>


<?php /* ICI MON CODE */


echo "<p class=\"alert alert-success\">Date du jour:".date('d-m-Y')."</p>";

?>

<p> La fonction date permet donc d'afficher la date du jour avec les arguments suivants:</p>

<ul>

<li>d: day (jour)</li>
<li>m: month (mois)</li>
<li>Y: Year (année)</li>

</ul>


<p> Le fait de mettre les arguments en monuscule ou en majuscule à une incidence sur le résultat : essayez ! un argument , aussi appelé paramètres, est un information entrante dans la fonction </p>



<h2 class="tex-center">2 - strlen</h2>

<?php  

$phrase ="je n\'ai pas d\'inspi !";

echo strlen($phrase);


?>

<p> strlen () est une fonction prédéfinie permettant de retourner le nombre de carectères d'une string ( strlen = string lengh = longuer chaine de caractère).</p>

<p>Nous lui fournissons en argument une chaîne de caractère à analyser. La valeur retournée est soit un integer (nombre entier) soit un booléen FALSE => </p>


<p>Cas d'utilisation : cela pourra être  pratique quand nous souhaitons connaitre le nombre de caractère dans un pseudo par exemple ou encore dans un mot de passe qui nous est transmis lors de l'inscription.</p>

<h2 class="tex-center"> 3- substr</h2>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nulla et laudantium laborum, ipsam magni quidem possimus temporibus? Et necessitatibus sapiente id, modi iure soluta aliquid natus qui fuga dolor.</p>

<?php 

$texte ="
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nulla et laudantium laborum, ipsam magni quidem possimus temporibus? Et necessitatibus sapiente id, modi iure soluta aliquid natus qui fuga dolor.</p>";

echo substr($texte, 0, 20) ."<a href=\"\"> Lire la suite ...</a>";


?>

<p>La fonction prédéfinie sbstr () attend trois arguments :</p>

<ul>
<li>La chaine de carctères que l'on souhaite couper</li>
<li>La position de début (integer)</li>
<li>La position de fin (integer)</li>

</ul>

<p> dans le cas présent, nous lui demandons d'afficher seulement les 20 premiers caractères; sbstr () est souvent utilisé sur le web dans le cas des phrases d'accroche sur des articles de presse. Pour ne pas couper en plein milieu d'un mot . Il existe d'autres fonctions prédéfinies.</p>



<h2 class="text-center">4- isset</h2>

<?php 


$pseudo = 'jujupf93';

if (isset($pseudo))

{
echo'<p class="alert alert-success"> La variable $pseudo existe !</p>';

}else

{

echo '<p class="alert alert-success"> La variable $pseudo n\'existe pas !</p>';

}

?>

<p>La fonction prédéfinie isset() n'attend qu'un argument : la variable que l'on souhaite tester . Elle renvoie TRUE si la variable existe et FALSE dans le cas contraire.</p>

</div>





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