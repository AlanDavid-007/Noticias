<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Noticia');

use \App\Entity\Noticia;

$obNoticia = new Noticia;

// echo "<pre>"; print_r($_POST['descricao']); echo "</pre>"; exit;
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['autor'], $_POST['data'], $_POST['status'])) {

    $obNoticia->titulo = $_POST['titulo'];
    $obNoticia->descricao = $_POST['descricao'];
    $obNoticia->autor = $_POST['autor'];
    $obNoticia->data = $_POST['data'];
    $obNoticia->status = $_POST['status'];
    $obNoticia->cadastrar();
    // echo "<pre>"; print_r($obNoticia); echo "</pre>"; exit; 

    header('location: index.php?status=success');
    exit;
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formulario.php';

require __DIR__ . '/INCLUDES/footer.php';
