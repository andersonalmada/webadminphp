<?php require_once 'functions.php'; ?>

<?php include(HEADER_TEMPLATE);

if(isset($_POST['submit'])) {
	addVersion();
}
?>

<h1>Sistema de Administração - EMUFC</h1>
<hr />

<div class="row">

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="users.php" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Usuários</p>
				</div>
			</div>
		</a>
	</div>

  <div class="col-xs-6 col-sm-3 col-md-2">
		<a href="equipments.php" class="btn btn-default">
			<img src="img/equipments.png" alt="Equipamentos" height="70" width="70">
			<div class="col-xs-12 text-center">
				<p>Equipamentos</p>
			</div>
		</a>
	</div>

    <div class="col-xs-6 col-sm-3 col-md-2">
		<a href="places.php" class="btn btn-default">
			<img src="img/places.png" alt="Equipamentos" height="70" width="70">
			<div class="col-xs-12 text-center">
				<p>Locais</p>
			</div>
		</a>
	</div>

    <div class="col-xs-6 col-sm-3 col-md-2">
		<a href="responsibles.php" class="btn btn-default">
			<img src="img/responsibles.png" alt="Equipamentos" height="70" width="70">
			<div class="col-xs-12 text-center">
				<p>Responsáveis</p>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<div class="col-xs-12 text-right h2">
			<form method="POST">
				<button class="btn btn-primary" type="submit" name="submit">Gerar nova versão </button>	
			</form>
    	</div>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
