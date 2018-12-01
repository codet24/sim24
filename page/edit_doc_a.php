<?php 
$j  = ($_POST['jml']);
// $j  = 2;
for($i=0; $i<$j;$i++){ 
     echo "
    <div id='sample'> 
    <div class='form'> 
      <div class='row'>
        <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='hidden' name='id_baris[]' />                           
              <input type='text' class='form-control' id='keterangan' name='keterangan[]' value='' placeholder='Keterangan' required>
            </div>
          </div>  
          <div class='col-sm-2 nopadding'>
            <div class='form-group'>
              <input type='number' class='form-control' id='unit' name='unit[]' value='' placeholder='Unit' required>
            </div>
          </div>
          <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='number' class='form-control harga' id='harga_per_unit' name='harga[]' value='' placeholder='Harga' required>
            </div>
          </div>
          <div class='col-sm-3 nopadding'>
            <div class='form-group'>
              <input type='text' class='form-control ' id='subtotal' name='subtotal[]' value='' placeholder='sub total' required readonly=''>
              
            </div>
          </div>
          <div class='col-sm-1 nopadding'>
            <div class='copy'>
              <div class='input-group-btn'> 
                <button class='btn btn-danger remove' type='button'><i class='fa fa-trash'></i></button>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>"; 
    }
?>
