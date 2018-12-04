
<?php 
$j  = ($_POST['jml']);
$id  = ($_POST['id']);

include '../config/koneksi.php';

echo " 
                <div class='row'>
                  <div class='col-sm-3 nopadding' style='text-align: center;'>
                    <label class='form-label'>Keterangan</label>
                  </div>
                  <div class='col-sm-2 nopadding' style='text-align: center;'>
                    <label class='form-label' >Unit</label>
                  </div>
                  <div class='col-sm-3 nopadding' style='text-align: center;'>
                    <label class='form-label'>Harga</label>
                  </div>
                  <div class='col-sm-3 nopadding' style='text-align: center;'>
                    <label class='form-label'>Subtotal</label>
                  </div>
                  <div class='col-sm-1'>
                    <button type='button'  class='generate_edit btn btn-warning btn-flat' ><i class='fa fa-plus'></i> </button> 
                  </div>
                </div>
                <br>
                ";
$query = mysqli_query($con, "SELECT *,(unit * harga_per_unit) as subtotal from tbl_doc_pengajuan_detail where doc_pengajuan_id='$id' and deleted=0");
while($row = mysqli_fetch_array($query)){  
    echo "
    <div id='sample_edit'> 
    <div class='form_edit'> 
      <div class='row'>
        <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='hidden' name='id_baris[]' id='id_baris' value='$row[id]' />                           
              <input type='text' class='form-control' id='keterangan' name='keterangan[]' value='$row[keterangan]' placeholder='Keterangan' required>
            </div>
          </div>  
          <div class='col-sm-2 nopadding'>
            <div class='form-group'>
              <input type='number' class='form-control' id='unit' name='unit[]' value='$row[unit]' placeholder='Unit' required>
            </div>
          </div>
          <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='number' class='form-control harga' id='harga_per_unit' name='harga[]' value='$row[harga_per_unit]' placeholder='Harga' required>
            </div>
          </div>
          <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='text' class='form-control ' id='subtotal' name='subtotal[]' value='$row[subtotal]' placeholder='sub total' required readonly=''>
              
            </div>
          </div>
          <div class='col-sm-1 nopadding'>
            <div class='copy'>
              <div class='input-group-btn'> 
                <button class='btn btn-danger remove_edit' type='button'><i class='fa fa-trash'></i></button>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>"; 
    }
?>


<!-- generate for edit-->
<script type="text/javascript"> 
 $(document).ready(function () {
  var sample = $('#sample_edit').html();

$(document).on('click', '.generate_edit', function() {
  $('#sample_edit').append(sample);
});

$(document).on("click",".remove_edit",function(){ 
  $(this).parents(".form_edit").remove();
});
$('#sample_edit').on('keyup', '[name^=unit], [name^=harga]', function() {
  // get related form
  var form = $(this).closest('.form_edit');
  // get its related values
  var unit = parseInt(form.find('[name^=unit]').val(), 10),
      harga = parseInt(form.find('[name^=harga]').val(), 10);
      

      // subtotal = parseInt(form.find('[name^=subtotal]').val(), 10);
  // ensure only numbers are given
  if (!isNaN(unit) && !isNaN(harga) ) {
    var $subtotal = (unit * harga)
    form.find('[name^=subtotal]').val($subtotal);
  }
});

});
</script>
