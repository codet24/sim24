$(document).ready(function() {
	
  $('#tabel_dibuat').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
   $('#tabel_mengajukan').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
    $('#tabel_menyetujui').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
     $('#tabel_mengetahui').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
      $('#tabel_finance').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          { extend: 'copyHtml5', footer: true },
          { extend: 'excelHtml5', footer: true },
          { extend: 'csvHtml5', footer: true },
          { extend: 'pdfHtml5', footer: true }
          ]
        });
// proses js tbl_doc_pengajuan JPO//////////////////////////////////////////////////////////////////
// cari data
$(document).on('click', '.cari_doc_a', function() {
        var id = $(this).data('id');
        $('#modal_cari_doc_a').modal('show');
    })

// confim delete
$(document).on('click', '.confirm_delete_doc_a', function() {
        var id = document.getElementById("doc_pengajuan_id").value;
        $('#id_hapus').val(id);
        $('#modal_confirm_delete_doc_a').modal('show');
    })


// pilh data
$(document).on('click', '.pilih_doc_a', function() {
      var id = $(this).data('id');
      $.ajax({
          url: "http://localhost/sim24/page/ajax/proses-ajax-doc-a.php",
          data:"id="+id ,
      }).success(function (data) {
          // alert(data);
          var json = data,
          obj = JSON.parse(json);
          $('#id_doc_a').val(obj.doc_a_id);
          $('#nama_pekerjaan_atas').val(obj.nama_pekerjaan);
          $('#nama_pekerjaan').val(obj.nama_pekerjaan);
          $('#date').val(obj.date);
          $('#no_mor').val(obj.no_mor);

          // buat ttd
          $('#dibuat_oleh').val(obj.dibuat_oleh);
          $('#yang_mengajukan').val(obj.yang_mengajukan);
          $('#yang_menyetujui').val(obj.yang_menyetujui);
          $('#yang_mengetahui').val(obj.yang_mengetahui);
          $('#finance').val(obj.finance);
          // id_karyawan
          $('#id_karyawan_dibuat_oleh').val(obj.id_karyawan_dibuat_oleh);
          $('#id_karyawan_yang_mengajukan').val(obj.id_karyawan_yang_mengajukan);
          $('#id_karyawan_yang_menyetujui').val(obj.id_karyawan_yang_menyetujui);
          $('#id_karyawan_yang_mengetahui').val(obj.id_karyawan_yang_mengetahui);
          $('#id_karyawan_finance').val(obj.id_karyawan_finance);
          $('#total').val(obj.total);

          $('#jumlah_detail').val(obj.jumlah_detail);
          // $('#id_detail').val(obj.id_detail);
          $('#keterangan').val(obj.keterangan_detail);
          $('#unit').val(obj.unit_detail);
          $('#harga_per_unit').val(obj.harga_per_unit_detail);
          $('#jumlah_detail').val(obj.jumlah_detail);

          $('#modal_cari_doc_a').modal('hide');
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