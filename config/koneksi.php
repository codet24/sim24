<?php
// error_reporting(0);
// tes koneksi
if(isset($_GET['database_name'])){
$database_get = $_GET['database_name'];
echo $data = $database_get;
}

if(isset($_POST['koneksikan'])){
$database_name = $_POST['database_name'];
// ambil data dari tabel tbl_conf_apply
$db = mysqli_connect("localhost","root","","db_conf24");
// update tabel tbl_conf_apply
$tampil_tbl_conf = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_conf WHERE database_name ='$database_name' "));
$conf_id = $tampil_tbl_conf['id'];
// echo $conf_id; exit();
$update = mysqli_query($db,"UPDATE tbl_conf_apply SET conf_id = '$conf_id' "); 
?>
<input type="hidden" name="database_name" id="database_name" value="<?php echo $tampil_tbl_conf[database_name]; ?>">
<?php
    echo "<script language=Javascript>
    var database_name = document.getElementById('database_name').value;
    alert('Anda Terhubung dengan Database '+database_name)
    </script>";
    echo "
    <meta http-equiv='refresh' content='0; url=../index.php'/>";
}

// ambil datanya
$db = mysqli_connect("localhost","root","","db_conf24");
$ambil = mysqli_fetch_array(mysqli_query($db,"SELECT a.*,b.* FROM tbl_conf a JOIN tbl_conf_apply b ON a.id=b.conf_id "));
$server = $ambil['server'];
$user = $ambil['user'];
$pass = $ambil['password'];
$database = $ambil['database_name'];

$con = mysqli_connect("$server","$user","$pass","$database");

?>