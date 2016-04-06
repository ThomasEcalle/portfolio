<?php

$to = "thomasecalle@hotmail.fr";
$entetes = array (
"email",
"objet",
"message"
);

if (!empty($_POST)){
	
	foreach ($entetes as $value){
		$$value = $_POST[$value];
	}
	

	if ($email == "" || $objet == "" || $message ==""){
	$erreur = "Tous les champs doivent être renseignés";
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{	
	$erreur = "L'adresse email n'est pas correcte";
	}
	elseif(strlen($objet) > 100 )
	{
	$erreur = "L'objet doit faire moins de 100 caractères ";
	}
	else {
		/*$message = wordwrap($message, 70, "\r\n");*/
		$headers = "MIME-Version : 1.0"."\r\n";
		$headers .= "Content-type:text/html; charset=utf-8";
		mail($to,$objet,$message,"From:".$email,$headers);
		//mail($to,$objet,$message,$headers);
		$succes =  "message envoyé";
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thomas Ecalle</title>
		<meta charset="utf-8">
		<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-targets="#navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="index.html" class="navbar-brand">Thomas Ecalle</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar-collapse">
						<a href="" class="btn btn-info navbar-btn navbar-right">Contactez-moi</a>
							<ul class="nav navbar-nav">
								<li><a href="index.html">Accueil</a></li>
								<li><a href="cv.html">Mon CV</a></li>
								<li><a target="_blank" href="VeilleNFC.pdf">Veille NFC</a></li>
								<li><a href="projets.html" class="active">Mes projets</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="jumbotron">
				<div class="container text-center">
					<h1>Contactez moi</h1>
					<p>Envoyez-moi un mail pour toute question !</p>
				</div>
				</div>
					<div class="container">
						<form class="form-horizontal" method="post" action="contactez-moi.php">
						  <div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-8">
							  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
							</div>
						  </div>
						  <div class="form-group">
							<label for="objet" class="col-sm-2 control-label">Objet</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="objet" placeholder="Objet" name="objet">
							</div>
						  </div>
						  <div class="form-group">
							<label for="message" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-8">
							  <textarea class="form-control" rows="3" placeholder="Message" id="message" name="message"></textarea>
							</div>
						</div> 
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" class="btn btn-default">Envoyer</button>
								</div>
							  </div>
						</form>
						<?php 
							if (isset($erreur)){
								
							
						?>
						<p class="text-danger"><?php echo $erreur ?></p>
						<?php 
							}
						?>
						<?php 
							if (isset($succes)){
								
							
						?>
						<p class="text-success"><?php echo $succes ?></p>
						<?php 
							}
						?>
						
					</div>