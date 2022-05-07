<?php
include "includes/autoload.php";
include "includes/header.php";
?>
<?php
if (isset($_POST['submit'])) {
    // Traitement de la photo
    if($_FILES)
    {
    $nomfichier = "profil.jpg";
    switch($_FILES['photoUser']['type'])
    {
      case 'image/jpeg': $extention = 'jpg'; break;
      case 'image/gif': $extention = 'gif'; break;
      case 'image/png': $extention = 'png'; break;
      case 'image/tif': $extention = 'tif'; break;
      case 'image/png': $extention = 'png'; break;
      default:          $extention=''; break;
    }
    if($extention && $_FILES['photoUser']['size']< 30 * 1024 * 1024)
    {
        //Changer le nom de l'image
        $characts='abcdefghijklmnopqrstuvwxyz';
        $characts.='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts.='1234567890';
        $code_aleatoire='';
        for($i=0;$i<20;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }
        $nomfichier = $code_aleatoire.".".$extention;
        $fileName= $_FILES['photoUser']['name'];
        $tempName = $_FILES['photoUser']['tmp_name'];
        if(isset($fileName)){
          if(!empty($fileName)){
            $location = "images/profil/";
            move_uploaded_file($tempName, $location.$nomfichier);
          }
    }
    else
    {
      if(!$extention) echo $_FILES['photoUser']['name']."n'est pas accepté comme fichier image";
      else echo "L'image dépasse les 30 Mo";
    }
  }
}

    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $birthdate = $_POST['birthdate'];

    $ok=TRUE;

    if(strlen($lastname)<3 
    || strlen($lastname)>45){
        $ok=FALSE;
    }

    if(strlen($firstname)<3 
    || strlen($firstname)>45){
        $ok=FALSE;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)
    || strlen($email)>45){
        $ok=FALSE;
    }

    
  
    if( $_POST['motdepasse1'] == $_POST['motdepasse2'] ) {
        $password = hash("sha512",$_POST['motdepasse1']);
        if ($ok=TRUE){
        $manager = new UserManager($db);
        $user = $manager->createUser(
            new User(['lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $email,
                'birthdate' => $birthdate,
                'password' => $password,
                'pp' => $nomfichier
            ])
        );
        }   
    }
}
?>

<div class="container px-4 px-lg-5 mt-5">
<!--Début Formulaire-->
 <!-- Formulaire d'inscription -->
 <form method="post" action="" id="form" enctype="multipart/form-data" novalidate>
 <fieldset>
  <legend>Inscription Client</legend>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" minlength="3" maxlength="45" autocomplete="off"  spellcheck="false" name="firstname" id="firstname" placeholder="Votre prénom" required>
        <div class="valid-feedback">
          Prénom Ok !
        </div>
        <div class="invalid-feedback">
          Le champ prénom est obligatoire et doit faire entre 3 et 45 caractères
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" autocomplete="off"  spellcheck="false" name="lastname"  minlength="3" maxlength="45" id="lastname" placeholder="Votre nom" required>
        <div class="valid-feedback">
          Nom Ok !
        </div>
        <div class="invalid-feedback">
          Le champ nom est obligatoire et doit faire entre 3 et 45 caractères
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label class="form-label" for="nom">Photo de Profil</label>
        <input class="form-control" type="file" onchange="actuPhoto(this)" id="photoUser" name="photoUser" accept="image/jpeg, image/png, image/gif">
      </div>
    </div>
    <img src="" id="photo" style="width:20%;border-radius: 50%;" class="img-responsive float-right">
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="email">Adresse électronique</label>
        <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" placeholder="nom@exemple.com" maxlength="45" required>
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
        <div class="invalid-feedback">
          Vous devez fournir un email valide.
        </div>
      </div>
    </div>
   <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motdepasse1">Mot de Passe</label>
        <input type="password" oninput='motdepasse1.setCustomValidity(motdepasse1.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="form-control" id="motdepasse1" name="motdepasse1" minlength="5" maxlength="30" required>
        <div id="message" name="message" class="invalid-feedback">
          Mot de passe invalide il doit contenir au moins 5 caractères et 30 maximum
        </div>
        <div class="invalid-feedback">
          <p id="erreurMotDePasse"></p>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motdepasse2">Confirmation du mot de passe</label>
        <input type="password" oninput='motdepasse2.setCustomValidity(motdepasse2.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="form-control" id="motdepasse2" name="motdepasse2" minlength="5" maxlength="30" required>
        <div name="message" class="invalid-feedback">
          Mot de passe non identique
        </div>
      </div>
    </div>
    <div class="form">
          <label for="indice">Date de naissance</label>
          <input type="date" class="form-control col-md-3" name="birthdate" placeholder="DD/MM/YYY" required/>
          <div class="invalid-feedback">
            La date de naissance est obligatoire
          </div>
    </div>


   
    <br/>
    <input type="submit" value="Confirmer" class="btn btn-primary" name="submit"/>
    
    </fieldset>
</form>
</div> 

<?php include "includes/footer.php"; ?>

<script>
// function JavaScript qui permet de changer dans le formulaire un champ en fonction du choix de l'utilisateur.
function actuPhoto(element)
{
  var image=document.getElementById("photoUser");
  var fReader = new FileReader();
  fReader.readAsDataURL(image.files[0]);
  fReader.onloadend = function(event)
  {
    var img = document.getElementById("photo");
    img.src = event.target.result;
  }
}

function validationMotDePasse() 
{
  $motDePasse1=document.getElementById("motdepasse1").value;
  console.log($motDePasse1);
  $motDePasse2=document.getElementById("motdepasse2").value;
  if ($motDePasse1 != $motDePasse2)
  {
    document.getElementById("erreurMotDePasse").value="Erreur";
  }
}

var mail=document.getElementById("email");
mail.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mail");
});

var motDePasse=document.getElementById("motdepasse2");
motDePasse.addEventListener("blur", function (evt) {
  validationMotDePasse();
});

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>