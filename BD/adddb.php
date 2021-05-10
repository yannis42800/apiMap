
<?php
$db = mysqli_connect("localhost", "username", "password",  "database");
  header('Content-Type: application/json');
///////////////////////Récupération adresse IP ///////////////////////////////////
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }; 

  $date_creation = date('Y-m-d H:i:s');
  $aResult = array();

  if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

  if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

  if( !isset($aResult['error']) ) {
///////////////////////Récupération des données arguments (app.js) ///////////////////////////////////

      switch($_POST['functionname']) {
          case 'add':
            $search = $_POST['arguments'][0];
            $longitude = $_POST['arguments'][1];
            $latitude = $_POST['arguments'][2];
            $postcode = $_POST['arguments'][3];
            $label = $_POST['arguments'][4];

///////////////////////Requête ajout historique ///////////////////////////////////

            $sql = "INSERT INTO historique (ip,search,datesearch, longitude , latitude, postcode, label) VALUES ('$ip','$search','$date_creation', '$longitude','$latitude', '$postcode','$label')";
            if (mysqli_query($db, $sql)) {
              $er ='ok';

             
            } else {
                  
                $er = 'ajout dans la db :  error';


            }

      }

  }

  echo json_encode($aResult);



?>
