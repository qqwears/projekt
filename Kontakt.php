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

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["meno"];
    $surname = $_POST["priezvisko"];
    $email = $_POST["email"];
    $text = $_POST["text"];

    $data = array($name, $surname, $email, $text);
    $contact = new Contact();
    $wasCreated = $contact->create($data);

    if ($wasCreated) {
?>

        <div id="thx" class="pt-5 container mb-3">
            <div id="dv2" class="border-danger border-5 bg-light p-2 text-center col-8 mx-auto">
                <h1 class="mb-4 fw-bold">Vďaka za prepojenie s nami!</h1>
                <p class="h2">
                    Naši pracovníci vám odpovedia do 24 hodín počas pracovných dní.
                </p>
            </div>
        </div>

    <?php
    } else {
        echo "Insert error";
    }
} else {
    ?>
    <h1 class="text-center">KONTAKT</h1>
    <form method="POST" id="contactForm" class="container-fluid col-md-5 d-flex flex-column justify-content-center align-items-center">
        <label for="meno">Meno:</label>
        <input id="meno" name="meno" type="text" class="rounded form-control">

        <label for="priezvisko">Priezvisko:</label>
        <input id="priezvisko" name="priezvisko" type="text" class="rounded form-control">

        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" class="rounded form-control">

        <div>Poznámka</div>
        <textarea name="text" class="rounded form-control">Napište nečo</textarea>

        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="dataConsent">
            <label class="form-check-label" for="dataConsent">
                Súhlasím so spracovaním mojich osobných údajov v súlade s pravidlami ochrany osobných údajov.
            </label>
        </div>

        <div id="odos" class="mt-4">
            <button class="odos btn btn-outline-dark px-5 py-2" name="submit" type="submit" aria-current="page">Odoslať</button>
        </div>
    </form>

<?php
}

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