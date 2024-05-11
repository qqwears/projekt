<?php
include_once "_inc/header.php";

?>

<main>
    <?php
    if (!isset($_GET["id"])) {
        echo "404";
        die();
    }

    $article_object = new Article();
    $article = $article_object->getOne($_GET["id"]);
    ?>

    <div class="pt-5 mt-5 container mb-3">
        <h1 class="text-center mb-5 display-2"><?php echo $article["title"] ?></h1>
        <div id="dv1" class="border-danger border-5 bg-light px-2 py-5">
            <div class="col-8 mx-auto">
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