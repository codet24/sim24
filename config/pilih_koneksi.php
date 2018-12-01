<?php
$con = mysqli_connect('localhost','root','','db_conf24');

$database_name = $_POST['database_name'];
$hostname = $_POST['hostname'];
$port = $_POST['port'];
$username = $_POST['username'];
$password = $_POST['password'];
?>
<!-- // nyimpen variabel -->
<input type ="hidden" id="database_name" value="<?php echo $database_name; ?>">
<input type ="hidden" id="hostname" value="<?php echo $hostname; ?>">
<input type ="hidden" id="username" value="<?php echo $username; ?>">
<input type ="hidden" id="password" value="<?php echo $password; ?>">
<?php
// exit();
// cek database ada atau engga di tbl_conf
$cek=mysqli_query($con,"SELECT * FROM tbl_conf WHERE database_name='$database_name'");

$ketemu=mysqli_num_rows($cek);
$r=mysqli_fetch_array($cek);
// Apabila username dan password ditemukan
if ($ketemu > 0){
    $update = mysqli_query($con,"UPDATE tbl_conf_apply WHERE conf_id='$r[id]'");
    ?>
        <SCRIPT language=Javascript>
            var database_name = document.getElementById("database_name").value;
            var hostname = document.getElementById("hostname").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            // alert(database_name)
            $.ajax({
            url:'koneksi.php',
            type:'GET',
            data:{database_name:database_name}, //Pass your varibale in data
            success:"function('data berhasil dikirim')"{
            alert(getreturn); //you get return value in this varibale, us it anywhere
            }
        </script>
<?php
}else{
  echo "<SCRIPT language=Javascript>
  alert('Koneksi Tidak dapat dipilih')
  </script>";
  echo "
  <meta http-equiv='refresh' content='0; url=../index.php'/>";
}
?>