<h5> Update Account Admin </h5>
<p id="pesan"></p>
<form method="post" action="!#" id="form_update">
<?php while($row = mysql_fetch_object($sql)){ ?>
<table>
    <tr><td>Username</td>
        <td>
                <input type="text" required name="username" value='<?=$row->username;?>'/>
                <input type="hidden" required name="old_username" value='<?=$row->username;?>'/>
        </td> 
    </tr>
   
    <tr><td>Password</td>
        <td>
            <input type="password" required name="password" />
            <i> *Biarkan kosong jika tidak ingin diubah</i>
        </td> 
    </tr>
    <tr><td>Nama Lengkap </td><td><input type="text" required name="nama_lengkap" value='<?=$row->nama_lengkap;?>'/></td> </tr>
    <tr><td>Email </td><td><input type="email" name="email" value='<?=$row->email;?>' required/></td> </tr>
    <tr><td>No.Telp </td><td><input type="email" name="no_telp" value='<?=$row->no_telp;?>' required/></td> </tr>
    <tr><td>Level Pengelolaan </td>
        <td>
            <select name="privileges" id="select_privileges">
                
                <option value="0">Semua</option>
                <?php while($k = mysql_fetch_object($kategori)){ ?>
                <option value="<?=$k->id_kategori;?>"><?=$k->nama_kategori;?></option>
                <?php };?>
            </select>
        </td> 
    </tr>
    
    <tr>
        <td>Blokir </td>
        <td>
            <select name="blokir" id="select_blokir">
                <option value="N">No</option>
                <option value="Y">Yes</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"> 
            <button type="button" id="update" value="update"> Update</button>
            <a href="./media.php?module=account"> Kembali</a>
        </td>
    </tr>
    <input type="hidden" id="privileges" value="<?=$row->privileges;?>">
    <input type="hidden" id="blokir" value="<?=$row->blokir;?>">
</table>
</form>
<?php } ;?>
<?php print_r($row);?>
<script>
    $(document).ready(function(){
        $('#update').click(function(){
            var form = $('#form_update').serialize();
            $.post("./modul/mod_account/index.php?page=post_update",form,function(data){
               
               $('#pesan').html(data)

               
                setTimeout(function () {
                     window.location.href ='./media.php?module=account';
                },1000)
            })
        })
       

       var privileges = $('#privileges').val();
       var blokir = $('#blokir').val()

       $('#select_blokir').val(blokir)
       $('#select_privileges').val(privileges)
    })
</script>