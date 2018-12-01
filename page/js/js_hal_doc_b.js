$(document).ready(function() {
	$('#tabel_dibuat_opo').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
   $('#tabel_mengajukan_opo').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
    $('#tabel_menyetujui_opo').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
     $('#tabel_mengetahui_opo').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
      $('#tabel_finance_opo').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
// proses js tbl_doc_pengajuan OPO//////////////////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_doc_b', function() {
        var id = $(this).data('id');
        $('#modal_cari_doc_b').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_doc_b', function() {
        var id = document.getElementById("doc_pengajuan_id").value;
        $('#id_hapus').val(id);
        $('#modal_confirm_delete_doc_b').modal('show');
    })


// pilh data
$(document).on('click', '.pilih_doc_b', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-doc-b.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#doc_pengajuan_id').val(obj.doc_pengajuan_opo_id);
          $('#nama_pekerjaan').val(obj.nama_pekerjaan);
          $('#dibuat_oleh').val(obj.dibuat_oleh);
          $('#total').val(obj.total);
          $('#modal_cari_doc_b').modal('hide');
      });
    })

// cari data karyawan untuk ttd
$(document).on('click', '.cari_karyawan_dibuat_oleh', function() {
        var id = $(this).data('id');
        $('#modal_cari_karyawan_dibuat_oleh').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_karyawan_dibuat_oleh', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-karyawan.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan_dibuat_oleh').val(obj.id_karyawan);
          $('#dibuat_oleh').val(obj.nama_karyawan);
          $('#modal_cari_karyawan_dibuat_oleh').modal('hide');
      });
    })

// cari data karyawan untuk ttd
$(document).on('click', '.cari_karyawan_yang_mengajukan', function() {
        var id = $(this).data('id');
        $('#modal_cari_karyawan_yang_mengajukan').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_karyawan_yang_mengajukan', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-karyawan.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan_yang_mengajukan').val(obj.id_karyawan);
          $('#yang_mengajukan').val(obj.nama_karyawan);
          $('#modal_cari_karyawan_yang_mengajukan').modal('hide');
      });
    })

// cari data karyawan untuk ttd yang menyetujui
$(document).on('click', '.cari_karyawan_yang_menyetujui', function() {
        var id = $(this).data('id');
        $('#modal_cari_karyawan_yang_menyetujui').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_karyawan_yang_menyetujui', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-karyawan.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan_yang_menyetujui').val(obj.id_karyawan);
          $('#yang_menyetujui').val(obj.nama_karyawan);
          $('#modal_cari_karyawan_yang_menyetujui').modal('hide');
      });
    })

// cari data karyawan untuk ttd yang menyetujui
$(document).on('click', '.cari_karyawan_yang_mengetahui', function() {
        var id = $(this).data('id');
        $('#modal_cari_karyawan_yang_mengetahui').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_karyawan_yang_mengetahui', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-karyawan.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan_yang_mengetahui').val(obj.id_karyawan);
          $('#yang_mengetahui').val(obj.nama_karyawan);
          $('#modal_cari_karyawan_yang_mengetahui').modal('hide');
      });
    })

// cari data karyawan untuk ttd yang menyetujui
$(document).on('click', '.cari_karyawan_finance', function() {
        var id = $(this).data('id');
        $('#modal_cari_karyawan_finance').modal('show');
    })

// pilh data
$(document).on('click', '.pilih_karyawan_finance', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-karyawan.php",
          data:"id="+id ,
      }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $('#id_karyawan_finance').val(obj.id_karyawan);
          $('#finance').val(obj.nama_karyawan);
          $('#modal_cari_karyawan_finance').modal('hide');
      });
    })



})