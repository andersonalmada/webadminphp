<?php
	require_once('functions.php');
	$user = find('users', $_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Usuário</h2>
<hr>

<dl class="dl-horizontal">
	<dt>Username:</dt>
	<dd><?php echo $user['username']; ?></dd>
	<dt>E-mail:</dt>
	<dd><?php echo $user['email']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="user-edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Editar</a>
		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $user['id']; ?>" data-table="users">Excluir</a>
	  <a href="users.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
