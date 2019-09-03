<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Air Polution Kota Malang</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script type="text/javascript" src="jquery.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 92%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
          
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  
  <body>
      	<div class="menu">
    		<ul>
    			<li><a href="http://www.ta2018.web.id">HOME</a></li>
    			<li><a href="indexco.php">CO</a></li>
    			<li><a href="indexno.php">NO2</a></a></li>
    			<li><a href="indexdebu.php">Debu</a></li>
    			<li><a href="grafik.php">Grafik</a></li>
    			<li><a href="">Tentang Kami</a></li>
    		</ul>
    	</div>
    <div id="map"></div>
    <script>
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-7.982644, 112.630584),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;
		
			
          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://www.ta2018.web.id/toxml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var time1 = "Time = ";
                var co1 = "CO = ";
                var no = "NO2 = ";
                var debu1 = "Debu = ";
                var id1 = "ID = ";
             var id = markerElem.getAttribute('id');
              var time = markerElem.getAttribute('time');
              var co = markerElem.getAttribute('co');
              var no2 = markerElem.getAttribute('no2');
              var debu = markerElem.getAttribute('debu');
              var inco = markerElem.getAttribute('inco');
              var inno2 = markerElem.getAttribute('inno2');
              var indebu = markerElem.getAttribute('indebu');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var idd = document.createElement('idd');
              idd.textContent = id1
              infowincontent.appendChild(idd);
              var idn = document.createElement('idn');
              idn.textContent = id
              infowincontent.appendChild(idn);        infowincontent.appendChild(document.createElement('br'));                 
              var date1 = document.createElement('date1');
              date1.textContent = time1
              infowincontent.appendChild(date1);
              var date = document.createElement('date');
              date.textContent = time
              infowincontent.appendChild(date);             infowincontent.appendChild(document.createElement('br'));			  
              var covar = document.createElement('covar');
              covar.textContent = co1
              infowincontent.appendChild(covar);
              var pco = document.createElement('pco');
              pco.textContent = co
              infowincontent.appendChild(pco);
              var inco1 = document.createElement('inco1');
              inco1.textContent = inco
              infowincontent.appendChild(inco1);           infowincontent.appendChild(document.createElement('br'));     
       var novar = document.createElement('novar');
              novar.textContent = no
              infowincontent.appendChild(novar);
              var pno = document.createElement('pno');
              pno.textContent = no2
              infowincontent.appendChild(pno);
              var inno = document.createElement('inno');
              inno.textContent = inno2
              infowincontent.appendChild(inno);
              infowincontent.appendChild(document.createElement('br'));
              
              var debvar = document.createElement('debvar');
              debvar.textContent = debu1
              infowincontent.appendChild(debvar);
              var pdebu = document.createElement('pdebu');
              pdebu.textContent = debu
              infowincontent.appendChild(pdebu);
              var indebu1 = document.createElement('indebu1');
              indebu1.textContent = indebu
              infowincontent.appendChild(indebu1);
              infowincontent.appendChild(document.createElement('br'));
                
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                
              });
marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open( map, marker);
              });
            });
          });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn-igzXPhDaDeP2GyuqHNfk7HKbaZ3i60&callback=initMap">
    </script>
  </body>
</html>
