
<!DOCTYPE html>
<html>
<link href="css/index.css" rel="stylesheet"  >
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script type="text/javascript" src="js/app.js">
</script>


<!---------------------------------------Bar de Recherche------------------------------------------------------------------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!----------------------------------------------------------------------------------------------------------------------->
 


<script type="text/javascript">

  window.onload = function(){
    initMap(2.295675 ,48.858747,"Paris","Tour Eiffel","75007");
    document.getElementById('code').value = "75007";
        document.getElementById('city').value = "Paris";
        document.getElementById('x').value = "2.295675";
        document.getElementById('y').value = "48.858747";
        document.all.label.innerHTML= "Tour Eiffel";
  }
function requet() {
  var adress = document.getElementById('ajaxTextbox').value;
  makeRequest(adress);
};


</script>


<body id="contatti">

  <h1 style="text-shadow:0 4px 0 #FF3333, 0 -4px 0 #334FFF; color: #ffffff; font-family: 'Raleway',sans-serif; font-size: 62px; font-weight: 800; line-height: 72px; margin: 0 0 24px; text-align: center; text-transform: uppercase; ">FranceTracker</h1>


  <!---------------------------------------Searchbar------------------------------------------------------------------->

  <div class="container">
    <br/>
	  <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <form name="post" enctype="multipart/form-data"  method="post" class="card card-sm">
          <div class="card-body row no-gutters align-items-center">
            <div class="col-auto">
              <i class="fas fa-search h4 text-body"></i>
            </div>
            <!--end of col-->
            <div class="col">
              <input  name="ajaxTextbox"  id="ajaxTextbox" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Quel lieu ?">
            </div>
            <!--end of col-->
            <div class="col-auto">
              <input  class="btn btn-lg btn-primary" name="ajaxButton" id="ajaxButton" type="button" onclick="requet()"  value="Rechercher" >
            </div>
            <!--end of col-->
          </div>
        </form>
      </div>
      <!--end of col-->
    </div>
  </div>



<!---------------------------------------Vignette------------------------------------------------------------------->

    <div class="row"  id="contatti">
      <div class="container mt-5" id="contain">
        <div class="row" style="height:550px;">
          <div class="col-md-6 maps">
            <!-----------------Map------------------>
            <div id="map"></div>
            <script async src="https://maps.googleapis.com/maps/api/js?key=MyApiKey&map_ids=MyMapidcallback=initMap"></script>
            </div>
            <div class="col-md-6">
              <label id="label" name="label" class="text-uppercase mt-3 font-weight-bold" ></label>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <p>Code Postal</p>
                    <input readonly id="code"  class="form-control mt-2">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <p>Ville</p>
                  <input readonly id="city"  class="form-control mt-2">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <p>Longitude</p>
                <input readonly id="x"  class="form-control mt-2">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <p>Latitude</p>
                <input readonly id="y"  class="form-control mt-2">
              </div>
            </div>
          </div>
          <a href="php/history.php">Historique -></a>
        </div>
      </div>
    </div>
  </body>
</html>