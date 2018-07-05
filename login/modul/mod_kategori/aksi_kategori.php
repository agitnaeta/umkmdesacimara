<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";
function get_kategori(){

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

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='kategori' AND $act=='hapus'){
  mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kategori
elseif ($module=='kategori' AND $act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("INSERT INTO kategori(nama_kategori,kategori_seo) VALUES('$_POST[nama_kategori]','$kategori_seo')");
  header('location:../../media.php?module='.$module);
}

// Update kategori
elseif ($module=='kategori' AND $act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]', kategori_seo='$kategori_seo' WHERE id_kategori = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
