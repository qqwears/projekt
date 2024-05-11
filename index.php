<?php
include_once "_inc/header.php";
?>

<div id="fight">
  <div class="card text-bg-dark rounded-0 z-n1">
    <img src="img/bg.webp" class="card-img" alt="fight">
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
      <h1>World War II</h1>
    </div>
  </div>
</div>
<hr>

<div class="container py-4">
  <h2 class="my-4">Úžasné príbehy</h2>

  <?php
  $article_object = new Article();
  $articles = $article_object->getAll();

  for ($i = 0; $i < count($articles); $i++) {
    $article = $articles[$i];
  ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <div class="row g-0">
            <img src="img/<?php echo $article["img"] ?>" class="card-img-top" alt="<?php echo $article["title"] ?>">
            <div class="col-8">
              <article class="card-body">
                <h5 class="card-title">
                  <a href="article.php?id=<?php echo $article["id"] ?>" class="stretched-link"><?php echo $article["title"] ?></a>
                </h5>
                <p class="card-text">
                  <?php
                  $text = $article["text"];
                  $short = substr($text, 0, 25);
                  echo $short . "...";
                  ?>
                </p>
                <p class="card-text">
                  <small class="text-body-secondary d-flex flex-column gap-1">
                    <span><b>Dátum:</b> <?php echo $article["date"] ?></span>
                    <span><b>Miesto:</b> <?php echo $article["place"] ?></span>
                  </small>
                </p>
              </article>
            </div>
          </div>
        </div>
      </div>
    <?php
  }
    ?>

    <!--
        <div class="col">
          <div class="card h-100">
            <div class="row g-0">
              <img src="img/lasttank.jpeg" class="card-img-top" alt="Tiger">

              <div class="col-8">
                <article class="card-body">
                  <h5 class="card-title">
                    <a href="Tiger.php" class="stretched-link">Posledný Tiger</a>
                  </h5>
                  <p class="card-text">
                    Kráľovský Tiger bol vrcholom nemeckého...
                  </p>
                  <p class="card-text">
                    <small class="text-body-secondary d-flex flex-column gap-1">
                      <span><b>Dátum:</b> 1. mája 1945</span>
                      <span><b>Miesto:</b> Berlín</span>
                    </small>
                  </p>
                </article>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="row g-0">
              <img src="img/warberlin.jpeg" class="card-img-top" alt="Berlín">

              <div class="col-8">
                <article class="card-body">
                  <h5 class="card-title">
                    <a href="Berlin.php" class="stretched-link">Bitka pri Berlíne</a>
                  </h5>
                  <p class="card-text">
                    Berlín
                  </p>
                  <p class="card-text">
                    <small class="text-body-secondary d-flex flex-column gap-1">
                      <span><b>Dátum:</b> 16. apríla 1945</span>
                      <span><b>Miesto:</b> Berlin</span>
                    </small>
                  </p>
                </article>
              </div>
            </div>
          </div>
        </div>
-->
    </div>
</div>

<video class="w-100" controls id="video">
  <source src="img/video.mp4" type="video/mp4">
</video>

<div class="container-fluid bg-primary bg-secondary text-bg-dark py-5">
  <div class="container">
    <h2 class="mb-4">Často kladené otázky</h2>

    <div class="accordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otazka1" aria-expanded="false" aria-controls="otazka1">
            Odkiaľ získavate fotky?
          </button>
        </h2>
        <div id="otazka1" class="accordion-collapse collapse">
          <div class="accordion-body">
            <strong>Len z oficiálnych zdrojov</strong>, vyhýbame sa podvodníkom a našim čitateľom poskytujeme len čisté informácie.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otazka2" aria-expanded="false" aria-controls="otazka2">
            Sú historické údaje na tejto stránke pravdivé?
          </button>
        </h2>
        <div id="otazka2" class="accordion-collapse collapse">
          <div class="accordion-body">
            <strong>Áno</strong>, všetky príbehy na tejto stránke sú určite spoľahlivé informácie z oficiálnych zdrojov.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once "_inc/footer.php";
?>