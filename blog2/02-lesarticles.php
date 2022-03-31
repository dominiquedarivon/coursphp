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
// 3- Vérification du formulaire d'insertion
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
    /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
   
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);

    /* Je prépare ma requête avec des marqueurs pour l'instant vides */
    $insertion = $pdoBlog->prepare(" INSERT INTO articles (image, titre, contenu, auteur, date_parution) VALUES (:image, :titre, :auteur, :contenu, :date_parution) ");

    $insertion->execute(array(
        
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':auteur' => $_POST['auteur'],
        ':contenu' => $_POST['contenu'],
        ':date_parution' => $_POST['date_parution'],
        /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
    ));
}

// 3 -INITIALISATION DE DE LA VARIABLE CONTENU QUI VA NOUS SERVIR POUR LA SUITE 


// // 4- J'initialise ma variable $contenu qui va me servir par la suite
$contenu = "";

// 5- Suppression d'un élément
//jevar_dump($_GET);/* Vérification de ce que je récupère dans le get */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_articles'])) {
    //     // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id_blog" existe  aussi, alors je peux traiter la suppression de l'article demandé // Voir lien sur le bouton suppression

    $resultat = $pdoBlog->prepare(" DELETE FROM id_articles");/* Je prépare ma requête avec un marqueur vide  ':contenu'*/

    $resultat->execute(array(
        ':id_articles' => $_GET['id_articles']
    ));

    if ($resultat->rowCount() == 0) { /* ça signifie que je ne renvoi rien  donc ça n'a pas fonctionné*/
        $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'article n° ' . $_GET['id_articles'] . ' </div>';/* si ça n'a pas fonctionné j'affiche ça */
    } else {
        $contenu .= '<div class="alert alert-success">L\'artcile ' . $_GET['id_articles'] . ' a bien été supprimé </div>';/* sinon j'affiche ça */
    }/* ici je me sers de ma variable contenu qui était vide mais dans laquelle j'injecte désormais du contenu */
}
?>






<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> EXERCICE BLOG </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les articles</h1>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

        <section class="row">

            <div class="col-12">

                <h2> Tous les articles et ajout d'un nouvel article</h2>


                <div class="container bg-white mt-2 mb-2 m-auto p-2">
                    <section class="row">
                        <div class="col-12">
                            <h2>tous les articles</h2>
                        </div>

                        <?php
                    // 4- J'affiche un tableau avec les personnes travaillant à la direction, du salaire le plus élevé au salaire le plus bas
                    $requete = $pdoBlog->query("SELECT * FROM articles");
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


    <?php while ($ligne = $requete->fetch(PDO:: FETCH_ASSOC)) {   
        ?>     
                          <tr>
                                <td><?php echo $ligne['id_articles']; ?></td>
                                <td> <img src="<?php echo $ligne['image']; ?>" class = "img-fluid"> </img></td>
                                <td><?php echo $ligne['titre']; ?></td>
                                <td><?php echo $ligne['auteur']; ?></td>
                                <td><?php echo $ligne['contenu']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></td>
                                
                                <td> <a class=\"btn btn-primary\" href=\"03-infosarticle.php? id_articles=" . $ligne['id_articles'] ."\">Modif</a></td>
                                
                                <td> <a class=\"btn btn-primary\" href=\"03-infosarticle.php? id_articles=" . $ligne['id_articles'] ."\">Supprimer</a></td>
                                
                            </tr>
                       

                      <?php } ?>
                      
</tbody>
</table>

                    </section>


                          
                           
                


                        <div class="col-12 col-lg-10">
                            <h2 class="text-center mb-4">Ajout un article</h2>

                            <form action="#" method="POST"  enctype= multipart/form-date class="border bg-light p-2 rounded mx-auto">

                               

                                <div class="mb-3">
                                    <label for="image">image:</label>
                                    <input type="text" name="image" id="image" class="form-control" required>
                                </div><!-- image-->


                                <div class="mb-3">
                                    <label for="titre">titre:</label>
                                    <input type="text" name="titre" id="titre" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="titre">auteur:</label>
                                    <input type="text" name="auteur" id="auteur" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contenu">contenu:</label>
                                    <input type="text" name="contenu" id="contenu" class="form-control" required>
                                </div>


                                <div class="mb-3">
                                    <label for="contenu">date_parution:</label>
                                    <input type="text" name="date_parution" id="date_parution" class="form-control" required>
                                </div>



                                <button type="submit" class="btn btn-success" name="submit" id="submit">Ajouter un article</button>
                            </form>

                        </div>
                        <!-- fin col -->






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