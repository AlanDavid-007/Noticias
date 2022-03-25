<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Noticia;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Noticia
$obNoticia = Noticia::getNoticia($_GET['id']);
// echo "<pre>"; print_r($obNoticia); echo "<pre>"; exit;

//Validação da Noticia
if (!$obNoticia instanceof Noticia) {
    header('location: index.php?status=error');
    exit;
}
//Validação do POST
if (isset($_POST['excluir'])) {

    $obNoticia->excluir();

    header('location: index.php?status=success');
    exit;
}

require __DIR__ . '/INCLUDES/header.php';
require __DIR__ . '/INCLUDES/confirmarExclusao.php';
require __DIR__ . '/INCLUDES/footer.php';
