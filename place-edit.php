<?php
  require_once('functions.php');
  $place = find('places', $_GET['id']);

  if (!empty($_POST['place-edit'])) {
    $data = array("name" => $_POST['name'],
                  "latitude" => $_POST['latitude'],
                  "longitude" => $_POST['longitude']);

    edit('places', $_POST['id'], $data);
  }
?>

<?php include(HEADER_TEMPLATE); ?>
<style>
#map-canvas {
  height: 550px;
  width: 700px;
  margin: 0px;
  padding: 0px
}
</style>
<h2>Editar Local</h2>

<form action="place-edit.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome</label>
      <input type="text" class="form-control" name="name" value="<?php echo $place['name']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <div id="map-canvas"></div>
      <script>
        function initMap() {
          var latitude = $('#input-latitude').val();
    			var longitude = $('#input-longitude').val();
    			var local = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
    			var map = new google.maps.Map(document.getElementById('map-canvas'), {
    				zoom: 18,
    				center: local
    			});
    			var marker = new google.maps.Marker({
    				position: local,
    				map: map
    			});

          google.maps.event.addListener(map, 'click', function(event) {
              placeMarker(event.latLng);
            });

            function placeMarker(location) {
              if (marker == undefined){
                marker = new google.maps.Marker({
                  position: location,
                  map: map,
                  animation: google.maps.Animation.DROP,
                });
              }
              else{
                marker.setPosition(location);
                $('#input-latitude').val(location.lat())
                $('#input-longitude').val(location.lng())
              }
              map.setCenter(location);
            }
          }
        </script>

        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOWOCIRsF3alHCKcnfdmQlZqmZrcfdIys&callback=initMap">
        </script>

        <input id="input-latitude" type="hidden" name="latitude" value="<?php echo $place['latitude']; ?>">
        <input id="input-longitude" type="hidden" name="longitude" value="<?php echo $place['longitude']; ?>">
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;" name="place-edit" value="place-edit">
  <input type="text" class="form-control" style="display:none;" name="id" value="<?php echo $_GET['id']; ?>">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="places.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
