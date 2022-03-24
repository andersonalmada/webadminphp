<?php
	require_once('functions.php');
	$place = find('places', $_GET['id']);
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
<h2>Local</h2>
<hr>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $place['name']; ?></dd>
	<dt>Localização:</dt>
	<dd><div id="map-canvas"></div></dd>
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
		}
	</script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOWOCIRsF3alHCKcnfdmQlZqmZrcfdIys&callback=initMap">
	</script>
</dl>

<input id="input-latitude" type="hidden" name="latitude" value="<?php echo $place['latitude']; ?>">
<input id="input-longitude" type="hidden" name="longitude" value="<?php echo $place['longitude']; ?>">

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="place-edit.php?id=<?php echo $place['id']; ?>" class="btn btn-primary">Editar</a>
		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $place['id']; ?>" data-table="places">Excluir</a>
	  <a href="places.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
