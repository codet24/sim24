$(document).ready(function() {
	
// ///////////////////////////////////////////////////////// proses js tbl_qa_detail/////////////////////////////////////////////////
// cari data quick access 
$(document).on('click', '.cari_quick_access', function() {
        var id = $(this).data('id');
        $('#modal_cari_quick_access').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_qa_detail', function() {
        var id = document.getElementById("id_qa_detail").value;
        $('#id').val(id);
        $('#modal_confirm_delete_qa_detail').modal('show');
    })

// confim edit
$(document).on('click', '.confirm_edit_qa_detail', function() {
        var id = document.getElementById("id_qa_detail").value;
        var user_id = document.getElementById("user_id").value;
        var qa_id = document.getElementById("qa_id").value;
        $('#id_qa_detail_edit').val(id);
        $('#user_id_edit').val(user_id);
        $('#qa_id_edit').val(qa_id);
        $('#modal_confirm_edit_qa_detail').modal('show');
    })

// pilh data quick access
$(document).on('click', '.pilih_quick_access', function() {
      var quick_access = $(this).data('quick_access');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-qa.php',
          data:"quick_access="+quick_access ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#qa_id').val(obj.id_qa);
          $('#quick_access').val(obj.quick_access);
          $('#modal_cari_quick_access').modal('hide');
      });
    })

// cari data username 
$(document).on('click', '.cari_username', function() {
        var id = $(this).data('id');
        $('#modal_cari_username').modal('show');
    })
// pilh data username
$(document).on('click', '.pilih_username', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-user.php',
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#user_id').val(obj.id_user);
          $('#username').val(obj.username);
          $('#modal_cari_username').modal('hide');
      });
    })

// cari data 
$(document).on('click', '.cari_qa_id_detail', function() {
        var id = $(this).data('id');
        $('#modal_cari_qa_id_detail').modal('show');
    })
// pilh data
$(document).on('click', '.pilih_qa_id_detail', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-qa-detail.php',
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_qa_detail').val(obj.id_qa_detail);
          $('#user_id').val(obj.user_id);
          $('#username').val(obj.username);
          $('#qa_id').val(obj.qa_id);
          $('#quick_access').val(obj.quick_access);
          $('#modal_cari_qa_id_detail').modal('hide');
      });
    })

})