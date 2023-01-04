<!DOCTYPE html>
<html lang="fr">
	<head>	
		<meta charset="UTF-8">
		<title>Projet 3 SN</title>
	</head>

<body>

<!-- CSS -->
<style>
#T1, #T2, #T3 {
padding:1px 0;
flex: 27%;
}

/* 3 tableaux	*/
#main {	
	display: flex;
	flex-wrap: wrap;}

#scroll1 {
	width: 600px;
	height: 150px;
	overflow: auto;
}

#scroll2 {
	width: 600px;
	height: 150px;
	overflow: auto;
} 

#scroll3 {
	width: 220px;
	height: 150px;
	overflow: auto;
}

h1 {
  color: white;
}

/*	En-tete des tableaux */
th {
  background-color: #F60000;
  color: white;
}
body{
	margin:0;
	padding:0;
	font-family:"arial",heletica,sans-serif;
	font-size:12px;
  background: #2980b9 url('https://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
	-webkit-animation: 10s linear 0s normal none infinite animate;
	-moz-animation: 10s linear 0s normal none infinite animate;
	-ms-animation: 10s linear 0s normal none infinite animate;
	-o-animation: 10s linear 0s normal none infinite animate;
	animation: 10s linear 0s normal none infinite animate;
 
}
 
@-webkit-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-moz-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-ms-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-o-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
</style>
<!-- --------------------------------------------------------------Début code  --------------------------------------------------------------------- -->
<h1 style="text-align:center" color=white> Outils de visualisation d'informations EVO BUS FRANCE</h1> 
<hr>

<?php
//Se connecter au serveur SQL 	
// all privileges : Serveur_p3		YES
//Serveur_P3    3r3tLz7
//PCouvrier U46vBy
//Capteur* 	r3p4P 
include_once 'function.php';
require_once 'pdoconfig.php';

$mysqli = getBDD();
//$mysqli= new mysqli("127.0.0.1", "root", "root","projet") or die (mysqli_error ());

//IF d'ajout vehicule
if ($_GET['action'] == "env") {
	
	//Recuperer les variables
	if (isset ($_POST['num_idd'])) {
		$num_idd = $_POST['num_idd']; }
	else{
		$num_idd = " ";  }

	if (isset ($_POST['modele'])) {
		$modele = $_POST['modele'];  }
	else{
		$modele = " ";  }

	if (isset ($_POST['marque'])) {
		$marque = $_POST['marque']; }
	else{
		$marque = " ";  }

	//Créer la requete ajouter un vehicule 
	$add_vehicule = 'INSERT INTO vehicule (num_idd, modele, marque) VALUES ("'.$num_idd.'","'.$modele.'","'.$marque.'");';

   	//Si connection OK ecrire :  
	if (mysqli_query($mysqli, $add_vehicule)){
    	echo "Connection acceptée";   }
	else {
 	  	echo "Erreur : ' . $add_vehicule . '<br>' . mysqli_error($mysqli)";  }

 	//Rafraichir la page
	echo "<meta http-equiv='refresh' content='0.01; URL=accueil.php?action=ajout'>";
}


//IF de suppression vehicule
else if ($_GET['action'] == "del") {

	//Recuperer les variables
	if(isset($_GET["id_vehicule"])) {
   		$id_vehicule = $_GET['id_vehicule'];	}
	else { $id_vehicule = " "; }

	//Créer la requete de suppression de vehicule 
	$supp = " DELETE FROM vehicule WHERE id_vehicule = '".$id_vehicule."'" ; 

	//si connection OK ecrire :  
	if (mysqli_query($mysqli, $supp)){
    	//echo "Connection au serveur acceptée";   
	}
	else {
		echo "Erreur : ' . $supp . '<br>' . mysqli_error($mysqli)";  }	

	//Rafraichir la page
	echo "<meta http-equiv='refresh' content='0.01;URL=accueil.php?action=ajout'>";

}

