<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Grafik Polusi Kota Malang</title>
   <link rel="stylesheet" type="text/css" href="style2.css">
    <script type="text/javascript" src="jquery.js"></script>
  </head>

  <body>
      <div class="menu">
    		<ul>
    			<li><a href="http://www.ta2018.web.id">HOME</a></li>
    			<li><a href="indexco.php">CO</a></li>
    			<li><a href="indexno.php">NO2</a></a></li>
    			<li><a href="indexdebu.php">Debu</a></li>
    			<li><a href="grafik.php">Grafik</a></li>
    		</ul>
    	</div>
    <div id="container" "></div>
    <?php 
     
    $connect = mysqli_connect('localhost','tawebid_user','admin123tok','tawebid_polution');

    $sql = "SELECT * FROM markers WHERE 1";
    $result = $connect->query($sql);
    
     
     $coba1 = array();
     $coba2 = array ();
     $coba3 = array ();
     $coba4 = array ();
     $id = array();
     while($row = $result->fetch_assoc()) {
         $id[] = doubleval( $row['id']);
        $coba1=  $row['time'];
        $coba2[] =doubleval( $row['co']);
        $coba3[] =doubleval( $row['no2']);
        $coba4[] =doubleval( $row['debu']);
    }
     ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Polusi Udara Di Kota Malang'
    },
    subtitle: {
        text: 'Juli 2018'
    },
    xAxis: {
        categories: 
             <?= json_encode($id); ?>
        ,
        crosshair: true
    },
    yAxis: {
        min: 0.00,
        title: {
            text: 'PPM; mg/m3'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} ppm;mg/m3</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'CO',
        data: <?= json_encode($coba2); ?>
    },{
        name: 'NO2',
        data: <?= json_encode($coba3); ?>
    },{
        name: 'Debu',
        data: <?= json_encode($coba4); ?>
    }]
});
    </script>

   
    </script>
    
  </body>
</html>
