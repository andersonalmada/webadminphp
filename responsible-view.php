<?php
	require_once('functions.php');
	$responsible = find('responsibles', $_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Responsável</h2>
<hr>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $responsible['name']; ?></dd>
	<dt>E-mail:</dt>
	<dd><?php echo $responsible['email']; ?></dd>
	<dt>Telefone:</dt>
	<dd><?php echo $responsible['phone']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="responsible-edit.php?id=<?php echo $responsible['id']; ?>" class="btn btn-primary">Editar</a>
		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $responsible['id']; ?>" data-table="responsibles">Excluir</a>
	  <a href="responsibles.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
