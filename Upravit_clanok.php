<?php
include_once "_inc/header.php";

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    die();
}
?>

<main>
    <?php

    $article_object = new Article();
    if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["place"]) && isset($_POST["text"])) {
        $data = array(
            "title" => $_POST["title"],
            "place" => $_POST["place"],
            "text" => $_POST["text"],
        );
        $article_object->update($_POST["id"], $data);

        header("Location: article.php?id=" . $_POST["id"]);
        die();
    }

    if (!isset($_GET["id"])) {
        echo "404";
        die();
    }

    $article = $article_object->getOne($_GET["id"]);

    if (!$article) {
        echo "404";
        die();
    }

    ?>
    <div class="pt-5 mt-5 container mb-3">
        <h1 class="text-center mb-5 display-2">Upraviť článok</h1>
        <div id="dv1" class="border-danger border-5 bg-light px-2 py-5">

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $article["id"] ?>" />

                <div class="form-group mb-3">
                    <label for="title">Titulok</label>
                    <input value="<?php echo $article["title"] ?>" name="title" type="text" class="form-control" id="title" placeholder="Titulok...">
                </div>

                <div class="form-group mb-4">
                    <label for="place">Miesto</label>
                    <input value="<?php echo $article["place"] ?>" name="place" type="text" class="form-control" id="place" placeholder="Heslo">
                </div>

                <div class="form-group mb-4">
                    <label for="text">Text</label>
                    <textarea cols="40" rows="5" name="text" type="text" class="form-control" id="text" placeholder="Text"><?php echo $article["text"] ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Upraviť</button>
            </form>
        </div>
    </div>
</main>
<?php

include_once "_inc/footer.php";
