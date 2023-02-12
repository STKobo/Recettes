<?php
require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/recipe.php');
require_once('lib/category.php');

$errors = [];
$messages = [];

$categories = getCategories($pdo);

if(isset($_POST['saveRecipe'])){
    
    if( isset($_FILES['file']['tmp_name']) && isset($_FILES['file']['tmp_name']) != ''){
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if($checkImage !== false){
            $fileName = uniqid().'-'.$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_.$_FILES['file']['name']);
        } else {
            $errors[] = "Le fichier doit être une image";
        }
    }
    
    /*$res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], null);
    if ($res) {
        $messages[] = "La recette a bien été sauvegardée";
    } else {
        $errors[] = "La recette n'a pas été sauvegardée";
    }

    */
}

?>

<h1>Ajouter une recette</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?= $message; ?>
    </div>
<?php }?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php }?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea name="instructions" id="instructions" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-select">
            <?php foreach ($categories as $category) {  ?>
                <option value="<?= $category['id']; ?>"><?= $category['name'];?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">

</form>

<?php
require_once('templates/footer.php');
?>