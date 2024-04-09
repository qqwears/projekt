<?php
include_once "_inc/header.php";
?>

    <div id="fight">
        <div class="card text-bg-dark rounded-0 z-n1">
            <img src="img/france1.jpeg" class="card-img" alt="fight">
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                <h1 class="bg-dark py-2 px-2">Videli ste niečo nezvyčajné?</h1>
                <h2 class="bg-dark py-2 px-2">Zavolajte nám!</h2>
            </div>
        </div>
    </div>
    <hr>
    <h1 class="text-center">KONTAKT</h1>
    <form action="thx.php" method="GET" id="contactForm" class="container-fluid col-md-5 d-flex flex-column justify-content-center align-items-center">
        <label for="meno">Meno:</label>
        <input id="meno" name="meno" type="text" class="rounded form-control">
    
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" class="rounded form-control">
        <div>Poznámka</div>
        <textarea name="poznamka" class="rounded form-control">Napište nečo</textarea>
        <div class="form-check mt-3">
          <input class="form-check-input" type="checkbox" id="dataConsent">
          <label class="form-check-label" for="dataConsent">
              Súhlasím so spracovaním mojich osobných údajov v súlade s pravidlami ochrany osobných údajov.
          </label>
      </div>
  
      <div id="odos" class="mt-4">
          <button class="odos btn btn-outline-dark px-5 py-2" type="submit" aria-current="page">Odoslať</button>
      </div>
    </form>

<?php
include_once "_inc/footer.php";
?>

    <script>
      document.getElementById('contactForm').addEventListener('submit', function(event) {
          var meno = document.getElementById('meno').value;
          var email = document.getElementById('email').value;
          var poznamka = document.querySelector('[name="poznamka"]').value;
          var dataConsent = document.getElementById('dataConsent').checked;
      
          if (!meno || !email || !poznamka.trim()) {
              alert('Prosím, vyplňte všetky polia.');
              event.preventDefault();
              return;
          }
      
          if (!validateEmail(email)) {
              alert('Prosím, zadajte platný email.');
              event.preventDefault();
              return;
          }
      
          if (!dataConsent) {
              alert('Musíte súhlasiť so spracovaním osobných údajov.');
              event.preventDefault();
              return;
          }
      });
      
      function validateEmail(email) {
          var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
          return re.test(String(email).toLowerCase());
      }
      </script>
</body>
</html>