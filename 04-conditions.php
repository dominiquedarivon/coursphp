<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les conditions et boucles </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les conditions et boucles</h1>
            <p class="lead">Les conditions sont un chapitre clé, comme dans les autres langages de programmation. Par exemple; lorsque l'on crée un site et que l'un de nos internautes veut se connecter à son espace, il rentrera son pseudo ainsi que son mot de passe. Il faudra alors exprimer la phrase suivante PHP: SI (if) le pseudo est bon et le mdp aussi, tu peux rentrer SINON (elese) tu restes SINON (else) tu restes sur la page avec un message d'erreur.</p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

        <section class="col-12">
            <div>
                <h2 class="text-center"> 1- La condition supérieur à B</h2>

                <?php

                $a = 10;
                $b = 5;
                $c = 2;

                if ($a > $b) {
                    echo "<p>A est strictement supérieur à B</p>";
                } else {

                    echo "<p> Non, c'est B qui est strictement supérieur à A</p>";
                }

                ?>
                <!-- fin du PHP -->
            </div> <!-- fin de la colonne -->

            <div>

                <p> Nous avons déclarer 3 variables : a vaut 10, b vaut 5 et c vaut 2. Ici , la condition est simple => on pose en fait la question =>est-ce que a est plus grand ou plus petit que .</p>

                <p>EXO: Ftaites la même chose en vérifiant si a est strictement supérieur ou inférieur à C ;</p>


                <?php /* ICI MON CODE */
                $a = 10;
                $b = 5;
                $c = 2;

                if ($a > $c) {
                    echo "<p>A est strictement supérieur à C</p>";
                } else {

                    echo "<p> ou A est strictement inférieur à C</p>";
                }

                ?>
                <!-- fin PHP -->


                <h3 class="text-center"> Condition simple avec AND </h3>


                <?php


                if ($a > $b && $b > $c) {
                    echo "<p class=\"alert alert-seuccess\"> a est supérieur à b ET b est supérieur à c</p>";
                } else {

                    echo "<p class=\"alert alert-seuccess\"> L'une ou les deux conditions ne sont pas remplies.</p>";
                }

                ?>

                <p>Dans le code PHP d'au dessus, on vérifie si a est supérieur à b qui lui-même est supérieur à C. Dans le cas ou l'une ou les deux conditions s'avères fausses, le esle sera exécuté; Avec le signe <code>&&</code> ( qui se dit AND ou et commercial ou superluette), il faut absolument que les deux conditions soient bonnes pour que l'evalutation du code retourne TRUE et que l'on puisse rentrer dans le if.</p>


                <h3 class="text-center"> Condition simple avec QR </h3>


                <?php /* ICI MON CODE */


                if ($a === 9 || $b > $c) {

                    echo "<P class=\"alert alert-success\">Au moins l'une des deux conditions est vraie , le code renvoie TRUE et le if s'exécute donc.</P>";
                } else {

                    echo " <p class=\" alert alert-success\"> Aucune des conditions n'est vraie, c'est donc moi qui m'exécute.</p>";
                }

                ?>


                <p>Cette fois -ci nous vérifions si a contient la valeur 9 ou si b est supérieur à c . Il suffit que l'une des conditions soit vraie pour que le code renvoie TRUE et que le if s'exécute . Bien sûr si les deux conditions sont bonnes c'est toujours le if qui s'exécute . </p>


                <h3 class="text-center"> Condition simple avec XOR </h3>


                <?php /* ICI MON CODE */

                if ($a == 10 xor $b == 6) {
                    echo "<p class=\"alert alert-success\"> Une seule des conditions est bonne, le code renvoie TRUE  et on rentre dans le if . </p>";
                } else {

                    echo "<p class=\"alert alert-success\"> Les deux conditions sont bonnes ou les deux sont mauvaises, c'est donc moi, le else , qui m'exécute.</p>";
                }

                ?>

                <P> Pour que le if s'exécute lorsuqe l'on fait une condition avec XOR , il faut qu'une seule des conditions soit vraie pour le code renvoie TRUE. Si les deux conditions sont bonnes ou les deux sont mauvaises alors on rentre dans le esle.</P>


                <h2 class="text-center">Conditions complexes avec if / elseif/else</h2>

                <?php /* ICI MON CODE */

                if ($a == 8) {

                    echo "<p class=\"alert alert-success\" > A est égal à 8</p>";
                } elseif ($a != 10) {
                    echo "<p class=\"alert alert-success\" >a est different de 10 ! </p>";
                } else {

                    echo "<p class=\"alert alert-success\" > Les autres solutions étaient fausses, c'est donc moi qui m'exécute !</p>";
                }

                ?>

                <p> Dans le if nous vérifions si la variable $a est égal à 8. Dans le elseif, on vérifie si la variable $a contient une valeur différente de 10. Le esle s'exécutera car ses deux conditions ne sont pas bonnes , elles renvoient FALSE .Ici nous avons mis un seul elseif mais, comme en JS on peut en mettre autant que l'on veut .</p>


                <h3 class="text-center"> IF/ELSE contracté</h3>

                <?php /* ICI MON CODE */



                echo ($a == 10) ? "<p> A est égal à 10</p>" : "<p class=\"alert alert-success\"> An'est pas égal à 10</p>";

                ?>

                <p>Dans la forme contactée(ternaire) du if else le if est remplacé par le point d'interrogation (?) qui vient après la condition. Le else est remplacé par les deux points (:) </p>


                <h3 class="tex--cenetr">Condition de comparaison</h3>


                <?php /* ICI MON CODE */


                $vara = 1;
                $varb = '1';

                if ($vara == $varb) {
                    echo "<p class=\"alert alert-success\" >il s'agit de la même valeur </p>";
                } else {

                    echo  "<p class=\"alert alert-success\" >il ne s'agit pas de la même valeur </p>";
                }

                if ($vara === $varb) {

                    echo "<p class=\"alert alert-success\" >il s'agit de la même valeur </p>";
                } else {

                    echo "<p class=\"alert alert-success\" >il ne s'agit pas de la même valeur </p>";
                }


                ?>

                <p>Dans la première condition (if esle), on vérifie si la chaine de caractère et l'integer qui se trouve dans vara et varb ont la même valeur . La condition est bonne, le code renvoie TRU et le if s'exécute .</p>


                <p>Dans le deuxième if else si vara et varb ont le meme type et valeur . la condition du if est fausse le code renvoie FALSE et c'est le esle qui s'exécute .</p>

                <table class="table table-striped">


                    <caption class="fs-2"> Différence entre 1 égal , 2 égal et 3 égals</caption>
                    <thead>

                        <tr>

                            <th>Opérateur</th>
                            <th>Signifiation</th>


                        </tr>

                    </thead>
                    <tbody>
                        <tr>

                            <td>=</td>
                            <td>1 égal permet d'affecter une valeur à une variable.</td>


                        </tr>

                        <tr>

                            <td>==</td>
                            <td> 2 égals permettent de faire une comparaison de la valeur </td>


                        </tr>

                        <tr>
                            <td>===</td>
                            <td>3 égals permettent de faire une comparaison de la valeur et du type .</td>

                        </tr>
                    </tbody>

                </table>

            </div><!-- fin de la  colonne -->

            <div class="col-12">


                <h2 class="text-center"> La condition switch </h2>

                <?php /* ICI MON CODE */


                $monPays = 'Martinique';

                switch ($monPays) {

                    case 'italy':
                        echo "<p class=\"alert alert-success\" >Vous êtes italien!</p>";
                        break;

                    case 'Espagne':
                        echo "<p class=\"alert alert-success\" >Vous êtes espagnol!</p>";
                        break;
                    case  'Uruguay':
                        echo "<p class=\"alert alert-success\" >Vous êtes Uruguay</p>";
                        break;
                    case  'Mali':
                        echo "<p class=\"alert alert-success\" >Vous êtes Mlien!</p>";
                        break;
                    case  'Martinique':
                        echo "<p class=\"alert alert-success\" >Vous êtes Martiniquaise!</p>";
                        break;
                    case 'Thailandais':
                        echo "<p class=\"alert alert-success\" >Vous êtes thaîlandais!</p>";
                        break;
                    default:
                        echo "<p class=\"alert alert-success\" >Vous n'avez pas une nationalité dans notre liste de possibilités</p>";
                        break;
                }
                ?>

<p>Il faut être très vigilant lors de l'écriture d'une boucle Switch : Il faut prenser au case , aux deux points , au break, au default, etc . Dans le cas d'une switch les conditions complètes ne fonctionnent pas : il n'est pas possible de vérifier si $a > $b exemple . </p>

<h2> </h2>


            </div><!-- fin de la colonne -->



        </section><!-- fin de la rangée -->
















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