<?php
// error_reporting(0);

include "../config/koneksi.php";
$pass=md5($_POST['pass']);

$login=mysqli_query($con,"SELECT * FROM tbl_user WHERE username='$_POST[username]' AND password='$pass' ");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
  if ($ketemu > 0){
    session_start();
    ("username");
    ("password");
    ("id");
    $_SESSION['username']     = $r['username'];
    $_SESSION['password']     = $r['password'];
    $_SESSION['id']           = $r['id'];

    // tangkap ip dan macaddress
    function unix_os(){
  // ip address
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    }else if(isset($_SERVER['REMOTE_ADDR'])){
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }else{
        $ipaddress = 'UNKNOWN';
    }
    // ip public
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ip_public = $_SERVER['HTTP_CLIENT_IP'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip_public = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ip_public = $_SERVER['HTTP_X_FORWARDED'];
    }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ip_public = $_SERVER['HTTP_FORWARDED_FOR'];
    }else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ip_public = $_SERVER['HTTP_FORWARDED'];
    }else if(isset($_SERVER['REMOTE_ADDR'])){
        $ip_public = $_SERVER['REMOTE_ADDR'];
    }else{
        $ip_public = 'UNKNOWN';
    }
    // mac address
    ob_start();
    system('ipconfig /all');
    $mycom = ob_get_contents();
    ob_clean(); 
    $findme = "Physical"; 
    $pmac = strpos($mycom, $findme); 
    $mac = substr($mycom, ($pmac + 36), 18);
    // $macCommandString   =   "arp " . $ipaddress . " | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";
    // $mac = exec($macCommandString);

    ob_start();
    system('hostname');
    $hostname = ob_get_contents();
    ob_clean(); 

    // return
     return array( $ipaddress, $mac, $hostname, $ip_public);
} 
  $ip_local = unix_os()[0];
  $mac = unix_os()[1];
  $hostname = unix_os()[2];
  $ip_public = unix_os()[3];
//   echo $mac."<br>".$hostname; exit();

  // simpan ke tbl_usr_val (jika user belum pernah akses, maka simpan validasi untuk pertama kalinya), jika sudah pernah login, cek macaddressnya, jika sesuai dengan mac address saat pertama kali login, maka boleh login, jika tidak sesuai maka beri keterangan bahwa anda tidak dapat login menggunakan mac address yang berbeda.
   $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user_val WHERE user_id='$r[id]'"));
   $cek_mac = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tbl_user_val WHERE user_id='$r[id]'"));
   // echo $cek;exit();
          if($cek > 0 ){
            if($cek_mac['mac_address'] == $mac){
             // simpan ke tbl_usr_log
            mysqli_query($con,"INSERT INTO tbl_user_log(id,ip_local,ip_public,mac_address,hostname,user_id) VALUES ('','$ip_local','$ip_public','$mac','$hostname','$r[id]')");
                    echo "<script language=Javascript>
                                    alert('Anda Berhasil Login')
                                  </script>";
                     echo "<meta http-equiv='refresh' content='0; url=home.php'/>";
                }else{
                     echo "<script language=Javascript>
                              alert('Anda Tidak Dapat Login Menggunakan Mac Address yang berbeda')
                            </script>";
                     echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
                   }
          }else{
            // simpan ke tbl_usr_log
            mysqli_query($con,"INSERT INTO tbl_user_log(id,ip_local,ip_public,mac_address,hostname,user_id) VALUES ('','$ip_local','$ip_public','$mac','$hostname','$r[id]')");
            // simpan val
            mysqli_query($con,"INSERT INTO tbl_user_val(id,ip_local,mac_address,user_id) VALUES ('','$ip_local','$mac','$r[id]')");
              echo "<script language=Javascript>
                      alert('Anda Berhasil Login')
                    </script>";
             echo "<meta http-equiv='refresh' content='0; url=home.php'/>";
        }
  
  }else{
    echo "<script language=Javascript>
    alert('Login Anda Gagal,  username dan password tidak valid. Silahkan Hubungi Admin')
    </script>";
    echo "
    <meta http-equiv='refresh' content='0; url=../index.php'/>";
  }
?>
