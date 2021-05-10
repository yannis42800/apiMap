 ///////////////////////Map///////////////////////////////////

 let map;

 function initMap(lngx,laty) {

   const mapOptions = {
     zoom: 15,
     center: { lat: laty , lng: lngx },
     mapId: /*/myid//*/,

   };
   map = new google.maps.Map(document.getElementById("map"), mapOptions);

   const marker = new google.maps.Marker({

     position: { lat: laty, lng: lngx },
     map: map,
     
   });

 }
   

