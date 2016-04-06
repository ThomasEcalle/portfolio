<?php 
session_start ();
include ("jeux_asterix_array.php");
$pattern = "#^[a-zA-Z0-9]*$#";

$succes = false;

// PARTIE CONNEXION  !!!!!!!!!!!!!!!!
try
{
    
  	$bdd = new PDO('mysql:host=localhost;dbname=asterix;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if(isset ($_POST["inscription"])){
	
	if (!empty ($_POST["nouveau_pseudo"]) && !empty($_POST["nouveau_mdp"])){
		$pseudo =$_POST["nouveau_pseudo"];
		$mdp =$_POST["nouveau_mdp"];
		
		if(preg_match($pattern,$pseudo) && preg_match($pattern,$mdp)){
			$req = $bdd->prepare('INSERT INTO personnage4(pseudo,mdp, adresse, combativite, charme, bourse, last, histoire) VALUES(:pseudo, :mdp,15, 15, 15,35, 0, :histoire );');
			$req->execute(array(
                         'pseudo' =>$pseudo,
                         'mdp' => $mdp,
						 'histoire' => serialize($histoire)
                         ));
			$req2 = $bdd -> prepare ('select id from personnage4 where pseudo ="'.$pseudo.'"AND mdp="'.$mdp.'";');
			$req2->execute();
			$donnees = $req2->fetch();
			$_SESSION["id"] = $donnees["id"];
			
		}
		else {
			echo "pseudo et mot de passe ne doiventcontenir que des lettres ou des chiffres";
		}
	}
	else {
		echo "tous les champs doivent etre renseignes";
	}
}
else if (isset ($_POST["connexion"])){
	$pseudo =$_POST["pseudo"];
	$mdp =$_POST["mdp"];
	if(preg_match($pattern,$pseudo) && preg_match($pattern,$mdp)){
		$req = $bdd -> prepare ("SELECT * FROM personnage4 WHERE pseudo='".$pseudo."' AND mdp='".$mdp."'");
		$req -> execute();
		$donnees = $req -> fetch();
		if (count($donnees) > 0){
			$_SESSION["id"] = $donnees["id"];
			$_POST["choix"] = $donnees["last"];
		}
		else {
			echo "personnage non existant";
		}
	}
}



// PARTIE JEUX !!!!!!!!!!!!!!!!!!!!!

if (isset ($_SESSION["id"])){
	
	// PERSONNAGE
	$req3 = $bdd -> prepare ("SELECT * FROM personnage4 WHERE id=".$_SESSION["id"]);
	$req3 -> execute();
	$donnees2 = $req3 -> fetch();
	
	// INVENTAIRE
	$req4 = $bdd -> prepare ("SELECT * FROM inventaire4 WHERE id=".$_SESSION["id"]);
	$req4 -> execute();
	$donnees3 = $req4 -> fetch();




//  SESSSION
$_SESSION["Adresse"] = $donnees2["adresse"];
$_SESSION["Combativite"] = $donnees2["combativite"] + $donnees3["arme"];
$_SESSION["Charme"] = $donnees2["charme"];
$_SESSION["Bourse"] = $donnees2["bourse"];
$_SESSION["competence_secondaire"] = $donnees2["secondaire"];



// fin SESSION


//       ***************************************************FONCTIONS *******************************************

function changer_texte ($id,$case,$bdd){
	$req = $bdd -> prepare ("SELECT histoire FROM personnage4 WHERE id=".$id);
	$req -> execute();
	$donnees = $req -> fetch();
	
	$histoire_deserialize = unserialize($donnees["histoire"]);
	
	if($case == "6"){
		$tab = array ("2");
		$histoire_deserialize["21"]["texte"] = "<i>Alors, mon petit, comment trouves-tu mon glaive ?</i> ";
		$histoire_deserialize["21"]["choix"] = $tab;
	}
	else if ($case == "13"){
		$tab = array ("2");
		$histoire_deserialize["21"]["texte"] = "<p><i>Alesia, Alesia... Je lui en donnerai moi des Alesia...</i></p><p><ul><li>Agecanonix n'a pas l'air d'humeur à discuter, va en <strong>2</strong> pour faire un autre choix</li></ul></p> ";
		$histoire_deserialize["21"]["choix"] = $tab;
	}
	else if ($case == "25"){
			$tab = array ("2");
		$histoire_deserialize["17"]["texte"] = "<p><i>Que toutatis veille sur nos amis, Goudiurix. Puisses-tu arriver à temps.</i></p><p><ul><li>Retourne en <strong>2</strong></li></ul></p> ";
		$histoire_deserialize["17"]["choix"] = $tab;
	}
	
	$histoire_serialize = serialize($histoire_deserialize);
	$req2 = $bdd -> prepare ("UPDATE personnage4 SET histoire = :tableau WHERE id= :id" );
	$req2 -> execute(array(
	"tableau" => $histoire_serialize,
	"id" => $id
	));
}
function epreuve_reussi($difficulte, $aptitude){
	for ($i = 0; $i < $difficulte ; $i++){
		$random = rand(1,6);
		$aptitude = $aptitude - $random;
	}
	if ($aptitude > 0){
		return true;
	}
	else {
		return false;
	}
}


function combat($vie_adverse,$vie_perso){
	$resultat = false;
	while(!$resultat){
		$random = rand(1,6);
		$vie_adverse = $vie_adverse - $random;
	
		if($vie_adverse <=0){
			$resultat = true;
		}
		else {
			$random = rand(1,6);
			$vie_perso = $vie_perso - $random;
			
			if ($vie_perso <= 0){
				$resultat = true;
			}
		}
	}
	if ($vie_adverse<=0){
		return true;
	}
	else{
		return false;
	}
}

function ajout_objet ($categorie,$nombre_force,$id,$bdd){
		$req = $bdd -> prepare ("SELECT * FROM inventaire4 WHERE id=".$id);
		$req -> execute();
		$donnees = $req -> fetch();
		if(!empty($donnees)){
			$req2 = $bdd -> prepare ("UPDATE inventaire4 SET $categorie =".$nombre_force." WHERE id=".$id);
			$req2 -> execute();
			
		}
		else {
			$req2 = $bdd -> prepare ("INSERT INTO inventaire4 (id,$categorie) VALUES (:id,:nombre_force)");
			$req2 -> execute (array(
			
			"id" => $id,
			"nombre_force" => $nombre_force
			));
			
		}
		
}
function ajout_argent ($action,$somme,$bdd,$id){
	if ($action == "ajout"){
		$req = $bdd -> prepare ("UPDATE personnage4 SET bourse= bourse+".$somme." WHERE id=".$id);
		$req -> execute();
	}
	
}



$debut = true;
$_SESSION["choix"] ="0";

if (isset ($_POST)){
	if(isset ($_POST["competence_secondaire"])){
		if ($_POST["competence_secondaire"] == "commerce" || $_POST["competence_secondaire"] == "elevage" || $_POST["competence_secondaire"] == "chasse" || $_POST["competence_secondaire"] == "ivresse" ){
			$req = $bdd -> prepare ("UPDATE personnage4 SET secondaire ='".$_POST["competence_secondaire"]."' WHERE id=".$_SESSION["id"]);
			$req -> execute();
			$_SESSION["competence_secondaire"] = $_POST["competence_secondaire"];
			$debut = false;
		}
		
	}
	if (isset ($_POST["choix"])) {
				$req = $bdd -> prepare ("SELECT * FROM personnage4 WHERE id=".$_SESSION["id"]);
				$req -> execute();
				$last = $req -> fetch();
			
			if ($_POST["choix"] == "epreuve d'adresse" || $_POST["choix"] == "epreuve d'ivresse" || $_POST["choix"] == "epreuve de charme" || $_POST["choix"] == "epreuve de chasse" || $_POST["choix"] == "epreuve de combativite" || $_POST["choix"] == "combat" ){
				$epreuve = $_POST["choix"];
				
				
				
				$difficulte = $histoire[$last['last']]["epreuve"]["difficulte"];
				
				if ($epreuve == "epreuve d'adresse"){
					if (epreuve_reussi($difficulte,$last["adresse"])){
						$lechoix = $histoire[$last['last']]["epreuve"]["succes"];
					}
					else {
						$lechoix = $histoire[$last['last']]["epreuve"]["echec"];
					}
					
				}
				else if ($epreuve == "epreuve de combativite"){
					if (epreuve_reussi($difficulte,$last["combativite"])){
						$lechoix = $histoire[$last['last']]["epreuve"]["succes"];
					}
					else{
						$lechoix = $histoire[$last['last']]["epreuve"]["echec"];
					}
				}
				else if ($epreuve == "combat"){
					if (combat($difficulte,$last["combativite"])){
						$lechoix = $histoire[$last['last']]["epreuve"]["succes"];
					}
					else{
						$lechoix = $histoire[$last['last']]["epreuve"]["echec"];
					}
				}
			$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
			$req2 -> execute();
			$debut = false;
			$_SESSION["choix"] =  $lechoix;
				
			}
			else if ($_POST["choix"] == "13"){
				$derniere_case = $last["last"];
				changer_texte($_SESSION["id"],$_POST["choix"],$bdd);
				$lechoix = "13";
				
				$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
						$req2 -> execute();
						$debut = false;
						$_SESSION["choix"] = $lechoix;
			}
			else if ($_POST["choix"] == "25"){
				$derniere_case = $last["last"];
				changer_texte($_SESSION["id"],$_POST["choix"],$bdd);
				$lechoix = "25";
				
				$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
						$req2 -> execute();
						$debut = false;
						$_SESSION["choix"] = $lechoix;
			}
			else if ($_POST["choix"] == "prendre l'objet"){
				$derniere_case = $last["last"];
				if($derniere_case == "6"){
					ajout_objet("arme",3,$_SESSION["id"],$bdd);
				
					$lechoix = "6-1";
					changer_texte($_SESSION["id"], $derniere_case,$bdd);
				}
						$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
						$req2 -> execute();
						$debut = false;
						$_SESSION["choix"] = $lechoix;
			}
			else if ($_POST["choix"] == "prendre l'argent" ){
				$derniere_case = $last["last"];
				if ($derniere_case == "22"){
					ajout_argent("ajout",5,$bdd,$_SESSION["id"]);
					$lechoix = "22-1";
				}
					$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
						$req2 -> execute();
						$debut = false;
						$_SESSION["choix"] = $lechoix;
				
			}
			else if ($_POST["choix"] == "prendre les objets"){
				$derniere_case = $last["last"];
				if ($derniere_case == "25"){
					ajout_objet("torche",5,$_SESSION["id"],$bdd);
					ajout_objet("potion",5,$_SESSION["id"],$bdd);
					ajout_objet("provision",1,$_SESSION["id"],$bdd);
					ajout_argent("ajout",30,$bdd,$_SESSION["id"]);
					$lechoix = "25-1";
				}
				$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$lechoix."' WHERE id=".$_SESSION["id"]);
						$req2 -> execute();
						$debut = false;
						$_SESSION["choix"] = $lechoix;
			}
			else {
			$req2 = $bdd -> prepare ("UPDATE personnage4 SET last='".$_POST["choix"]."' WHERE id=".$_SESSION["id"]);
			$req2 -> execute();
			$debut = false;
			$_SESSION["choix"] = $_POST["choix"];
			}
			
		
	}
	
	
	
}
?>
<html>
	<head>
		<title>Thomas Ecalle</title>
		<meta charset="utf-8">
		<link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="jeux_asterix.css" rel="stylesheet">
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
						<a href="" class="btn btn-info navbar-btn navbar-right">Contactez-moi</a>
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
						<?php 
							if (!$debut &&  $histoire[$_SESSION["choix"]]["image"] != "none" ){
								?>
								<!--<img src ="<?php echo $histoire[$_SESSION["choix"]]["image"] ?>" alt ="image">-->
								<img src="<?php echo $histoire[$_SESSION["choix"]]["image"] ?>" alt="image" class="img-rounded">
								<?php
							}
							else {
								
							
						?>
						<h1>Le rendez-vous du chef ! </h1>
						<p>Cette aventure s'adapte aux choix que vous faites ! Avancez avec prudence..</p>
							<?php } ?>
					</div>
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<div class="table-responsive">
								<table class="table">
								
									<tr>
  										<th>Adresse</th>
										<th>Combativité</th>
										<th>Charme</th>
										<th>Aptitude secondaire</th>
										<th>Bourse</th>
									
									</tr>
									<tr>
										<td><?php echo $_SESSION["Adresse"]; ?></td>
										<td><?php echo $_SESSION["Combativite"]; ?></td>
										<td><?php echo $_SESSION["Charme"]; ?></td>
										<td><?php if (!empty($_SESSION["competence_secondaire"])) { echo $_SESSION["competence_secondaire"];}?></td>
										<td><?php echo $_SESSION["Bourse"];?></td>
									</tr>
								</table>
							</div>
						</div><!-- fin col -->
						<div class="col-md-6 col-xs-6">
							<?php 
								
								$sql = $bdd -> prepare ("SELECT * FROM personnage4 WHERE id=".$_SESSION["id"]);
								$sql -> execute();
								$donnees = $sql ->fetch();
								$histoire_deserialize = unserialize($donnees["histoire"]);
								if ($debut){
									echo $histoire_bonus['intro']['texte'];
									echo "<form method='post'><div class='btn-group btn-group-justified' role='group' aria-label='...'>";
									foreach ($histoire_bonus['intro']['choix'] as $key => $choix){?>
										 <div class="btn-group" role="group">
											<input type="submit" class="btn btn-default" value="<?php echo $choix; ?>" name="competence_secondaire">
										</div>
										<?php
										
									}
								}
								else {
									
									echo $histoire_deserialize[$_SESSION["choix"]]['texte'];
									echo "<form method='post'><div class='btn-group btn-group-justified' role='group' aria-label='...'>";
									foreach ($histoire_deserialize[$_SESSION["choix"]]["choix"] as $key => $value){?>
										 <div class="btn-group" role="group">
											<input type="submit" class="btn btn-default" value="<?php echo $value; ?>" name="choix">
										</div>
										<?php
									}
									
									}
								
								echo "</div></form>";
								
							?>
						</div>
					</div><!-- fin row -->
				</div>
	</body>
</html>
<?php
}
?>
