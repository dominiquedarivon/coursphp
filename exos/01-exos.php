<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -EXO 1 </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">PHP EXO</h1>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

        <section class="row">

            <div class="col-12">


                <h2 class="text-center"> Mini exo 1</h2>


                <p>Afficher la date d'aujourd'hui sous le format jj/mm/aaa puis puis anglais, la date complète </p>



                <?php

                $date = date('d/m/y');
                echo "<p> $date <br> </p>";

                echo date(" l jS F Y");
                // echo date ("j F y");
                ?>


            </div>


            <h2 class="text-center"> Mini exo 1</h2>


            <p>Afficher la devise de la France : " Liberté, Egalité, Fraternité ".</p>

            </div>


            <?php /* ICI MON CODE */


            echo "<br>Liberté, Egalité, Fraternité ";

            ?>



            <div class="col-12">


                <h1 class="text-center"> Mini EXO </h1>


                <p> Calcul de la TVA avec une fonction</p>



                <?php

                // déclaration de la ocntion 

                function calculTva()

                {

                    return 100 * 1.2;
                }


                // exécution de notre fonction

                echo calculTva();



                ?>

                <p>Faire un formulaire danslequel on récupère le prix d'un objet: si le prix est supérieur à 100 € => remise de 10% si le prix est inférieur à 100€ , remise de 5% puis donner le prix net.</p>
                <!-- 
                
<form action="#" method="GET">

<label for="prix">Combien avez vous payé votre objet ?</label>

<input type="text" name="prix" id="prix" class="form-control">
<input type="submit" name="submit" class="btn btn-success mt-1">

</form> -->



                <!--   
    <?php


    if (isset($_GET['submit'])) {

        $prix = $_GET['prix'];
        $discount1 = 0.05;
        $discount2 = 0.1;
        $cinqpourcent = $prix * $discount1;
        $dixpourcent = $prix  * $discount2;
        $prixfinaldix = $prix - $dixpourcent;
        $prixfinalcinq = $prix - $cinqpourcent;


        if ($prix > 100) {

            echo "<p class=\"alert aler-success\" >Vous avez une remise de $dixpourcent €, votre objet vaut donc  $prixfinaldix € </p>";
        } else {

            echo "<p class=\"alert aler-success\" >Vous avez une remise de $cinqpourcent €, votre objet vaut donc  $prixfinalcinq € </p>";
        }
    }


    ?>  -->


            </div>


            <div class="col-12">


                <h2 class="text-center"> Mini exo 4</h2>

                <p>Si vous achetez un PC à plus de 1000 € dans la boutique de Hols la remise de 15% pour un mac de moins de 1000€ la remise est de 10%. Si vous aveztez un livre , la remise est de 5% pour tous les autres articles, peu importe l'obejet , la remise est de 2% </p>


                <form action="#" method="GET">

                    <label for="objet">Objet acheté</label>
                    <input type="text" name="objet" placeholder="mac, livre ou autre" id="objet">
                    <label for="prix"> Prix de l'objet</label>
                    <input type="text" name="prix" id="prix" placeholder="prix de l'objet">
                    <input type="submit" class="btn btn-success" name="submit">
                </form>

                <?php
                /*  on vérifie si le formulaire est soumis*/

                if (isset($_GET['submit'])) {

                    /*on récupère les données du formulaire dans les variables  */


                    $objet = $_GET['objet'];
                    $prix = $_GET['prix'];

                    /* 10% => 1-(10/100) =0.9 */

                    //Pour la remise , le calcul est le suivant: on remplace 10 par le pourcentage que l'on veut obtenir.

                    $prixfinal15 = 0.85 * $prix;
                    $prixfinal10 = 0.9 * $prix;
                    $prixfinal5 = 0.95 * $prix;
                    $prixfinal2 = 0.98 * $prix;

                    if ($objet == 'mac') {

                        if ($prix > 1000) { /* dans mac si prix supérieur à 100€ => remise de 15%*/
                            echo "<p class=\"alert alert-success\"> Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 15%, le prix final est donc de $prixfinal15 €</p>
";
                        } else {

                            echo "<p class=\"alert alert-success\"> Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 10%, le prix final est donc de $prixfinal10 </p>
";
                        }
                    } else if ($objet == 'livre') {

                        echo "<p class=\"alert alert-success\">Vous achetez un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 5%, le prix final est donc de $prixfinal5 € </p>";
                    } else {

                        echo "<p class=\"alert alert-success\"> Vous avez acheté un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 2%, le prix final est donc de $prixfinal2 €.</p>";
                    }
                }


                ?>




            <h2>Mini exo 5</h2>

            <p>Afficher dans un select, les 31 jours d'un mois grâce à une boucle for en PHP</p>








            <select name="jour" id="jour" class="mb-5 alert-success">

                <?php


                for ($i = 1; $i <= 31; $i++) {

                    echo "<option value =\$i\">$i</option>";
                }


                ?>

            </select>

            </div>


<div class="col-12">

<h2> La boucle foreach</h2>

<p>La boucle foreach sert à parcourir un tableau (array ()). On la verra plus ne détail dans le chapitre dédié aux arrays.</p>

<h2>Comment choisir la bouce apprprié?</h2>

<p>A force de les utiliser, il sera de plus en plus logique de choisir telle ou telle boucle pour telle ou telle situation.Mais on verra que les boucles ont de toute façon la même utilité: La répétition d'une portion de code.</p>



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