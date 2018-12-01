$(document).ready(function() {
	///////////////////////////////////////////////////////// proses js tbl_qa ///////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_qa', function() {
        var id = $(this).data('id');
        $('#modal_cari_qa').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_qa', function() {
        var id = document.getElementById("id_qa").value;
        $('#id').val(id);
        $('#modal_confirm_delete_qa').modal('show');
    })

// confim edit
$(document).on('click', '.confirm_edit_qa', function() {
        var id = document.getElementById("id_qa").value;
        var quick_access = document.getElementById("quick_access").value;
        var description = document.getElementById("description").value;
        $('#id_edit').val(id);
        $('#quick_access_edit').val(quick_access);
        $('#description_edit').val(description);
        $('#page').val(page);
        $('#modal_confirm_edit_qa').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_qa', function() {
      var quick_access = $(this).data('quick_access');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-qa.php',
          data:"quick_access="+quick_access ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_qa').val(obj.id_qa);
          $('#quick_access').val(obj.quick_access);
          $('#description').val(obj.description);
          $('#page').val(obj.page);
          $('#modal_cari_qa').modal('hide');
      });
    })

})