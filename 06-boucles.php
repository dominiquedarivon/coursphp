<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les boucles </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les boucles </h1>
            <p class="lead">Les boucles ( structures itératives) sont un moyen de faire répéter un morceau de code plusieurs fois. Une boucle est donc une répétition </p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

        <section class="row">

            <div class="col-12">

                <h2>La boucle Do while </h2>

                <p> C'est le même principe que la boucle <em>while.</em> la seule difference c'est que la condition est testé à la fin plutôt qu'au début.</p>

            </div>



            <?php /* ICI MON CODE */

            $i = 0;

            do {

                echo $i;
            } while ($i > 0);
            /* Ici on exécute une fois le code même si on ne remplit pas la condition dû à l'ordre de la boucle do... while => la boucle s'exécute puis rencontre une condition qu'elle ne remplit pas et et elle s'arrête donc.  */


            ?>


            <div class="col-12">


                <h2>La boucle while</h2>

                <p>while (tant que) est une boucle qui va exécuter un morceau de code tant que la condition est remplie </p>



                <?php /* ICI MON CODE */

                $a = 0; // valeur initiale à 0


                while ($a < 5) // on boucle tant que notre variable est inférieure à 5 

                {

                    echo " <p>Tour n° $a</p>"; // on affiche ici à quel tour on se trouve 

                    $a++; // on incrémente notre variable $a => ajoute 1

                }


                ?>

            </div>

            <div class="col-12">

                <h2>La boucle for </h2>

                <p>Tous comme la boucle while , l'objectif de cette boucle est de répéter un morceau de code , mais la structure sera differente .</p>


                <?php /* ICI MON CODE */

                for ($b = 0; $b <= 15; $b++)/* dan sles parenthèses de la boucle for
-On initialise la variable
-On écrit notre condition 
-Nous incrémentions ou décrémentons la variable  */ {

                    echo "<p>Tour n° $b </p>";/* On met le code que nous devons répéter */
                }




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