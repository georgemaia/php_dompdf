<?php

use Dompdf\Dompdf;

require __DIR__ . "/vendor/autoload.php";

$dompdf = new Dompdf();             // enable_remote deve ser setado para true caso deseje exibir midias externas
$dompdf->loadHtml("<h1>Olá Mundo!!</h1><p>Esse é o meu PDF!</p>");

 ob_start();                                 // inicia captura conteudo arquivo
 require __DIR__ . "/contents/users.php";    // arquivo a ser impresso em PDF
 $dompdf->loadHtml(ob_get_clean());         // finaliza captura conteudo 

$dompdf->setPaper("A4", "landscape");

$dompdf->render();
$dompdf->stream("file.pdf",["Attachment"=> false]);