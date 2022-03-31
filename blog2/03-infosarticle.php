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
            <h1 class="display-3">les infos</h1>

        </div>
    </div><!-- fin de jumbotron -->


    <main class="container">
        <!-- 1ere section -->
        <section class="row">

            <div>
                <?php

                if (isset($_GET['id_articles'])) {  /* On vérifie que l'id du commentaire existe dans otre BDD si il y est alors on éxécute le code ci-dessous */
                    $result = $pdoBlog->prepare("SELECT * FROM id_articles");

                    $result->execute(array(
                        ':id_articles' => $_GET['id_articles'] /* on associe :id_commentaire ) l'id récupéré dans le lien de la page */

                    ));

                    if ($result->rowCount() == 0) { /* Si l'id Commentaire n'existe pas alors on exécute le code ci-dessous */
                        header('02-lesarticles.php'); /* On redirige vers la page de départ */
                        exit(); /* On arrête le script car il ne correspond à rien */
                    }

                    $fiche = $result->fetch(PDO::FETCH_ASSOC);
                } else { /* Si j'arrive sur la page sans rien dans l'URL */

                    header('location:02-lesarticles.php'); /* On redirige vers la page de départ */
                    exit(); /* On arrête le script car il ne correspond à rien */
                }


                ?>


            </div>








            <section class="row">


                <div class="col-12 col-md-6">


                    <div class="card">
                        <div class="card-header">
                            ID du blog : <?php echo $fiche['id_articles'] ?>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">image : <img src="<?php echo $fiche['image'] ?>" alt="" </h4>
                                <p class="card-text">Titre : <?php echo $fiche['titre'] ?> </p>
                                <p class="card-text">Titre : <?php echo $fiche['contenu'] ?> </p>
                                <p class="card-text">Titre : <?php echo $fiche['auteur'] ?> </p>
                                </div>
                        <div class="card-footer text-muted">
                            Date de parution : <?php echo date('d/m/y', strtotime($fiche['date_parution'])) ?>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6">


                    <h2>Mise à jour de l'article</h2>


                    <form action="#" method="POST">

                        <div class="mb-3">
                            <label for="id_blog">id_blog</label>
                            <input type="text" name="id_blog" id="id_blog" class="form-control" value=" <?php echo $fiche['id_blog']; ?>">

                        </div>

                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="text" name="image" id="image" class="form-control" value=" <?php echo $fiche['image']; ?>">

                        </div>


                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" class="form-control" value=" <?php echo $fiche['titre']; ?>">

                        </div>


                        <div class="mb-3">
                            <label for="contenu">contenu</label>
                            <input type="text" name="contenu" id="titre" class="form-control" value=" <?php echo $fiche['contenu']; ?>">

                        </div>



                        <div class="mb-3">
                            <label for="contenu">date_parution</label>
                            <input type="date_parution" name="date_parution" id="date_parution" class="form-control" value=" <?php echo $fiche['date_parution']; ?>">

                        </div>




                        <button type="submit" name="submit" class="bth btn-primary">Mettre à jour </button>

                    </form>


                    <?php

                    /* traitement de la mise à jour du commentaire */
                    if (!empty($_POST)) { // je vérifie que mon formulaire n'est pas vide (not empty)

                        $_POST['id_articles'] = htmlspecialchars($_POST['id_artcles']);
                        $_POST['image'] = htmlspecialchars($_POST['image']); // grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles
                        $_POST['titre'] = htmlspecialchars($_POST['titre']); // grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles
                        $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
                        $_POST['contenu'] = htmlspecialchars($_POST['contenu']); // grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles
                        $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']); // grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles

                        $resultat = $pdoBlog->prepare("UPDATE id_articles SET contenu = :contenu, image= :image WHERE id_articles = :id_articles");
                        $resultat->execute(array(
                            ':id_articles' => $_GET['id_articles'],
                            ':image' => $_POST['image'],
                            ':titre' => $_POST['titre'],
                            ':auteur' => $_POST['auteur'],
                            ':contenu' => $_POST['contenu'],
                            ':date_parution' => $_POST['date_parution'],
                        ));

                        header('location:02-lesarticles.php');
                        exit();
                    }

                    ?>



                </div>
            </section>




    </main>



    <h2 class="text-center mb-4">Contenu article
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center"><?php echo $fiche['id_articles'] . " " . $fiche['id_articles']; ?></h4>
                    </div>
                    <div class="card-body">
                    <p class="card-text">image : <img src="<?php echo $fiche['image'] ?>"</p>
                    <p class="card-text">titre : <?php echo $fiche['titre'] ?></p>
                    <p class="card-text">auteur : <?php echo $fiche['autreur'] ?></p>
                    <p class="card-text">contenu : <?php echo $fiche['contenu'] ?></p>
                    
                    
                        </p>
                        <p class="card-text">Date de parution :
                            <?php
                            echo date('d/m/Y', strtotime($fiche['date_parution']))
                            ?>
                        </p>
                        
                    </div>
                </div>

            </div>
            <!-- fin col -->

           
    </main>








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