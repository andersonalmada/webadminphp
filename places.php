<?php
    require_once('functions.php');
    $places = find('places');
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Locais</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="place-add.php"><i class="fa fa-plus"></i> Novo Local</a>
	    	<a class="btn btn-default" href="places.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>Nome</th>
		<th align="left" style="text-align:right">Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($places) : ?>
<?php foreach ($places as $place) : ?>
	<tr>
		<td><?php echo $place['name']; ?></td>
		<td class="actions text-right">
			<a href="place-view.php?id=<?php echo $place['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="place-edit.php?id=<?php echo $place['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $place['id']; ?>" data-table="places">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
