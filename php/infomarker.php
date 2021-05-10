<?php 
$name = $_GET['name'];
$address = $_GET['address'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$postcode = $_GET['postcode'];
?>
<!DOCTYPE html>
<html>
<link href="../css/infomarker.css" rel="stylesheet">


<!---------------------------------------Boolstrap------------------------------------------------------------------->

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script type="text/javascript" src="../js/infomarker.js">
</script>



<script type="text/javascript">
  
  window.onload = function(){
    initMap(<?php echo $longitude ;?>,<?php echo $latitude ;?>);
  }
</script>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">




<body id="contatti">
<script  async defer src="https://maps.googleapis.com/maps/api/js?key=MyApiKey&map_ids=MapKey&callback=initMap"></script>

<div id="map"></div>

<div class='container'>
    <div class="card mx-auto col-md-5 col-8 mt-3 p-0"> 
        <div class="card-title d-flex px-4">
        <label id="label" name="label" class="text-uppercase font-weight-bold"><?php echo $name ?></label>
        </div>
        <div style="text-align: center;" class="card-body">
            <p class="text-muted"><?php echo $address ?>  <?php echo $postcode ?></p>
          
            <p class="text-muted" >Latitude :<?php echo $latitude ?></p> 
            <p class="text-muted" > Longitude :<?php echo $longitude ?></p> 

        </div>
        <a href="history.php" class="footer text-center p-0 btn-primary">
            <div class="col-lg-12 col-12 p-0" >
                <p class="order">Quitter</p>
            </div>
        </a>
    </div>
</div>
</body>
</html>