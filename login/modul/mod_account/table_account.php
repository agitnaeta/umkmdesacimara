<br>
<h5> Manage Account</h5>
<a style="font-size: 12px;" href="./media.php?module=account&page=form_insert"> + Tambah Account</a>
<table border="1" width=100%>
    <thead>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>NO Telp</th>
        <th>Level Pengelolaan</th>
        <th>Blokir</th>
        <th>Action</th>
    </thead>
    <tbody>
       
      <?php while($row = mysql_fetch_object($sql)){ ?>
            <tr>
                    <td><?=$row->username;?></td>
                    <td><?=$row->nama_lengkap;?></td>
                    <td><?=$row->email;?></td>
                    <td><?=$row->no_telp;?></td>
                    <td><?=kategori($row->privileges);?></td>
                    <td><?=$row->blokir;?></td>
                    <td>
                
                        <a href="./media.php?module=account&page=form_update&username=<?=$row->username;?>"> Update</a>
                        <a href="#" class="delete" data-id="<?=$row->username;?>"> Delete</a>
                    </td>
            </tr>            
      <?php } ;?>
    </tbody>
</table>
<script>
         $('.delete').click(function(){
            var user = $(this).attr('data-id');
            if(confirm("Apakah Anda Yakin ingin menghapus "+user)){
                $.post("./modul/mod_account/index.php?page=delete_account",{username:user},function(data){
//                    console.log(data)
                   window.location.href ='./media.php?module=account';
                })    
            }
        })
</script>