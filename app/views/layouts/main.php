<?php
// app/views/layouts/main.php
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gym MVC (PHP puro)</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css">
</head>
<body>
<header class="topbar">
  <h1>Hola Mundo</h1>
  <nav>
    <a href="?c=home&a=index">Inicio</a>
    <a href="?c=clientes&a=index">Clientes</a>
    <a href="?c=planes&a=index">Planes</a>
    <a href="?c=productos&a=index">Productos</a>
    <a href="?c=entrenadores&a=index">Entrenadores</a>
    <a href="?c=asistencia&a=index">Asistencia</a>
    <a href="?c=mensualidades&a=index">Mensualidades</a>
    <a href="?c=ventas&a=index">Ventas</a>
    <a href="?c=compras&a=index">Compras</a>
  </nav>
</header>
<main class="container">
  <?php \Core\View::partial($view ?? 'home/index', get_defined_vars()); ?>
</main>
<script src="<?= BASE_URL ?>/assets/js/app.js"></script>
</body>
</html>
