
<?php
require_once('templates/header.php');
require_once('templates/header.php');

$id = $GET['id'];

var_dump($recipes[$id]); 
?>



    <div class="row">

      <?php foreach ($recipes as $key => $recipe) { 
        include ('templates/recipe_partial.php');
       
      } ?>


    </div>

<?php
require_once('templates/footer.php');
?>