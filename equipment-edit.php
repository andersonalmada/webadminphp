<?php
  require_once('functions.php');
  $equipment = find('equipments', $_GET['id']);
  $responsibles = find('responsibles');
  $places = find('places');

  if (!empty($_POST['equipment-edit'])) {
    $data = array("name" => $_POST['name'],
                  "description" => $_POST['description'],
                  "fk_responsible_id" => $_POST['fk_responsible_id'],
                  "fk_place_id" => $_POST['fk_place_id']);

    editEquipment('equipments', $_POST['id'], $data, $_FILES["photo"]);
  }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar Equipamento</h2>

<form action="equipment-edit.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Imagem</label>
      <input type="file" name="photo" />            
        <?php 
        if (file_exists("uploads/".$_GET['id'].".jpeg")) { ?>
          <div style="width: 240px;height: 240px;">
          <img class="img-responsive" src="uploads/<?php echo $_GET['id'] ?>.jpeg" width="200" height="200"/>
          </div>
        <?php 
        } 
        ?>              
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Nome</label>
      <input type="text" class="form-control" name="name" value="<?php echo $equipment['name']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo2">Descrição</label>
      <textarea class="form-control" name="description"><?php echo $equipment['description']; ?></textarea>      
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">Responsável</label>
        <select class="selectpicker" data-width="auto" name="fk_responsible_id">
          <?php if ($responsibles) : ?>
          <?php foreach ($responsibles as $responsible) :
                  if($equipment['fk_responsible_id'] != $responsible['id']) : ?>
                    <option value="<?php echo $responsible['id']; ?>"><?php echo $responsible['name']; ?></option>
            <?php else : ?>
                    <option value="<?php echo $responsible['id']; ?>" selected><?php echo $responsible['name']; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php else : ?>
          	<option value="0">Sem responsável</option>
          <?php endif; ?>
        </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">Local</label>
        <select class="selectpicker" data-width="auto" name="fk_place_id">
          <?php if ($places) : ?>
          <?php foreach ($places as $place) :
                  if($equipment['fk_place_id'] != $place['id']) : ?>
                    <option value="<?php echo $place['id']; ?>"><?php echo $place['name']; ?></option>
            <?php else : ?>
                    <option value="<?php echo $place['id']; ?>" selected><?php echo $place['name']; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php else : ?>
          	<option value="0">Sem local</option>
          <?php endif; ?>
        </select>
    </div>
  </div>

  <input type="text" class="form-control" style="display:none;" name="equipment-edit" value="equipment-edit">
  <input type="text" class="form-control" style="display:none;" name="id" value="<?php echo $_GET['id']; ?>">

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="equipments.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
