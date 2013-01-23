<?php
/*
 * Aqui ficarão todas as configurações do seu aplicativo
 * cleitoncosta83@gmail.com
*/

// Configurações de aplicativo
// Para sua segurança mude a appID e a secret, crie uma app seu no Facebook e crie elas.


$appID = '582273998466125';
$appSecret = 'a3f6d14f489d8ae4a1bbf82d246c8780';
$urlBack = 'http://horasonlinecl.eu5.org/facebook/app1/';
$textoMsg = 'Veja você também a quantas horas está online...';

// Configurações de string da imagem:
// Array contendo as imagens de background com a hora online.
$imagens = array(
	'images/background1.png',
	'images/background2.png',
	'images/background3.png',
	'images/background4.png',
	'images/background5.png'
	);
$fonte = 'MarkerFelt.ttf'; // Aqui é a fonte que está no diretorio local, para criar o nome do usuário
$tamFon = 32; // Tamanho da fonte do nome do usuário
$x = 210; // Distancia do lado esquerdo da foto, para onde será escrito o nome do usuário
$y = 250; // Distancia do topo da foto, para onde será escrito o nome do usuário
