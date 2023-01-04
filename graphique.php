<?php 
echo "<body style='background-color:#87CEFA'> ";

require_once 'pdoconfig.php';

try {
    /* LOG a la BDD */
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //DL graphique
    $dresult = $conn->query('SELECT * FROM mesure');

    $drows = array();
    $dtable = array();
    
    $dtable['cols'] = array(
    // Nom des colonnes 
    array('label' => 'date_heure', 'type' => 'string'), //change 'string' en datetime
    array('label' => 'Temperature en °C', 'type' => 'number'),
    array('label' => 'Humidite en %', 'type' => 'number'), 
    );

    /* Recup information de $dresult */
    foreach($dresult as $d) {
        $dtemp = array();
        // the following line will be used to slice the chart
        $dtemp[] = array('v' =>  $d['date_heure']); 
        // Valeur de chaque slice
        $dtemp[] = array('v' =>  $d['temperature']); 
        $dtemp[] = array('v' =>  $d['humidite']); 

        $drows[] = array('c' => $dtemp);
    }

    $dtable['rows'] = $drows;

    // Convertion au format JSON 
    $djsonTable = json_encode($dtable);
    //echo $djsonTable;
} 

    catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    }

    ?>

    <html lang="fr">
    <head>
    <meta charset="UTF-8">

    <script type="text/javascript">
    var currheight = document.documentElement.clientHeight;
    window.onresize = function(){
        if(currheight != document.documentElement.clientHeight) {
        location.replace(location.href);
        }    
    }
    </script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(downloadChart);

    function downloadChart() {
        var ddata = new google.visualization.DataTable(<?=$djsonTable?>);
        var options = {
            is3D: 'true',
            width: '100%',
            height: 500,
            hAxis:{title: 'Informations du capteur', 
                direction:1, 
                slantedText:true, 
                slantedTextAngle:90,
                textStyle : { fontSize: 8} // or the number you want
            },
            vAxis:{title: '°C / H %'},
            legend: { position: 'bottom' },
            chartArea: { top: 45, height: '40%', backgroundColor: { stroke: '#ccc', strokeWidth: 1},
            }
        };

      var chart = new google.visualization.LineChart(document.getElementById('download_chart_div'));
      chart.draw(ddata, options);
    }

    </script>

</head>

<body class="site">

<main class="site-content">
    <div style="text-align:center"> Informations du capteur : Temperature en °C & Humidité en % </div>
    <div id="download_chart_div"></div>
</main>
</body>
<?php 
    //Affichage des bilans
    echo"
    <h3 style='text-align:center'> Imprimer les bilans de mesures </h3>
    <p style='text-align:center'> Cliquez <button onClick='window.print()'> ICI </button> afin d'imprimer un bilan </p>
    ";


    //Rafraichir la page             content est en secondes donc 10min = 600s
    echo "<meta http-equiv='refresh' content='600;URL=graphique.php'>
          <a  href='accueil.php?action=ajout'> Revenir à la page principale </a>";
?>
</html>