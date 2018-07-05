<?php
include "../config/koneksi.php";


function get_kategori(){
  // echo error_reporting(E_ALL);
  $username = $_SESSION['namauser'];

  $sql_admin = mysql_query("SELECT privileges from admins where username ='$username'");
  $row_admin= mysql_fetch_object($sql_admin);
  

  if ($row_admin!=null) {
    if ($row_admin->privileges==0) {
      $add_sql = '';
    }else{
      $add_sql = "where id_kategori='$row_admin->privileges'"; 
    }
  }else{
     $add_sql = '';
  }
  return $add_sql;
}


$add_sql = get_kategori();

if ($_SESSION[leveluser]=='admin'){
  $sql=mysql_query("select * from modul where aktif='Y' order by urutan");
}
else{
  $sql=mysql_query("select * from modul where status='user' and aktif='Y' order by urutan"); 
} 
while ($m=mysql_fetch_array($sql)){  
	
		if ($add_sql!=null && $m['link']=='?module=account') {
		}else{
			  echo "<li><a href='$m[link]'>&#187; $m[nama_modul]</a></li>";	

		}
}
?>
