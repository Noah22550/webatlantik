<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="assets/img/quiberon.jpg" class="d-block w-100">

      <div class="carousel-caption custom-caption">
        <h1>Bienvenue en Bretagne</h1>
        <p>Découvrez des paysages incroyables</p>
        <a href="#" class="btn btn-primary">Découvrir</a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="assets/img/iledegroix.jpg" class="d-block w-100">

      <div class="carousel-caption custom-caption">
        <h1>Île de Groix</h1>
        <p>Un coin de paradis</p>
        <a href="#" class="btn btn-light">Voir plus</a>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>