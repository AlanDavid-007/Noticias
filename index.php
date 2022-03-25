<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Noticia;

$noticias = Noticia::getNoticias();
// echo "<pre>"; print_r($Noticias); echo "</pre>"; exit;

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/listagem.php';

require __DIR__ . '/INCLUDES/footer.php';
?>