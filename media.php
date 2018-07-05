<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include "dina_titel.php"; ?></title>
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="teguhjaya">
<meta name="author" content="Teguh Darwono">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://localhost/tokohp/rss.xml" />

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="lightbox/themes/default/jquery.lightbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-1.4.js"></script>
<script type="text/javascript" src="lightbox/jquery.lightbox.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('.lightbox').lightbox();		    
		});
  </script>

</head>

<body>
  
<div id="main_container">
	
  <div class="top_bar">
      <h1 style="padding:15px;">UMKM Desa Cimara</h1>
      <div class="top_search">
        <br>
          <div class="search_text">  </div>
          <form method="POST" action="hasil-pencarian.html">
            <input class="search_input" name="kata" type="text" placeholder=" Cari Produk">
          </form>
      </div>            
  </div>
	<div id="header"></div>

  <div id="main_content"> 
       <div id="menu_tab">
            <div class="left_menu_corner"></div>
              <ul class="menu">
		            <li><a href="index.php" class="nav1">Home</a></li>
                <li class="divider"></li>
		            <li><a href="cara-pembelian.html" class="nav3">Cara Pembelian</a></li>
                <li class="divider"></li>
		            <li><a href="semua-produk.html" class="nav4">Semua Produk</a></li>
                <li class="divider"></li>
		            <li><a href="hubungi-kami.html" class="nav6">Hubungi Kami</a></li>        
                <li class="divider"></li>


                 <?php if(!isset($_SESSION['client'])){?>
                <li><a href="client" class="nav6">Login Client</a></li>  
                <li class="divider"></li>
                <li><a href="register" class="nav6">Daftar Baru</a></li>  
                <?php } else{};?>

                <li class="divider"></li>
                <?php if(isset($_SESSION['client'])){?>
                   <li><a href="client" class="nav6">History Pembelian</a></li>  
                   <li><a href="#!" id="client_logout" class="nav6">Logout</a></li>  
                 <?php } else{};?>  
              </ul>
            <div class="right_menu_corner"></div>
          </div><!-- end of menu tab -->     
        
  <div class="left_content"> 
      <?php include "kiri.php";?>         
  </div>
   
   <div class="center_content">
      <?php include "tengah.php";?>           
   </div>
   
   <div class="right_content">
      <?php include "kanan.php";?>                
   </div><!-- end of right content -->   
            
   </div><!-- end of main content -->
   
   <div class="footer">     
        <div class="right_footer">
        <a href="index.php">home</a>
        <a href="profil-kami.html">tentang kami</a>
        <a href="hubungi-kami.html">hubungi kami</a>
        <a href="./login">login</a>
        </div>   
   </div>                 

</div>
<!-- end of main_container -->
<div style="visibility: hidden; position: absolute;"><div></div></div>
<script type="text/javascript">
  $('#client_logout').click(function () {
      var url ='./client_logout';
      $.get(url,function () {
        window.location.href='./home'
      })
  })
</script>
</body>
</html>
