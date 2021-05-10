///////////////////////Requete///////////////////////////////////
var getHttpRequest = function () {
    var httpRequest = false;

    if (window.XMLHttpRequest) { // Mozilla, Safari,...
      httpRequest = new XMLHttpRequest();
      if (httpRequest.overrideMimeType) {
        httpRequest.overrideMimeType('text/xml');
      }
    }
    else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {}
      }
    }
  
    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance XMLHTTP');
      return false;
    }
  
    return httpRequest
  }

  var httpRequest = getHttpRequest();





  function makeRequest(adresse) {
    httpRequest.open('GET', 'https://api-adresse.data.gouv.fr/search/?q=' + adresse + "&limit=1", true);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    httpRequest.send();



 
  }



  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        httpRequest.responseText // contient le résultat de la page
        var response = JSON.parse(httpRequest.responseText);
        var x = response.features[0].geometry.coordinates[0] ;
        var y = response.features[0].geometry.coordinates[1] ;
        var city = response.features[0].properties.city;
        var postcode = response.features[0].properties.postcode;
        var label = response.features[0].properties.label;
        console.log(response)
     
        initMap(x,y,city,label,postcode);
        document.getElementById('code').value = response.features[0].properties.postcode;
        document.getElementById('city').value = response.features[0].properties.city;
        document.getElementById('x').value = response.features[0].geometry.coordinates[0];
        document.getElementById('y').value = response.features[0].geometry.coordinates[1];
        document.all.label.innerHTML= response.features[0].properties.label;
      
      
        jQuery.ajax({
          type: "POST",
          url: '../bd/adddb.php',
          dataType: 'json',
          data: {functionname: 'add', arguments: [city , x , y, postcode, label]},
      
          success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            yourVariable = obj.result;
                        }
                        else {
                            console.log(obj.error);
                        }
                  }
      });
    } else {
          // Le serveur a renvoyé un status d'erreur
      }
    }

  }
  

  ///////////////////////Map///////////////////////////////////

  let map;

  function initMap(lngx,laty,city,label,postcode) {

    const mapOptions = {
      zoom: 15,
      center: { lat: laty , lng: lngx },
      mapId: '/*/myid//*',

    };

    console.log(mapOptions);

    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    const marker = new google.maps.Marker({

      position: { lat: laty, lng: lngx },
      map: map,
      
    });

  
    const infowindow = new google.maps.InfoWindow({
      content: "<h1>"+label+"</h1>" +
      "<p>" +postcode +", "+city + "</p>",
    });
    google.maps.event.addListener(marker, "click", () => {
      infowindow.open(map, marker);
    });
  }
    

