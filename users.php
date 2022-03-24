<?php
    require_once('functions.php');
    $users = find('users');
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Usuários</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="user-add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
	    	<a class="btn btn-default" href="users.php"><i class="fa fa-refresh"></i> Atualizar</a>
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
<?php if ($users) : ?>
<?php foreach ($users as $user) : ?>
	<tr>
		<td><?php echo $user['username']; ?></td>
		<td class="actions text-right">
			<a href="user-view.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="user-edit.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $user['id']; ?>" data-table="users">
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
