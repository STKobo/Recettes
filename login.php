<?php
  require_once('templates/header.php');

  $errors = [];
  $messages = [];

  $users = [
    ["email" => 'abc@test.com', 'password' => '1234'],
    ["email" => 'test@test.com', 'password' => 'test']
  ];

  if(isset($_POST['loginUser'])){
    foreach($users as $user){
        if($user['email'] === $_POST['email'] && $user['password'] === $_POST['password']) {
            $messages[] = 'Email et mot de passe ok';
        }
    }
  }
?>

<h1>Connexion</h1>

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
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    
    <input type="submit" value="Enregistrer" name="loginUser" class="btn btn-primary">

</form>

<?php
require_once('templates/footer.php');
?>