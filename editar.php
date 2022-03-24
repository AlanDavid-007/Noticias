<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Noticia');

use \App\Entity\Noticia;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obNoticia = Noticia::getNoticia($_GET['id']);
// echo "<pre>"; print_r($obNoticia); echo "<pre>"; exit;

//Validação da Vaga
if (!$obNoticia instanceof Noticia) {
    header('location: index.php?status=error');
    exit;
}
//Validação do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['autor'], $_POST['data'], $_POST['status'])) {

    $obNoticia->titulo = $_POST['titulo'];
    $obNoticia->descricao = $_POST['descricao'];
    $obNoticia->autor = $_POST['autor'];
    $obNoticia->data = $_POST['data'];
    $obNoticia->status = $_POST['status'];

    $obNoticia->atualizar();
    // echo "<pre>"; print_r($obNoticia); echo "</pre>"; exit; 

    header('location: index.php?status=success');
    exit;
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formulario.php';

require __DIR__ . '/INCLUDES/footer.php';
