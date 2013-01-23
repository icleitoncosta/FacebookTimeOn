<?php
/* Script desenvolvido por Studio Cleiton Costa designer.
 * cleitoncosta83@gmail.com
*/
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
<meta charset="utf-8" />
<title>Quantas horas você esta online no Facebook?</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<style type="text/css">
<!--
#box_coypright{
	width:300px;
	height:80px;
	background-color:#e8e8f2;
	border:1px #3b5997 solid;
	padding:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:#999;
	border-radius:10px;
}
-->
</style>
</head>
<body>
Carregando aplicativo...
<?php
require 'facebook-php-sdk/src/facebook.php';
require 'config.php';

// Para sua segurança mude a appID e a secret, crie uma app seu no Facebook e crie elas.
$facebook = new Facebook(array(
  'appId'  => $appID,
  'secret' => $appSecret,
  'fileUpload' => true,  
  'cookie' => true // enable optional cookie support  
));

// Pegando ID do usuário
$user = $facebook->getUser();


if($user != '' || $user != 0)
{
    $UID    = $user;
 	$img = file_get_contents('https://graph.facebook.com/'.$user.'/picture?width=150&height=152');
	$file = dirname(__file__).'/images/'.$user.'.jpg';
	file_put_contents($file, $img);

	$user2   = $facebook->api('/me');  
	echo "<script>
	$.ajax({
  		url: 'imagem.php?URLIMAGE=".$user."&username=".$user2['name']."',
  		success: function(data) {
    		$('.result').html(data);
    		$.ajax({
  				url: 'ajax.php',
  				success: function(data) {
    				$('.result2').html(data);
    				alert('Tempo calculado, confira o seu perfil.');
  				}
			});
  		}
	});
	</script>
	<div class='result' ></div>
	<div class='result2' ></div>";
 
}else{
    $Params     = array (
                          scope         => 'status_update',
                          redirect_uri  => $urlBack
                        );
 
    $LoginUrl   = $facebook->getLoginUrl($Params);
 
    header("Location: " . $LoginUrl);
 
}
?>
<div id="box_coypright">
Está é uma versão de demonstração criada por Cleiton Costa.<br />
Para ter uma na sua página, entre em contato: cleitoncosta83@gmail.com</div>
</body>
</html>