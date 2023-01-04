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
<!-- ------------------------------------------------------Début code----------------------------------------------- -->
<?php
session_start();
$con = mysqli_connect("localhost","root","root","projet1");

if(isset($_POST['update_stud_data']))
{
    $id = $_POST['id_v'];

    $num_idd = $_POST['num_idd'];
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];

    $query = "UPDATE vehicule SET num_idd='$num_idd', modele='$modele', marque='$marque' WHERE id_vehicule='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Modification effectué";
        header("Location: form_modification.php");
    }
    else
    {
        $_SESSION['status'] = "Modification non effectué ";
        header("Location: form_modification.php");
    }
}

?>