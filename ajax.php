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

if($user)
{
    $UID    = $user;
    $user   = $facebook->api('/me');  
	
	$facebook->setFileUploadSupport(true);  

	# File is relative to the PHP doc  
	$file = "@".realpath('images/'.$UID.'-large.jpg');  

	$args = array(  
    	'message' => $textoMsg,  
    	"image" => $file  
	);  
	
	$data = $facebook->api('/me/photos', 'post', $args);
	if ($data){
		print_r('Acesse o seu <a href="'. $user["link"] .'" title="Acesse seu perfil por aqui.">perfil</a> agora mesmo e veja a quantas horas você está online.') ;
		unlink('images/'.$UID.'-large.jpg');
		unlink('images/'.$UID.'.jpg');
	}
 
}else{
    $Params     = array (
                          scope         => 'status_update',
                          redirect_uri  => $urlBack
                        );
 
    $LoginUrl   = $facebook->getLoginUrl($Params);
 
    header("Location: " . $LoginUrl);
 
}