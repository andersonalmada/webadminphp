<?php
  require_once('functions.php');
  $responsibles = find('responsibles');
  $places = find('places');

  if (!empty($_POST['equipment-add'])) {
    $data = array("name" => $_POST['name'],
                  "description" => $_POST['description'],
                  "responsible_id" => $_POST['fk_responsible_id'],
                  "place_id" => $_POST['fk_place_id']);

    addEquipment($data, $_FILES["photo"]);
  }
?>
<?php include(HEADER_TEMPLATE); ?>
<h2>Novo Equipamento</h2>

<form action="equipment-add.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Imagem</label>
      <input type="file" name="photo" />
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome</label>
      <input type="text" class="form-control" name="name">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo2">Descrição</label>
      <textarea class="form-control" name="description"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">Responsável</label>
        <select class="selectpicker" data-width="auto" name="fk_responsible_id">
          <?php if ($responsibles) : ?>
          <?php foreach ($responsibles as $responsible) : ?>
            <option value="<?php echo $responsible['id']; ?>"><?php echo $responsible['name']; ?></option>
          <?php endforeach; ?>
          <?php else : ?>
          	<option value="0">Sem responsável</option>
          <?php endif; ?>
        </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo4">Local</label>
        <select class="selectpicker" data-width="auto" name="fk_place_id">
          <?php if ($places) : ?>
          <?php foreach ($places as $place) : ?>
            <option value="<?php echo $place['id']; ?>"><?php echo $place['name']; ?></option>
          <?php endforeach; ?>
          <?php else : ?>
          	<option value="0">Sem local</option>
          <?php endif; ?>
        </select>
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;"name="equipment-add" value="equipment-add">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" >Salvar</button>
      <a href="equipments.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
