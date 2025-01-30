<!-- Header dan title dari menu pemetaan lokasi -->
<div class="header">
     <h1 class="page-title"><? echo $tittle ?></h1>
     <ul class="breadcrumb">
         <li><a class="active" href="#">Admin</a> </li>
         <li class="active"><? echo $tittle ?></li>
     </ul>
</div>

<ul class="nav nav-tabs">
  <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Pemetaan Lokasi Promosi</b></a></li>
</ul>
<br>
<table>
  <tr>
    <td>Tampilkan Wilayah dengan Persentase diatas
    </td>
    <td>:</td>
    <td>
    <!-- Input select update lokasi yang akan ditampilkan -->
    <select id="persen" class="form-control">
       <? $data = array('10','20','30','40','50','60','70','80','90','100');
       foreach ($data as $key => $value) { 
          if($value==$persen[0]['value']){ ?>
        <option selected="<? echo  $value ?>" value="<? echo $value ?>" ><? echo $value ?> %</option>
        <? } else{ ?>
        <option value="<? echo $value ?>"><? echo $value ?> %</option>
        <? } } ?>
    </select>
    </td>
    <td>
    <div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
    <a id="pointer" onclick="update()" class="btn btn-primary save"><i class="glyphicon glyphicon-map-marker"></i> Tampilkan</a>
    </td>
  </tr>
</table>
<br>

<div id="map"></div>
<div class="detail"></div>

<script>
    //Menampilkan label pada markers, disesuaikan dengan type yang ada di database markers
    $('#loading').hide();
      var customLabel = {
        home: {
          label: 'S'
        },
        lokasi: {
          label: 'L'
        }
      };  
        //Fungsi pemetaan lokasi Google Maps API dengan custom markers
        function initMap() {
           var styledMapType = new google.maps.StyledMapType(
            [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#c9b2a6'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#a5b076'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#447530'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#fdfcf8'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#e9bc62'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e98d58'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.fill',
                stylers: [{color: '#8f7d77'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#ebe3cd'}]
              },
              {
                featureType: 'transit.station',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#b9d3c2'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#92998d'}]
              }
            ],
            {name: 'Styled Map'});
            var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-6.271383, 107.0135931),
            zoom: 14,
            mapTypeControlOptions: {
              mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                      'styled_map']
            }

        });
        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file  
          downloadUrl('<? echo base_url() ?>admin/maps', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              //Variabel yang diambil dari lemparan controller
              //localhost/JST/admin/maps dalam berntuk XML
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var persen = markerElem.getAttribute('persen');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              if(id==1){
              //Menampilkan alamat dalam markers
              text.textContent = address
              }else{
              //Menampilkan persentase keberhasilan promosi dalam markers
              text.textContent = 'Keberhasilan Promosi sebesar '+persen+'%'
              }
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              //Fungsi ketika markers diklik
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
                if(id!=1){
                detail(name);
                }
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

    //Fungsi update persentase wilayah yang ingin ditampilkan
    function update() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var formdata = new FormData();
        var persen = _("persen").value;

        formdata.append("persen", persen);

        $(".save").hide();
        $("#loading").show();
        setTimeout(function() {
        $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'admin/persen/'; ?>", false);
        ajax.send(formdata);
         }, 1000);
    }

    //Fungsi detail ketika markers diklik, menampilkan informasi promosi disebelah kanan peta
    function detail(name){
      var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET", "<?php echo base_url() . 'admin/mapsDetail/'; ?>"+name, false);
        ajax.send();
        $(".detail").html(ajax.responseText);
    }

    //Respon fungsi update wilayah yang ditampilkan
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "success") {
            alert('Berhasil mengubah persentase wilayah !..');
            $('.save').show();
            getMaps();
        }
    }

    </script>

    <!-- Key Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYJVeWGRGeecEEi3VXgSjbEZuLtJx3pLs&callback=initMap">
    </script>

<!-- CSS menu pemetaan lokasi -->
<style>
    #map {
      height: 67%;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 1%;
      width: 73%;
      position: absolute;
      display: inline;
    }
    
    td{
      padding: 10px;
    }
    .active{
    font-size: 14px;
    }
    .detail{
      margin-left: 75%;
    }
</style>
