<?php
///////////////////////ConnexionDB///////////////////////////////////
$username="username";
$password="password";
$database="database";
///////////////////////Récupération des données///////////////////////////////////
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
///////////////////////Récupération adresse IP ///////////////////////////////////
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip = $_SERVER['REMOTE_ADDR'];
}; 

///////////////////////Connexion et requête///////////////////////////////////
$connection=mysqli_connect ('localhost', $username, $password, 'db');
if (!$connection) {
  die('Not connected : ');
}

$db_selected = mysqli_select_db( $connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error($connection));
}

// Requete sql
$query = "SELECT * FROM historique WHERE ip = '$ip'";
$result = mysqli_query($connection,$query, MYSQLI_USE_RESULT);
if (!$result) {
  die('Invalid query: ' . mysqli_error($query));
}

///////////////////////Transformation des données en XML///////////////////////////////////

header("Content-type: text/xml");

echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;

while ($row = @mysqli_fetch_assoc($result)){

  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'name="' . parseToXML($row['label']) . '" ';
  echo 'address="' . parseToXML($row['search']) . '" ';
  echo 'postcode="' . $row['postcode'] . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

echo '</markers>';
?>
