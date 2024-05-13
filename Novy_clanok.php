<?php
include_once "_inc/header.php";

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    die();
}

$article_object = new Article();
if (isset($_POST["title"]) && isset($_POST["place"]) && isset($_POST["text"]) && isset($_POST["img"])) {
    $data = [
        $_POST["title"],
        $_POST["place"],
        $_POST["text"],
        $_POST["img"]
    ];

    $article_object->create($data);
    header("Location: index.php");

    die();
} else {
?>

    <main>
        <div class="pt-5 mt-5 container mb-3">
            <h1 class="text-center mb-5 display-2">Nový článok</h1>
            <div id="dv1" class="border-danger border-5 bg-light px-2 py-5">

                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="title">Titulok</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Titulok...">
                    </div>

                    <div class="form-group mb-4">
                        <label for="place">Miesto</label>
                        <input name="place" type="text" class="form-control" id="place" placeholder="Heslo">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="img">Cesta k obrázku v priečinku img/</label>
                        <input name="img" type="text" class="form-control" id="img" value="foto1.jpeg" placeholder="Img">
                    </div>

                    <div class="form-group mb-4">
                        <label for="text">Text</label>
                        <textarea cols="40" rows="5" name="text" type="text" class="form-control" id="text" placeholder="Text"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Vytvoriť</button>
                </form>
            </div>
        </div>
    </main>
<?php
}

include_once "_inc/footer.php";
