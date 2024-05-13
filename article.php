<?php
include_once "_inc/header.php";

$article_object = new Article();

if (isset($_SESSION["username"]) && isset($_POST["delete"])) {
    $article_object->delete($_POST["delete"]);
    header("Location: index.php");
    die();
}
?>

<main>
    <?php
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
        <h1 class="text-center mb-5 display-2"><?php echo $article["title"] ?></h1>

        <?php if (isset($_SESSION["username"])) { ?>
            <div class="d-flex gap-3 pt-5 mt-5 mb-3">
                <a href="Upravit_clanok.php?id=<?php echo $article["id"] ?>" class="btn btn-primary">Upraviť</a>

                <form method="POST">
                    <button type="submit" name="delete" value="<?php echo $article["id"] ?>" class="btn btn-primary">Zmazať</button>
                </form>
            </div>
        <?php
        }
        ?>

        <div id="dv1" class="border-danger border-5 bg-light px-2 py-5">
            <div class="col-8 mx-auto text-center">
                <?php
                $withNewlines = str_replace("\n", "<br/>", $article["text"]);
                echo $withNewlines;
                ?>

                <br /><br />
                <img src="img/<?php echo $article["img"] ?>" alt="<?php echo $article["title"] ?>">
            </div>
        </div>
    </div>
</main>

<?php
include_once "_inc/footer.php";
?>