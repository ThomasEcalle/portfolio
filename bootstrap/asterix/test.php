
<?php
include ("jeux_asterix_array.php");
try
{
    
  	$bdd = new PDO('mysql:host=localhost;dbname=asterix;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
/*
function epreuve($difficulte, $aptitude){
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


$bool = epreuve(5,15);
if ($bool){ echo "ok";}
else {echo "pas ok";}*/
/*
var_dump ($histoire["20"]);

foreach  ($histoire as $tab){

	if ($tab["image"] =! "none"){
		echo "$histoire[$tab] : <p>ok</p>";
	}
	else {
		echo " $histoire[$tab] :<p>pas ok</p>";
	}
}


function combat($vie_adverse,$vie_perso){
	$resultat = false;
	while(!$resultat){
		echo "<p>Vie perso : $vie_perso</p><p>vie adverse : $vie_adverse</p>";
		$random = rand(1,6);
		$vie_adverse = $vie_adverse - $random;
		echo "<p> vie adverse :  -$random</p>";
		if($vie_adverse <=0){
			$resultat = true;
		}
		else {
			$random = rand(1,6);
			$vie_perso = $vie_perso - $random;
			echo "<p> vie perso :  -$random</p>";
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

if (combat (20,20)){
	echo "<p>victoire</p>";
}
else {
	echo "<p>defaite</p>";
}
*//*
function ajout_objet ($categorie,$nombre_force,$id,$bdd){
		$req = $bdd -> prepare ("SELECT * FROM inventaire WHERE id=".$id);
		$req -> execute();
		$donnees = $req -> fetch();
		if(!empty($donnees)){
			$req2 = $bdd -> prepare ("UPDATE inventaire SET $categorie =".$nombre_force." WHERE id=".$id);
			$req2 -> execute();
			return true;
		}
		else {
			$req2 = $bdd -> prepare ("INSERT INTO inventaire (id,$categorie) VALUES (:id,:nombre_force)");
			$req2 -> execute (array(
			
			"id" => $id,
			"nombre_force" => $nombre_force
			));
			return false;
		}
		
}


if (ajout_objet ("arme",6,3,$bdd)){
	echo "modif effectue";
}
else {
	echo "insertion";
}

$req = $bdd -> prepare ("SELECT * FROM personnage3");
$req -> execute ();
while ($row = $req -> fetchall()){

	for ($i = 0; $i < 9; $i++){
		var_dump($row[$i]);
		}
	
}
*//*
$req = $bdd -> prepare ("SELECT * FROM inventaire");
$req -> execute ();
$row = $req -> fetchall();

if(!empty($row)){
	echo "pas vide";
}
else {
	echo "vide";
}


function ajout_argent ($action,$somme,$bdd,$id){
	if ($action == "ajout"){
		$req = $bdd -> prepare ("UPDATE personnage3 SET bourse= bourse+".$somme." WHERE id=".$id);
		$req -> execute();
		return true;
	}
	else {
		return false;
	}
	
}

if (ajout_argent("ajout",5,$bdd,1)){
	echo "ok";
}
else{echo "ko";}

$req = $bdd -> prepare ('INSERT INTO personnage_test(pseudo,mdp, adresse, combativite, charme, bourse, last) VALUES(:pseudo, :mdp,15, 15, 15,35, 20 );');
$req -> execute (array (
	"pseudo" => "thomas",
	"mdp" => "mdp"
));
echo"ok";
*/


/*
function ajouter_case_interdite ($case,$bdd){
$req = $bdd -> prepare ("SELECT * FROM personnage_test WHERE id=1");
$req -> execute();

$donnees = $req -> fetch();

$tab = array();

echo $donnees["cases_interdites"];


$tab[count($tab)] = $case;

	$req2 = $bdd -> prepare ("INSERT INTO personnage_test cases_interdites=' ".serialize($tab)." ' WHERE id=1");
	$req2 -> execute();
	return true;
}
ajouter_case_interdite("46",$bdd);


$req = $bdd -> prepare ("SELECT * FROM personnage_test WHERE id=1");
$req -> execute();

$donnees = $req -> fetch();

$tab = unserialize($donnees["cases_interdites"]);

print_r($tab);
*/

$id_3= 3;
$id_1 = 1;
/*
$histoire_serialize =  serialize($histoire);
$req = $bdd -> prepare ("UPDATE personnage_test SET cases_interdites= :tableau WHERE id= :id" );
$req -> execute(array(
"tableau" => $histoire_serialize,
"id" => $id
));
*/
function changer_texte ($id,$case,$bdd){
	$req = $bdd -> prepare ("SELECT cases_interdites FROM personnage_test WHERE id=".$id);
	$req -> execute();
	$donnees = $req -> fetch();
	
	$histoire_deserialize = unserialize($donnees["cases_interdites"]);
	
	if($case == "6"){
		$histoire_deserialize["6"]["texte"] = "voici le texte modifié";
	}
	
	$histoire_serialize = serialize($histoire_deserialize);
	
	$req2 = $bdd -> prepare ("UPDATE personnage_test SET cases_interdites= :tableau WHERE id= :id" );
	$req2 -> execute(array(
	"tableau" => $histoire_serialize,
	"id" => $id
	));
}

$req = $bdd -> prepare ("SELECT * FROM personnage_test where id=".$id_1);
$req -> execute();

$req2 = $bdd -> prepare ("SELECT * FROM personnage_test where id=".$id_3);
$req2 -> execute();


$donnees1 = $req -> fetch();
$donnees3 = $req2 -> fetch();

$deserialize1 = unserialize($donnees1["cases_interdites"]);
$deserialize3 = unserialize($donnees3["cases_interdites"]);

echo $deserialize1["6"]["texte"];
echo "<br>";
echo $deserialize3["6"]["texte"];






































?>