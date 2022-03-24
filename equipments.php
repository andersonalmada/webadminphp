<?php
    require_once('functions.php');
    $equipments = find('equipments');
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Equipamentos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="equipment-add.php"><i class="fa fa-plus"></i> Novo Equipamento</a>
	    	<a class="btn btn-default" href="equipments.php"><i class="fa fa-refresh"></i> Atualizar</a>
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
<?php if ($equipments) : ?>
<?php foreach ($equipments as $equipment) : ?>
	<tr>
		<td><?php echo $equipment['name']; ?></td>
		<td class="actions text-right">
			<a href="equipment-view.php?id=<?php echo $equipment['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="equipment-edit.php?id=<?php echo $equipment['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $equipment['id']; ?>" data-table="equipments">
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
