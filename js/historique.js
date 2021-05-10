  ///////////////////////Map///////////////////////////////////
  let map;
  function initMap(x,y) {
    const mapOptions = {
      zoom: 5,
      center: { lat: y, lng: x},
      mapId: /*/myid//*/,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);


function downloadUrl(url,callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;
 
  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      callback(request, request.status);
    }
  };
 
  request.open('GET', url, true);
  request.send(null);
}

 downloadUrl('../bd/dbxml.php', function(data) {
  var xml = data.responseXML;
  var markers = xml.documentElement.getElementsByTagName('marker');
  Array.prototype.forEach.call(markers, function(markerElem) {
    var id = markerElem.getAttribute('id');
    var name = markerElem.getAttribute('name');
    var address = markerElem.getAttribute('address');
    var postcode = markerElem.getAttribute('postcode');
    var point = new google.maps.LatLng(
        parseFloat(markerElem.getAttribute('lat')),
        parseFloat(markerElem.getAttribute('lng')));

    var infowincontent = document.createElement('div');
    var strong = document.createElement('strong');
    strong.textContent = name
    infowincontent.appendChild(strong);
    infowincontent.appendChild(document.createElement('br'));

    var text = document.createElement('text');
    text.textContent = address
    infowincontent.appendChild(text);
    var marker = new google.maps.Marker({
      map: map,
      position: point,
});
marker.addListener('click', function() {
  var name = markerElem.getAttribute('name');
  var address = markerElem.getAttribute('address');
  var lat = markerElem.getAttribute('lat');
  var lng = markerElem.getAttribute('lng');
  window.open('../php/infomarker.php?name='+ name + '&address='+ address + '&latitude=' + lat +  '&longitude=' + lng + '&postcode=' + postcode  );
            window.close();
});
});
});

}
