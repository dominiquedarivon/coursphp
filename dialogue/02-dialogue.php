<?php /* CODE PHP */ 


require("../inc/functions.php")

?>

<!doctype html>


<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le PHP - Insertion d'un élément</title>
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
            <h1 class="display-3">Insertion d'un élément</h1>
            <p class="lead">Grâce à la superglobale $_POST , on va pouvoir envoyer des informations vers la base de données.</p>
        </div>
    </div>
    


    <main class="container">

   <div class="col-md-6 col-12">
       <form action="#" method="POST" class="border p-2">

       <div class="mb-3">
           <label for="pseudo">Votre pseudo</label>
           <input type="text" name="pseudo" id="pseudo" class="form-control" required>
       </div>
       <div class="mb-3">
           <label for="pseudo">Votre message</label>
           <input type="text" name="message" id="message" class="form-control" required>
       </div>

       <button type="submit" class="btn btn-success">Envoyer votre commentaire</button>

       </form>

       <?php
        
       /* je traite le formulaire de façon securisé grace à une requête préparée */
       if (!empty($_POST)) { /* je vérifie que $_POST contient des informations. */
        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); /*  grâce à cette instruction, je me prémunie des failles et des injections SQL */
        $_POST['message'] = htmlspecialchars(($_POST['message']));

        $insertion = $pdoDialogue -> prepare("INSERT INTO commentaire (pseudo,message, date_enregistrement) VALUES (:pseudo, :message,NOW())");
        /* Pour la date d'enregistrement , dans les valeurs nous précison NOW() qui va permettre la date d'enregistrements , dans les valeurs nous précisonsNOW() qui va permettre de récupèrer la dare du jour . Les autres valeurs sont précisées par la suite dans execute */
        $insertion -> execute( array(
            ':pseudo' => $_POST['pseudo'],
            ':message' => $_POST['message'],
            /* GRâce à cette instruction , le sql comprend que l'on récupère ce qui se trouve dans l'input pseudo pour le pseudo et dans l'input message pour le message */
        ));
       }


       
       ?>
   </div>

   <div class="col-12 col-md-6">
    <p>Afficher les 5 derniers commentaire de la table commentaire Dans une ultime colonne, ajoutez un bouton modification</p>

    <?php /* CODE PHP */ 
        
        $requete = $pdoDialogue -> query("SELECT * FROM commentaire WHERE date_enregistrement ORDER BY id_commentaire DESC LIMIT 0,5;");  /* Ici je rentre ma requête dans ma variable $requete => je sélectionne tous les éléments qui se trouvent dans la table commentaire */
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Pseudo</th>
                    <th>Message</th>
                    <th>Date et heure</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Modification</th>
                </tr>
            </thead>
            <tbody>
            ";
            /* Ici je fais echo de mon tableau en PHP => J'ai l'ouverture ainsi que le thead de mon tableau */
            while ($ligne = $requete -> fetch (PDO:: FETCH_ASSOC)) { /* Grâce à la boucle while (tant que ) j'éxecute le bloc de code TANT QUE j'ai des enregistrements qui correspondent à ma requête */
                echo "<tr>";
                echo "<td>#". $ligne['id_commentaire'] . "</td>"; /* Je boucle l'id-commentaire */
                echo "<td>". $ligne['pseudo'] . "</td>"; /* Je boucle le pseudo */
                echo "<td>". $ligne['message'] . "</td>"; /* Je boucle le message */
                echo "<td>".date('D M Y  H:i:s', strtotime($ligne['date_enregistrement'])) . "</td>"; /* Je boucle le message */
                echo "<td>".date('D M Y', strtotime($ligne['date_enregistrement'])) . "</td>"; /* Je boucle le message */
                echo "<td>".date(' H:i:s', strtotime($ligne['date_enregistrement'])) . "</td>"; 


                echo "<td><a class=\"btn btn-primary\" href=\"03-fichedialogue.php? id_commentaire=" . $ligne['id_commentaire'] ."\">Modif</a></td>"; 
                echo "<tr>";

                
            } 
            echo "</tbody>
            </table>
            ";
            /*Réception des informations d'un employé avec $8get */
        ?>

   </div>

</main>

    <!-- fin du code + js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>