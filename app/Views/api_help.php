 <!DOCTYPE html>

 <html>

 <head>
     <title>Documentation de l'API Projet Nesti</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width,initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

 </head>

 <body>
     <div class="container-fluid bg-info pb-5">

         <h1 class="text-center text-uppercase pt-5">Documentation de l'API<br>Projet Nesti</h1>

         <div class="d-flex justify-content-center mt-5">
             <img src="<?=base_url()?>/assets/images/api.PNG" alt="api">
         </div>

         <div class="text-center mt-5">
             Une API est un ensemble de définitions et de protocoles qui facilite la création et l'intégration de logiciels d'applications.<br> API est un acronyme anglais qui signifie « Application Programming Interface », que l'on traduit par interface de programmation d'application.<br> Les API permettent à votre produit ou service de communiquer avec d'autres produits et services sans connaître les détails de leur mise en œuvre.
         </div>

         <div class="text-center mt-5">Chaque action fournie par l'API nécessite un Token.</div>

         <h2 class="mt-5 text-center">Pour les recettes : </h2>

         <div class="text-center">Voici la méthode pour obtenir toutes les recettes au format Json.</div>

         <div class="text-center">GET :
             https://cadeck.needemand.com/realisations/Projet_nesti_shop_CodeIgniter/public/api/{token}/recipes</div>

         <div class="row">

             <div class="col d-flex justify-content-center">
                 <img class="mt-5" src="<?=base_url()?>/assets/images/api1.PNG" alt="exemple1">
             </div>

             <div class="col mt-5 d-flex justify-content-center">
                 <div class="mt-5 text-center">Détail des données<br>
                     "idRecipe": identifiant de la recette<br>
                     "cat": catégorie de la recette<br>
                     "title": nom de la recette<br>
                     "author": nom et prénom de l'auteur de la recette<br>
                     "img": nom de l'image<br>
                     "diff": difficulté de 1 à 5 de la recette<br>
                 </div>
             </div>
         </div>

         <h2 class="mt-5 text-center">Pour les recettes par catégorie (catégorie tradition) : </h2>

         <div class="text-center">Voici la méthode pour obtenir toutes les recettes par catégorie au format Json.</div>

         <div class="text-center">GET :
             https://cadeck.needemand.com/realisations/Projet_nesti_shop_CodeIgniter/public/api/{token}/category/{nom de la categorie}</div>

         <div class="row">

             <div class="col d-flex justify-content-center">
                 <img class="mt-5" src="<?=base_url()?>/assets/images/api2.PNG" alt="exemple2">
             </div>

             <div class="col mt-5 d-flex justify-content-center">
                 <div class="mt-5 text-center">Détail des données<br>
                     "idRecipe": identifiant de la recette<br>
                     "cat": catégorie de la recette<br>
                     "title": nom de la recette<br>
                     "author": nom et prénom de l'auteur de la recette<br>
                     "img": nom de l'image<br>
                     "diff": difficulté de 1 à 5 de la recette<br>
                 </div>
             </div>

             <h2 class="mt-5 text-center">Pour les ingrédients d'une recette : </h2>

             <div class="text-center">Voici la méthode pour obtenir tous les ingrédients d'une recette au format Json.</div>

             <div class="text-center">GET :
                 https://cadeck.needemand.com/realisations/Projet_nesti_shop_CodeIgniter/public/api/{token}/recipes/{id de la recette}/ingredient</div>

             <div class="row">

                 <div class="col d-flex justify-content-center">
                     <img class="mt-5" src="<?=base_url()?>/assets/images/api3.PNG" alt="exemple3">
                 </div>

                 <div class="col mt-5 d-flex justify-content-center">
                     <div class="mt-5 text-center">Détail des données<br>
                         "idRecipe": identifiant de la recette<br>
                         "nameIngredient": nom de l'ingredient<br>
                         "quantity": quantité de l'ingrédient<br>
                         "nameUnit": nom de l'unité<br>
                         "idIngredient": identifiant de l'ingrédient<br>
                     </div>
                 </div>

                 <h2 class="mt-5 text-center">Pour les étapes de préparation d'une recette : </h2>

                 <div class="text-center">Voici la méthode pour obtenir les étapes de préparation d'une recette au format Json.</div>

                 <div class="text-center">GET :
                     https://cadeck.needemand.com/realisations/Projet_nesti_shop_CodeIgniter/public/api/{token}/recipes/{id de la recette}/preparation</div>

                 <div class="row">

                     <div class="col d-flex justify-content-center">
                         <img class="mt-5" src="<?=base_url()?>/assets/images/api4.PNG" alt="exemple4">
                     </div>

                     <div class="col mt-5 d-flex justify-content-center">
                         <div class="mt-5 text-center">Détail des données<br>
                             "idParagraph": identifiant du paragraphe<br>
                             "content": étape de préparation de la recette<br>
                             "idRecipe": identifiant de la recette<br>
                         </div>
                     </div>
                 </div>
             </div>
 </body>

 </html>