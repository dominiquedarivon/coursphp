<?php
// 1- Méthodes de debug
require('inc2/functions.php');

// 2- Connexion à la BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

?>

<!doctype html>
<html lang="fr">

<head>      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> EXERCICE BLOG </title>
</head>

<body>



    <div class="p-5 bg-light">

        <div class="container">
            <h1 class="display-3">ACCUEIL</h1>

        </div>
    </div><!-- fin de jumbotron -->


    <main class="container">

        <section class="row">

            <div class="col-12">

                <h2> Afficher 5 articles les plus récents</h2>


                <div class="container bg-white mt-2 mb-2 m-auto p-2">
                    <section class="row">
                        <div class="col-12">
                            <h2>les 5 articles récents</h2>
                        </div>
                        <?php
                    // 4- J'affiche un tableau avec les personnes travaillant à la direction, du salaire le plus élevé au salaire le plus bas
                    $requete = $pdoBlog->query("SELECT * FROM articles ORDER BY date_parution DESC LIMIT 0,5");
                    ?>

 
<table class=\"table table-striped\">
    <thead>
        <tr>
            <th>id_articles</th>
            <th>image</th>
            <th>titre</th>
            <th>auteur</th>
            <th>contenu</th>
            <th>date_parution</th>
                    </tr>
    </thead>

    <tbody> 
  
                        
                    <?php while ($ligne = $requete->fetch(PDO:: FETCH_ASSOC)) { /* Grâce à la boucle while (tant que ) j'éxecute le bloc de code TANT QUE j'ai des enregistrements qui correspondent à ma requête */?>
                        
                            <tr>
                                <td><?php echo $ligne['id_articles']; ?></td>
                                <td> <img src="<?php echo $ligne['image']; ?>" class = "img-fluid"> </img></td>
                                <td><?php echo $ligne['titre']; ?></td>
                                <td><?php echo $ligne['auteur']; ?></td>
                                <td><?php echo $ligne['contenu']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></td>
                            </tr>
                        <?php } ?> <!-- fermeture de la boucle -->
                        

</tbody>
</table>
                        

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