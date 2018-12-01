$(document).ready(function() {
///////////////////////////////////////////////////////// proses js tbl_user///////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_user', function() {
        var id = $(this).data('id');
        $('#modal_cari_user').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_user', function() {
        var id = document.getElementById("id_user").value;
        $('#id_hapus').val(id);
        $('#modal_confirm_delete_user').modal('show');
    })

// confim edit
$(document).on('click', '.confirm_edit_user', function() {
        var id = document.getElementById("id_user").value;
        var username = document.getElementById("username").value;
        var password_sebelumnya = document.getElementById("password_sebelumnya").value;
        var password_baru = document.getElementById("password_baru").value;
        var konfirmasi_password = document.getElementById("konfirmasi_password").value;
        $('#id_edit').val(id);
        $('#username_edit').val(username);
        $('#password_sebelumnya_edit').val(password_sebelumnya);
        $('#password_baru_edit').val(password_baru);
        $('#konfirmasi_password_edit').val(konfirmasi_password);
        $('#modal_confirm_edit_user').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_user', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-user.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_user').val(obj.id_user);
          $('#username').val(obj.username);
          $('#modal_cari_user').modal('hide');
      });
    })
})