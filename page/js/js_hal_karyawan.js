$(document).ready(function() {
	///////////////////////////////////////////////////////// proses js tbl_karyawan ///////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_divisi', function() {
        var id = $(this).data('id');
        // alert(id);
        $('#modal_cari_divisi').modal('show');
    })

$(document).on('click', '.cari_karyawan', function() {
        var id = $(this).data('id');
        // alert(id);
        $('#modal_cari_karyawan').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_karyawan', function() {
        var id = document.getElementById("id_karyawan").value;
        $('#id_hapus').val(id);
        $('#modal_confirm_delete_karyawan').modal('show');
    })

// confim edit
$(document).on('click', '.confirm_edit_karyawan', function() {
        var id = document.getElementById("id_karyawan").value;
        var divisi_id = document.getElementById("id_divisi").value;
        var nik = document.getElementById("nik").value;
        var nama_karyawan = document.getElementById("nama_karyawan").value;
        var username = document.getElementById("username").value;
        $('#id_edit').val(id);
        $('#divisi_id_edit').val(divisi_id);
        $('#nik_edit').val(nik);
        $('#nama_karyawan_edit').val(nama_karyawan);
        $('#username_edit').val(username);
        $('#modal_confirm_edit_karyawan').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_divisi', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-divisi.php',
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_divisi').val(obj.id_divisi);
          $('#divisi').val(obj.divisi);
          $('#modal_cari_divisi').modal('hide');
      });
    })

// pilh data
$(document).on('click', '.pilih_karyawan', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-karyawan.php',
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan').val(obj.id_karyawan);
          $('#nama_karyawan').val(obj.nama_karyawan);
          $('#nik').val(obj.nik);
          $('#username').val(obj.username);
          $('#id_divisi').val(obj.divisi_id);
          $('#divisi').val(obj.divisi);
          $('#modal_cari_karyawan').modal('hide');
      });
    })

})