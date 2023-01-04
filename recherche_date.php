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
		@$recup_recherche=$_GET["keywords"];

	    $SQL_recherche  = "SELECT temperature, humidite, date_debut, date_fin, cb_bus FROM mesure INNER JOIN bus ON mesure.date_heure=bus.date_heure WHERE mesure.date_heure = '".$recup_recherche."'  ";


		//Executer la requete 
		$req_rech = mysqli_query($mysqli, $SQL_recherche );

		//entete de tableau:
		echo '<br>
			<h1 style="text-align:center"> Informations liées à la date demandée </h1>  
			<table border="1">
			<tr>
				<th style="text-align:center" width="200">
				<strong>temperature</strong>           </th>

				<th style="text-align:center" width="300">
				<strong>humiditee</strong>             </th>

				<th style="text-align:center" width="200">
				<strong>date_debut</strong>            </th>

				<th style="text-align:center" width="200">
				<strong>date_fin</strong>              </th>

				<th style="text-align:center" width="200">
				<strong>code barre du bus</strong>              </th>
	    	</tr> 
		';
	      
		//requete des info vers le tableau
	    while($row = mysqli_fetch_array($req_rech)) {
			echo"
			<tr>         
				<td style='text-align:center'> ".$row["temperature"]."   </td>
	      <td style='text-align:center'> ".$row["humidite"]."      </td>
	      <td style='text-align:center'> ".$row["date_debut"]."    </td>
	      <td style='text-align:center'> ".$row["date_fin"]."      </td>
	      <td style='text-align:center'> ".$row["cb_bus"]."      </td>
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