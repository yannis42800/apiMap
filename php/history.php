
<!DOCTYPE html>
<html>
<link href="../css/index.css" rel="stylesheet">

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/historique.js">
</script>
<body id="contatti">
<script type="text/javascript">
  window.onload = function(){
    initMap(2.295675 ,48.858747);
 
  }
</script>
<h1 style="text-shadow:0 4px 0 #FF3333, 0 -4px 0 #334FFF; color: #ffffff; font-family: 'Raleway',sans-serif; font-size: 62px; font-weight: 800; line-height: 72px; margin: 0 0 24px; text-align: center; text-transform: uppercase; ">Historique</h1>
<!----------------Map----------------->
<div class="row" style="height:550px;">

<div class="col-md-3 maps"></div>

<div class="col-md-6 maps">

<div id="map"></div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=MyApiKey&map_ids=MyIdMap&callback=initMap">
</script>

</div>
<div class="col-md-3 maps"></div>
</div>




</body>

</html>