else {	//Requete SQL vehicule
	$aff_vehicule = "SELECT * FROM vehicule ";

	//Executer la requete 
	$req = mysqli_query($mysqli, $aff_vehicule);

	//Tableau	
	echo '<h3 style="text-align:center"> Vehicule</h3> 
		<h3> Choix de vehicule</h3>
				<table border="1"> 
					<tr>
						<th style="text-align:center" width="100">
						<strong> Numéro de suivi </strong> </th>

						<th style="text-align:center" width="200">
						<strong> Marque </strong> 		 </th>

						<th style="text-align:center" width="200">
						<strong> Modele </strong>			 </th>
							
						<th style="text-align:center" width="200">
							<strong> Supprimer </strong> 		 </th>

						<th style="text-align:center" width="200">
						<strong> Modifier </strong> 		 </th>
					</tr>     
	';

	//Requete des informations vers le tableau
	while($row = mysqli_fetch_array($req)) {	
		echo" 
			<tr>  
				<td style='text-align:center'> ".$row["num_idd"]."	</td>
				<td style='text-align:center'> ".$row["marque"]."	</td>
				<td style='text-align:center'> ".$row["modele"]."	</td>
				<td style='text-align:center'> <a href='accueil.php?action=del&id_vehicule=".$row["id_vehicule"]."'> Supprimer </a> </td>
				<td style='text-align:center'> <a href='form_modification.php?action=mod&id_vehicule=".$row["id_vehicule"]."'> Modifier </a>  </td> 
			</tr> 
		";	
	}


	//Formulaire a remplir sous le tableau: 
	echo "  <form  action='accueil.php?action=env' method='post'>
				<tr>
					<td style='text-align:center'> <input type='text' name='num_idd'/>  					</td>
					<td style='text-align:center'> <input type='text' name='marque'/>						</td>
					<td style='text-align:center'> <input type='text' name='modele'/>						</td>
					<td style='text-align:center'> <input type='submit' name='ajouter1' value='Ajouter le vehicule'/>   </td>
				</tr>
			</form>
		</table>
	";
}
// --------------------------------------------------------------Tableaux informations --------------------------------------------------------------------- 
?>
<br><br>

<div id="main">
	<div id="T1">
<?php 
	//Requete SQL capteur temp/humi/date
	$SQLmesure  = "SELECT * FROM mesure  ";

	//Executer la requete 
	$reqmesure = mysqli_query($mysqli, $SQLmesure );

	//entete de tableau:
	echo '
		<h3> Informations du capteur </h3>';
?>
		<div id="scroll1">
	<?php 
			echo'	<table border="1">
					<tr>
						<th style="text-align:center" width="300">
						<strong>Date et heure</strong>					</th>

						<th style="text-align:center" width="200">
						<strong>Temperature</strong>					</th>

						<th style="text-align:center" width="200">
						<strong>Humidité en %</strong>						</th>
					</tr>	
				';
		
		//requete des info vers le tableau
		while($row = mysqli_fetch_array($reqmesure)) {
				echo"
					<tr>
						<td style='text-align:center'> ".$row["date_heure"]."	</td>
						<td style='text-align:center'> ".$row["temperature"]."	</td>
						<td style='text-align:center'> ".$row["humidite"]."		</td>
					</tr>
				";	
		}
		echo"	</table>";
?>
		</div>
	</div>

	<div id="T2">
<?php 
	//Requete SQL info bus
	$SQLbus  = "SELECT * FROM bus ";

	//Executer la requete 
	$reqbus = mysqli_query($mysqli, $SQLbus );	

//entete de tableau:S
	echo '
	<h3> Informations du bus </h3> ';
?>
		<div id="scroll2">
