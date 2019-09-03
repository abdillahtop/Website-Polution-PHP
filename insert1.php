
<?php
include ("koneksi1.php");
 $lat = $_GET['lat'];
    $long = $_GET['long'];
    $co = $_GET['co'];
    $no2 = $_GET['no2'];
    $debu = $_GET['debu'];
    $inco = $_GET['inco'];
    $inno2= $_GET['inno2'];
    $indebu= $_GET['indebu'];
mysqli_query($konek, "INSERT INTO markers (lat,lng,co,no2,debu,indikatorco, indikatorno2, indikatordebu) VALUES ('$lat','$long','$co','$no2','$debu','$inco','$inno2','$indebu')";
?>
