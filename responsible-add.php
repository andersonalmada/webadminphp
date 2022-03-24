<?php
  require_once('functions.php');
  
  if (!empty($_POST['responsible-add'])) {
    $data = array("name" => $_POST['name'],
                  "email" => $_POST['email'],
                  "phone" => $_POST['phone']);

    add('responsibles', $data);
  }
?>
<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Responsável</h2>

<form action="responsible-add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome</label>
      <input type="text" class="form-control" name="name">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">E-mail</label>
      <input type="email" class="form-control" name="email">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Telefone</label>
      <input type="text" class="form-control" name="phone">
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;"name="responsible-add" value="responsible-add">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" >Salvar</button>
      <a href="responsibles.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
