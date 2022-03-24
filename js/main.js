/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var table = button.data('table');

  var modal = $(this);
  modal.find('.modal-title').text('Excluir');
  modal.find('#confirm').attr('href', 'delete.php?table=' + table + '&id=' + id);
})