<?php
		
		echo' 
				<table border="1">
						<tr>				
							<th style="text-align:center" width="200">
							<strong>Code barre du bus</strong>		</th>

							<th style="text-align:center" width="250" >
							<strong>Date de debut </strong>			</th>

							<th style="text-align:center" width="250">
							<strong>Date de fin </strong>			</th>
						</tr>	   
		';

			//requete des info vers le tableau
			while($row = mysqli_fetch_array($reqbus)) {
				echo"
					<tr>
						<td style='text-align:center'> ".$row["cb_bus"]."			</td>
						<td style='text-align:center'> ".$row["date_debut"]."		</td>
						<td style='text-align:center'> ".$row["date_fin"]."			</td>
					</tr>
					";	}
		echo"	</table>";
?>
		</div>
	</div>

<br><br><br>

	<div id="T3">
<?php
		//Requete SQL pare brise
		$SQLpare_brise = "SELECT * FROM pare_brise ";

		//Executer la requete 
		$reqpare_brise = mysqli_query($mysqli, $SQLpare_brise);

		//Entete de tableau:
		echo '
		<h3> Informations des pares brise </h3>';
?>
		<div id="scroll3">
<?php
			echo' 
					<table border="1" >
						<tr>
							<th style="text-align:center" width="200">
								<strong>code pare brise </strong>			</th>
						</tr>	   
			';
			
				//Requete des info vers le tableau
				while($row = mysqli_fetch_array($reqpare_brise)) {
					echo"
						<tr>
							<td style='text-align:center'> ".$row["cb_parebrise"]."	</td>
						</tr>		";	}
			echo"	</table>";
		
?> 
		</div>
	</div>
</div>

<br><br>

<!-- --------------------------------------------------------------Recherche par date --------------------------------------------------------------------- -->
<?php
@$keywords=$_GET["keywords"];
@$valider=$_GET["valider"];

if(isset($valider) && !empty(trim($keywords))){
  $res=$conn->prepare("SELECT date_heure FROM mesure WHERE date_heure LIKE '%$keywords%'  ");
  $res->setFetchMode (PDO:: FETCH_ASSOC) ;
  $res->execute();
  $tab=$res->fetchAll();
  $afficher="afficher_result";
  $recup_recherche = $keywords  ;
}
?>

<title>Barre de recherche</title>
<h2>Rechercher les informations via une date sous la forme : AAAA-MM-JJ HH:MM:SS </h2>
<h4> Exemple : 2022-06-09 07:13:28</h4>
<form name="fo" method="get" action="recherche_date.php">
	<input type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Rechercher ..." />
	<input type="submit" name="valider" value="Rechercher" />
</form>

<?php if(@$afficher=="afficher_result") { ?>   
  <div id="resultats">
  	<div id="nbr"> <?=count($tab)." ".(count($tab)>1?"Résultats trouvés":"Résultat trouvé")?> </div>
    	<ol>
        <?php for($i=0;$i<count($tab);$i++){ ?>
        <li><?php echo $tab[$i] ["date_heure"] ?> </li>
      	<?php } ?>
   		</ol>
  </div>
   <?php } ?>

<br>
<!-- --------------------------------------------------------------Recherche par numero de suivi --------------------------------------------------------------------- -->
<?php
@$mot_recherche=$_GET["mot_recherche"];
@$valider=$_GET["valider"];

if(isset($valider) && !empty(trim($mot_recherche))){
  $res=$conn->prepare("SELECT num_idd FROM vehicule WHERE num_idd LIKE '%$mot_recherche%'  ");
  $res->setFetchMode (PDO:: FETCH_ASSOC) ;
  $res->execute();
  $tab=$res->fetchAll();
  $afficher="afficher_result";
  $recup_recherche_suivi = $mot_recherche  ;
}
?>
<title>Barre de recherche</title>
<h2>Rechercher les informations via une numéro de suivi </h2>

<form name="fo" method="get" action="recherche_suivi.php">
	<input type="text" name="mot_recherche" value="<?php echo $mot_recherche ?>" placeholder="Rechercher ..." />
	<input type="submit" name="valider" value="Rechercher" />
</form>

<?php if(@$afficher=="afficher_result") { ?>   
  <div id="resultats">
  	<div id="nbr"> <?=count($tab)." ".(count($tab)>1?"Résultats trouvés":"Résultat trouvé")?> </div>
    	<ol>
        <?php for($i=0;$i<count($tab);$i++){ ?>
        <li><?php echo $tab[$i] ["num_idd"] ?> </li>
      	<?php } ?>
   		</ol>
  </div>
   <?php } ?>
<br><br>

<!-- --------------------------------------------------------------Graphique --------------------------------------------------------------------- -->
<?php 
echo" 
<h2> <p> Cliquez <a href='graphique.php'> ICI</a> afin d'afficher les mesures sous forme de graphique <p> </h2>
<p> Exemple d'affichage : <p>
<img src='./graph_exemple.png'/>
<br><br> ";

// --------------------------------------------------------------Affichage des bilans ---------------------------------------------------------------------

echo"
	<h3> Afficher les bilans de mesure </h3>
	<p> Cliquez <button onClick='window.print()'> ICI </button> afin d'afficher et d'imprimer un bilan </p>
";

 	//Rafraichir la page
	echo "<meta http-equiv='refresh' content='600; URL=accueil.php?action=ajout'>";
?>

</body>
</html>