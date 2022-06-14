<?php /* ICI MON CODE */

require('../inc/functions.php');

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP - Connexion à une page de donnéeLes array() </title>
</head>

<body>

    <?php
    $pdoDialogue = new PDO( /* PDO est un objet qui représente la connexion entre une page en PHP et une BDD */
        'mysql:host=localhost;
      dbname=dialogue',/* dans le premier argument on précise localhost et le nom de la BDD */
        'root',/* dans le deuxième argument on précise l'identifiant PHPMyAdmin */
        '',/* Dans le troisième argument on précise le mot de passe, vide pour le PC */
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )/* Ici, on précise comment on veut que les erreurs soient gérées et le jeu de caractères utilisé */
    );
    ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Connexion à une BDD dialoge </h1>
            <p class="lead">Dans cette page , nous allons nou connecter à la BDD et créer un formulaire qui, grâce à la superglobales $_POST enverra les infos en BDD. </p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

        <section class="row">

            <div class="col-12 col-md-6">

                <h2> Base de données "dialogue"</h2>
                <p>Notre BDD "dialogue" ne possède qu'une seule table commentaire.Cette table possède les champs suivants: </p>
                <p>PK primary key qui est le premier indice du tableau</p>


                <ul>


                    <li>id_commentaire INT PK AI </li>
                    <li>pseudo VARCHAR (255)</li>
                    <li>message TEXT</li>
                    <li>date_enregistrement DATETIME</li>


                </ul>

            </div>

            <div class="col-12 col-md-6">

                <h2>Exercices</h2>

                <p>Afficher le commentaire là ou le pseudo affiche Thimothée</p>


                <?php

                $requete = $pdoDialogue->query("SELECT * FROM commentaire WHERE pseudo='Thimothée'");/* Dans la variable $requete => je fais ma requete en SQL grâce à la fonction query().Cette dernière doit automatiquement s'appuyer sur ma variable dans laquelle j'ai placé les informations de connexion .*/
                jeprint_r($requete);/* je debug grâce à ma fonction je print_r */
               
                $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                // jeprint_r($ligne);

                echo '<ul> 

<li>Id :  ' . $ligne['id_commentaire'] . '</li>
<li>Pseudo :  ' . $ligne['pseudo'] . '</li>
<li>Message:  ' . $ligne['message'] . '</li>

 


</ul>'

                ?>

            </div>


<div class="col-12">

<p>Exercice: affichez tous les commentaires dans un tableau avec l'id dans une colonne, le pseudo dans une autre colonne et enfin le message dans la dernière colonne.</p>



<?php 

$requete = $pdoDialogue ->query("SELECT * FROM commentaire /*LIMIT 0,2*/");/* ICI je rentre ma requête dans ma variable $requete => je sélectionne tous les éléments qui se trouvent dans la table commentaire*/

/* Si on cherche à afficher 2 élément en sql il faut  écrire aisni :$requete = $pdoDialogue ->query("SELECT * FROM commentaire /*LIMIT 0,2)*/


echo "
<table class=\"table table-striped\">

<thead>
<tr>

<th>ID</th>
<th>Pseudo</th>
<th>Messsage</th>
<th>date_enregistrment</th>
</tr>

</thead>


<tbody>

";
/*Ici je fais echo de mon tableau en PHP=> j'ai l'ouverture ainsi que le thead de mon tableau */
while($ligne = $requete -> fetch(PDO:: FETCH_ASSOC)){
/*Grâce à ma boucle while (tant que) j'exécute le bloc de code TANT QUE j'ai des enregistrments qui correspondent à ma requête*/ 
echo "<tr>";
echo "<td>#" .$ligne['id_commentaire']."</td> ";
echo "<td>" .$ligne['pseudo']."</td> ";
echo "<td>" .$ligne['message']."</td> ";
echo "<td>".date('d/m/Y - H:i:s', strtotime($ligne['date_enregistrement']))."</td>";
echo"</tr>"; /*Je bouscle le message => ici quand on affiche la date sans la miodifier elle bient comme elle est dans PHP, en anglais. On utilise la fonction prédéfinbie date () afin de modifier son format . La fonction strtotime() (string to time) permet de dire que l'on veut qu'une chîne de caractères soit considérée comme un format date /heure */

}/*fin de la boucle*/


echo"
</tbody>
</table>
/*je ferme mon tableau*/
";/*Ici je dois fermer table */



?>


<p> Rajoutez  une colonne à votre tableau avec la notion de date d'enregistrement , Attention, pensez bien à regarder sur le doc de PHP pour le format data/heure</p>

<p>Affichez la liste de toutes les personnes qui ont écrit des commentaires ainsi que la date que le commentaire a été écrit dans une ol .</p>




<?php 


$requete = $pdoDialogue->query("SELECT pseudo, date_enregistrement FROM commentaire");

echo "<ol>";

while($ligne=$requete->fetch(PDO::FETCH_ASSOC)){

echo "<li>" .$ligne['pseudo']."".date('d/m/Y', strtotime($ligne['date_enregistrement']))."</li>";


}


echo "</ol>";


?>



<p>Comptez le nombre d'enregistrements dans une table</p>

<?php 


$requete = $pdoDialogue->query("SELECT *FROM commentaire"); /*Je selectionne tous les éléments qui se trouvent dans ma table commentaire*/



$nbrCommentaire  = $requete->rowCount(); /*ici je compte le nombre de rangées renvoyées par ma requetes*/

echo "<p> Il y a $nbrCommentaire commentaires dans la table .</p>"


/* Grâce à lafonction prédéfinie rowCount () on va pouvoir compter le nombre d'enregistrement qui correspondent à notre requête et ainsi vérifier quel navigateur récupère bien toutes les données */
?>

</div>

</section>

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