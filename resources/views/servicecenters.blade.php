<!-- STORED IN RESOURCES/VIEWS/LAYOUTS/MASTER.APP -->

@extends('layouts.master')

@section('title', 'Service Centers')

@section('body')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyCvXT3ti33kdM3fUIr-B0DiKkjIbgh09Fg" type="text/javascript"></script>
<div class="" style="height:100%; width: 50%; position:absolute;">
	<div id="map" class="map"></div>
</div>

<div class="col-lg-6 nogape col-md-6 col-sm-6 col-xs-12 text-justify pull-right detailBox" id="scroller" style="padding: 100px 60px; background: #efefef; overflow: hidden; color: #939694;">
	
    <h2 class="text-center"> Alealaniah Service Centers </h2>
    
    <div class="row nogape">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Aali</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Irtaqa 33334226</li>
                    <li>Qartasia Almushariq 33121710</li>
                    <li>Mubhar alhwatif 33922833</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Albilad Alqadeem</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Jannah Azzahra 34046017</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Albady</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Abu Ahmad Lilqartaisa 17795822</li>
                    <li>Qartasia Musaar Almustaqabal 33277337</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Saar</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Alashraq 17791215</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alhoora</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Sharka Alkabar Liltijara 33250958</li>
                    <li>Hamadi Lilaqarat 17243700</li>
                    <li>Qartasia Awali 17296373</li>
                </ul>
            </div>
            
            
             <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Almanama</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Tasjeelat Alfarooq 17273464</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Daralkalab</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Fida 33998558</li>
                </ul>
            </div>
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Shara e Almuariz</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Kanj Lilhwatif wal katrooniyat 17311143</li>
                </ul>
            </div>
            
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alriffah Sharqi</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Ogharyat Lilcomputer 33887272</li>
                    <li>Mafrooshat Alsaleh 33136448</li>
                    <li>Jalal Phone 33929656</li>
                    <li>Alharam Lildalalah 34383068</li>
                    <li>Wakalah Lilmuzhal Alaqariya 35057852</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alriffah Bokuwara</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Dar Alyaqeen 17779391</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alriffah Alhajiyat</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Expo Lilaqarat 36367790</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Jiddali</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Alikhtiyar Almumeez Lilhwatif 33983135</li>
                    <li>Matba Kristal 17680111</li>
                    <li>Computer Almajrah 17686201</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Tubli</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Alhafiz Lilaqarat 17001036</li>
                    <li>Almahoozy 17784202</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Buri</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia 121 77122115</li>
                </ul>
            </div>
            
             <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Sitra</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Alsanadi 17730708</li>
                </ul>
            </div>
            
            
            
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Almuharraq</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Maktabah Alaqsa 17335721</li>
                    <li>Almanzoomah Altlabiyah 33571339</li>
                    <li>Alumdah 17342685</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Arad</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Arad 33323995</li>
                </ul>
            </div>
            
             <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alhidd</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Wakalah Alnahaam alaqariyah 17675046</li>
                    <li>Almahaarah Lilkhidmat altalabiyah 36707375</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Qalali</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Qalali 34152366</li>
                    <li>Alwaha Alhadees Lilmuqawalat 33290853</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Zayad</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Fara Alealaniah Sultan Mol 16556600</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Jidhafs</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Alsfaar 17554348</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Alnavaidraat</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Qartasia Alsanadi 17703492</li>
                </ul>
            </div>
            
            <div class="row nogape text-center">
                <div class="centers-heading">
                    <h3 class="padding-10"> <i class="fa fa-map-marker" aria-hidden="true"></i> Aldiplomasia</h3>
                </div>
                <ul class="list-only nogape list-spacing-10">
                    <li>Markaz Alaloom Altayyibah 17660814</li>
                </ul>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    var locations = [
	
		// Foreach For Address and Latituted, Longitude
		['<h4>Alnamal Real Estate</h4>', 26.23939723, 50.65366375,  4,],
		['<h4>Qartasia Qalali</h4>', 26.27449520, 50.65007328,  4,],
		['<h4>Modren Oasis Construction</h4>', 26.27645373, 50.65391421,  4,],
		['<h4>Alumdah</h4>', 26.257841, 50.6187991,  4,],
		['<h4>Almanzuma Altalabiya</h4>', 26.24876744, 50.6165799,  4,],
		['<h4>Maktaba Aqsa</h4>', 26.26171231, 50.6125699,  4,],
		['<h4>Qartasia Arad</h4>', 26.2554822, 50.6301230,  4,],
		['<h4>Mussari Mustaqabal</h4>', 26.19573099, 50.48377086,  4,],
		['<h4>Qartasia Abu Ahmed</h4>', 26.19573099, 50.48377086,  4,],
		['<h4>Oghariy Computer</h4>', 26.1203322, 50.56786754,  4,],
		['<h4>Qartasia Sanadi</h4>', 26.16512514, 50.60714365,  4,],
		['<h4>Qartasia Sanadi</h4>', 26.1328103, 50.60034414,  4,],
		['<h4>Expo Aqarat</h4>', 26.1366014, 50.576937,  4,],
		['<h4>Ikhtyar Almumeez Hwatif</h4>', 26.17269515, 50.5608469,  4,],
		['<h4>Matbua Criystal</h4>', 26.17832243, 50.551807,  4,],
		['<h4>Alhafiz Aqarat</h4>', 26.202958, 50.56529814,  4,],
		['<h4>Qartasia Jannah Azahra</h4>', 26.211544, 50.558314,  4,],
		['<h4>Qartasia Irtaqa</h4>', 26.15939131, 50.5182521,  4,],
		
		
		
		
	];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(26.068070, 50.561034 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scrollwheel: false,
	  icon: 'img/marker.png' ,
	  disableDefaultUI: true, // a way to quickly hide all controls
	  mapTypeControl: false,
	  scaleControl: false,
	  zoomControl: false,
	  styles :[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
	
    for (i = 0; i < locations.length; i++) {  
	size=30;
	var img = new google.maps.MarkerImage('http://localhost:8000/img/marker.png',           
		new google.maps.Size(size, size),
		new google.maps.Point(0,0),
		new google.maps.Point(size/2, size/2)
   );
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: img
		
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));


	  
    }
  </script>


@endsection