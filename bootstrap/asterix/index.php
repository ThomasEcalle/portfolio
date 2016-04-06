
<!DOCTYPE html>
<html>
	<head>
		<title>Jeux asterix</title>
		<meta charset="utf-8">
		<link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
							<a href="" class="navbar-brand">Thomas Ecalle</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar-collapse">
						<a href="../contactez-moi.php" class="btn btn-info navbar-btn navbar-right">Contactez-moi</a>
							<ul class="nav navbar-nav">
								<li><a href="../index.html">Acceuil</a></li>
								<li><a href="../cv.html">Mon CV</a></li>
								<li><a href="">PortFolio</a></li>
								<li><a href="../projets.html" class="active">Mes projets</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="jumbotron">
					<div class="container text-center">
						<h1>Le rendez-vous du chef ! </h1>
						<p>Cette aventure s'adapte aux choix que vous faites ! Avancez avec prudence..</p>
					</div>
				</div>
				
				<div class="container">
						<div class="row">
							<div class="col-md-6">
								<section>
									<div class="page-header">
									<h2>Continuer ma partie</h2>
									</div>
									<form class="form-horizontal" method="post" action="jeux_asterix.php">
									  <div class="form-group">
										<label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo">
										</div>
									  </div>
									  <div class="form-group">
										<label for="mdp" class="col-sm-2 control-label">Mot de passe</label>
										<div class="col-sm-8">
										  <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="mdp">
										</div>
									  </div>
									<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											  <button type="submit" class="btn btn-default" name="connexion">Reprendre ma partie</button>
											</div>
										  </div>
									</form>
								</section>
							</div>
							<div class="col-md-6">
								<section>
									<div class="page-header">
									<h2>Nouveau joueur</h2>
									</div>
									<form class="form-horizontal" method="post" action="jeux_asterix.php">
									  <div class="form-group">
										<label for="nouveau_pseudo" class="col-sm-2 control-label">Pseudo</label>
										<div class="col-sm-8">
										  <input type="text" class="form-control" id="nouveau_pseudo" placeholder="Pseudo" name="nouveau_pseudo">
										</div>
									  </div>
									  <div class="form-group">
										<label for="nouveau_mdp" class="col-sm-2 control-label">Mot de passe</label>
										<div class="col-sm-8">
										  <input type="password" class="form-control" id="nouveau_mdp" placeholder="Mot de passe" name="nouveau_mdp">
										</div>
									  </div>
									<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
											  <button type="submit" class="btn btn-default" name="inscription">inscription</button>
											</div>
										  </div>
									</form>
								</section>
							</div>
						</div>
				</div>