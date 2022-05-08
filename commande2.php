<?php
require_once "includes/autoload.php";
require_once "includes/header.php";
?>
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="assets\icon.png" alt="" width="10%" height="auto">
      <h2>Passer Commande</h2>
      <p class="lead">Payer en toute tranquilité avec nos partenaires de paiement sécurisé</p>
    </div>

    <div class="row g-5">
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Adresse de Facturation</h4>
        <form action="" method="post" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Prenom</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Le prenom est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Nom de famille</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Le nom de famille est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Entrez une adresse mail valide.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Entrez votre adresse.
              </div>
            </div>

            <div class="col-12">
              <label for="codePostal" class="form-label">Code Postal <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="codePostal" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="pays" class="form-label">Pays</label>
              <input type="text" class="form-control" id="pays" placeholder="Pays">
              <div class="invalid-feedback">
                Choisir un pays.
              </div>
            </div>

            <div class="col-md-4">
              <label for="ville" class="form-label">Ville</label>
              <input type="text" class="form-control" id="ville" placeholder="Ville">
              <div class="invalid-feedback">
                Choisir une ville.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Moyen de paiement</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Carte de crédit</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Carte de débit</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nom de la carte</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Nom complet au recto de la carte</small>
              <div class="invalid-feedback">
                Nom de la carte requis.
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numero Carte Bancaire</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Numero carte bancaire.
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Date d'expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Date d'expiration requis. 
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Code de sécurité requis.
              </div>
            </div>
          </div>

          <hr class="my-4">
        
          <button class="w-100 btn btn-primary btn-lg" type="submit">Finaliser votre achat</button>
        </form>
      </div>
    </div>
  </main>
</div>
<br>
<?php
require_once "includes/footer.php";
?>