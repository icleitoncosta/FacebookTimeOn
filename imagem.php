<?php
header("Content-type: image/jpeg");

require 'config.php';

$nomeuser = $_GET['username'];

// Recebe o caminho para a Imagem por GET na URL.
$imagem = 'images/'.$_GET['URLIMAGE'].'.jpg';
$background_2 = array_rand($imagens, 2);
$background = $imagens[$background_2[1]];

$imagem1 = imagecreatefrompng($background);

// Definimos aqui a cor do Texto, lembrando que as cores são especificadas em padrao RBG
$texto = imagecolorallocate($imagem1, 59, 89, 151);
// Com o comando imagestring() escrevemos os textos, neste comando especificamos os parametros da imagem, o tamanho da fonte que neste caso vai de 1 a 5, a posição X e Y, o texto, e a cor (que definimos acima)
imagettftext($imagem1, $tamFon, 0, $x, $y, $texto, $fonte, $nomeuser.',');

$imagem2 = imagecreatefromjpeg($imagem);

imagecopymerge($imagem1, $imagem2,29,148,0,0, imagesx($imagem2), imagesy($imagem2),100);

imagejpeg($imagem1, 'images/'.$_GET['URLIMAGE'].'-large.jpg', 100);
imagedestroy($imagem1);

?>