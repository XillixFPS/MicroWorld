<?php
require_once "includes/autoload.php";
require_once "includes/header.php";

if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    $password = hash('sha512',$_POST['password']);

    $manager = new UserManager($db);
    $connexion = $manager->connexion(
        new User([
            'email' => $email,
            'password' => $password
        ])
    );
}
?>

<main class="form-signin">
      <form method="post" id="formId" novalidate>
        <img class="mb-4" src="assets/icon.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Connexion</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control" placeholder="nom@exemple.fr" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" name="email" id="email">
          <label for="floatingInput">Adresse électronique</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" class="form-control" name="password" placeholder="Mot de Passe">
          <label for="floatingPassword">Mot de Passe</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se Souvenir de moi
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" value="Valider" name="connexion">Connexion</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
</main>

<?php
//Si l'utilisateur est inconnu alors on le revoie sur un formualire est on affiche une alert
if(isset($userInconnu)) {
  echo '
  <br>
  <div class="alert alert-danger" id="bloc" style="display:none role="alert">
  Email ou mot de passe incorrect.
  </div>
  <script>
  document.getElementById("bloc").style.display="block";
  setTimeout(function(){document.getElementById("bloc").style.display="none";},5000);
  </script>';
}
?>

<?php
require_once "includes/footer.php";
?>