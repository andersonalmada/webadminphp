<?php
	require_once('functions.php');
	$equipment = find('equipments', $_GET['id']);
	$responsibles = find('responsibles');
  $places = find('places');
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Equipamento</h2>
<hr>

<dl class="dl-horizontal">
	<dd><img src='uploads/<?php echo $equipment['id']; ?>.jpeg' width="200px" height="200px"/></dd>

	<dt>Nome:</dt>
	<dd><?php echo $equipment['name']; ?></dd>

  <dt>Descrição:</dt>
  <dd>
		<?php
			$order   = array("\r\n", "\n", "\r");
			$replace = '<br />';
			echo(str_replace($order, $replace, $equipment['description']));
		?>
	</dd>

  <dt>Responsável:</dt>
	<?php foreach ($responsibles as $responsible) :
					if($equipment['responsible_id'] == $responsible['id']) : ?>
  					<dd><?php echo $responsible['name']; ?></dd>
		<?php   break;
				  endif;
		    endforeach; ?>
	<dt>Local:</dt>
	<?php foreach ($places as $place) :
					if($equipment['place_id'] == $place['id']) : ?>
						<dd><?php echo $place['name']; ?></dd>
		<?php   break;
		  	  endif;
					endforeach; ?>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="equipment-edit.php?id=<?php echo $equipment['id']; ?>" class="btn btn-primary">Editar</a>
		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $equipment['id']; ?>" data-table="equipments">Excluir</a>
	  <a href="equipments.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
