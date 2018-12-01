$(document).ready(function() {
///////////////////////////////////////////////////////// proses js tbl_divisi ///////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_divisi', function() {
        var id = $(this).data('id');
        $('#modal_cari_divisi').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_divisi', function() {
        var id = document.getElementById("id_divisi").value;
        $('#id_hapus').val(id);
        $('#modal_confirm_delete_divisi').modal('show');
    })

// confim edit
$(document).on('click', '.confirm_edit_divisi', function() {
        var id = document.getElementById("id_divisi").value;
        var divisi = document.getElementById("divisi").value;
        var ket = document.getElementById("ket").value;
        $('#id_edit').val(id);
        $('#divisi_edit').val(divisi);
        $('#ket_edit').val(ket);
        $('#modal_confirm_edit_divisi').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_divisi', function() {
      var id_divisi = $(this).data('id');
      $.ajax({
          url: 'http://localhost/sim24/page/ajax/proses-ajax-divisi.php',
          data:"id="+id_divisi ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_divisi').val(obj.id_divisi);
          $('#divisi').val(obj.divisi);
          $('#ket').val(obj.ket);
          $('#modal_cari_divisi').modal('hide');
      });
})
})