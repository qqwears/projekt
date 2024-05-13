<?php
include_once "_inc/header.php";

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    die();
}
?>

<main>
    <div class="pt-5 mt-5 container mb-3">
        <h1 class="text-center mb-5 display-2">Prihlásenie</h1>

        <?php
        $user_object = new User();

        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $user = $user_object->login($_POST["username"], $_POST["password"]);

            if ($user) {
                $_SESSION["username"] = $user["username"];

                header("Location: index.php");
                die();
            } else {
                echo "<p>Nesprávne meno alebo heslo</p>";
            }
        } else {
        ?>

            <div id="dv1" class="border-danger border-5 bg-light px-2 py-5">
                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                    </div>

                    <div class="form-group mb-4">
                        <label for="heslo">Heslo</label>
                        <input name="password" type="password" class="form-control" id="heslo" placeholder="Heslo">
                    </div>

                    <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</main>

<?php
include_once "_inc/footer.php";
?>