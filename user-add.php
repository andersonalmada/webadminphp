<?php
  require_once('functions.php');

  if (!empty($_POST['user-add'])) {
    $data = array("username" => $_POST['username'],
                  "email" => $_POST['email'],
                  "password" => $_POST['password']);

    add('users', $data);
  }
?>
<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Usuário</h2>

<form action="user-add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome do Usuário</label>
      <input type="text" class="form-control" name="username">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">E-mail</label>
      <input type="text" class="form-control" name="email">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Senha</label>
      <input type="password" class="form-control" name="password">
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;"name="user-add" value="user-add">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" >Salvar</button>
      <a href="users.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
