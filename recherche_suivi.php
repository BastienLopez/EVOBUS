<style>
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


<?php
	include_once 'function.php';

	$mysqli = getBDD();

		//Recuperer les variables
		@$recup_recherche_suivi=$_GET["mot_recherche"];

	  $SQL_recherche_suivi  = "SELECT cb_bus, date_debut, date_fin, date_heure  FROM bus  WHERE cb_bus = '".$recup_recherche_suivi."'  ";

		//Executer la requete 
		$req_rech_suivi = mysqli_query($mysqli, $SQL_recherche_suivi );

		//entete de tableau:
		echo '<br>
			<h1 style="text-align:center"> Informations liées à la date demandée </h1>  
			<table border="1">
			<tr>
				<th style="text-align:center" width="200">
				<strong>cb_bus</strong>           </th>

				<th style="text-align:center" width="300">
				<strong>date_debut</strong>             </th>

				<th style="text-align:center" width="300">
				<strong>date_fin</strong>             </th>

				<th style="text-align:center" width="200">
				<strong>date_heure</strong>            </th>
	    </tr> 
		';
	      
		//requete des info vers le tableau
	    while($row = mysqli_fetch_array($req_rech_suivi)) {
			echo"
			<tr>         
				<td style='text-align:center'> ".$row["cb_bus"]."   		 </td>
	      <td style='text-align:center'> ".$row["date_debut"]."    </td>
	      <td style='text-align:center'> ".$row["date_fin"]."      </td>
	      <td style='text-align:center'> ".$row["date_heure"]."    </td>
	    </tr> 
			";
		}
	  echo" </table>";

  echo" <br>";
	  $SQL_recherche_suivi2  = "SELECT num_idd ,modele, marque FROM vehicule  WHERE num_idd = '".$recup_recherche_suivi."'  ";

		//Executer la requete 
		$req_rech_suivi = mysqli_query($mysqli, $SQL_recherche_suivi2 );

		//entete de tableau:
		echo '<br>
			<h1 style="text-align:center"> Informations du véhicule demandé </h1>  
			<table border="1">
			<tr>
				<th style="text-align:center" width="200">
				<strong>num_idd</strong>           </th>

				<th style="text-align:center" width="300">
				<strong>modele</strong>             </th>

				<th style="text-align:center" width="300">
				<strong>marque</strong>             </th>
	    </tr> 
		';
	      
		//requete des info vers le tableau
	    while($row = mysqli_fetch_array($req_rech_suivi)) {
			echo"
			<tr>         
				<td style='text-align:center'> ".$row["num_idd"]."   </td>
	      <td style='text-align:center'> ".$row["modele"]."    </td>
	      <td style='text-align:center'> ".$row["marque"]."    </td>
	    </tr> 
			";
		}
	  echo" </table>";


?>
<br><br>
<a  href='accueil.php?action=ajout'> Revenir à la page principale </a>
<?php echo"
	<h3> Afficher les bilans de mesure </h3>
	<p> Cliquez <button onClick='window.print()'> ICI </button> afin d'imprimer un bilan </p>
";
?>