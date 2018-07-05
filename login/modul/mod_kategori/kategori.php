<?php
$aksi="modul/mod_kategori/aksi_kategori.php";


$add_sql = get_kategori();

if ($add_sql!=null) {
  $tombol=null;
}else{
  $tombol = "<input type=button value='Tambah Kategoris' 
          onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">";
}
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<h2>Kategori</h2>
          $tombol 
          <table>
          <tr><th>no</th><th>nama kategori</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kategori   $add_sql ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategori]</td>
             <td><a href=?module=kategori&act=editkategori&id=$r[id_kategori]>Edit</a> | 
	               <a href=$aksi?module=kategori&act=hapus&id=$r[id_kategori]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<h2>Tambah Kategori</h2>
          <form method=POST action='$aksi?module=kategori&act=input'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[id_kategori]'>
          <table>
          <tr><td>Nama Kategori</td><td> : <input type=text name='nama_kategori' value='$r[nama_kategori]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
