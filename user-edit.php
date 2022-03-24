<?php
  require_once('functions.php');
  $user = find('users', $_GET['id']);

  if (!empty($_POST['user-edit'])) {
    $data = array("password" => $_POST['password']);

    edit('users', $_POST['id'], $data);
  }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar Usuário</h2>

<form action="user-edit.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome do Usuário</label>
      <input type="text" class="form-control" disabled name="username" value="<?php echo $user['username']; ?>"/>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">E-mail</label>
      <input type="text" class="form-control" disabled name="email" value="<?php echo $user['email']; ?>"/>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Senha</label>
      <input type="password" class="form-control" name="password"/>
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;" name="user-edit" value="user-edit">
  <input type="text" class="form-control" style="display:none;" name="id" value="<?php echo $_GET['id']; ?>">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="users.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
