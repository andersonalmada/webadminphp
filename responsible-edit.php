<?php
  require_once('functions.php');
  $responsible = find('responsibles', $_GET['id']);

  if (!empty($_POST['responsible-edit'])) {
    $data = array("name" => $_POST['name'],
                  "email" => $_POST['email'],
                  "phone" => $_POST['phone']);

    edit('responsibles', $_POST['id'], $data);
  }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar Responsável</h2>

<form action="responsible-edit.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome</label>
      <input type="text" class="form-control" name="name" value="<?php echo $responsible['name']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">E-mail</label>
      <input type="text" class="form-control" name="email" value="<?php echo $responsible['email']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Telefone</label>
      <input type="text" class="form-control" name="phone" value="<?php echo $responsible['phone']; ?>">
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;" name="responsible-edit" value="responsible-edit">
  <input type="text" class="form-control" style="display:none;" name="id" value="<?php echo $_GET['id']; ?>">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="responsibles.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
