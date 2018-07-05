<h5> Insert Account Admin </h5>
<p id="pesan"></p>
<form method="post" action="!#" id="form_insert">
<table>
    <tr><td>Username</td><td><input type="text" required name="username"/></td> </tr>
    <tr><td>Password</td><td><input type="password" required name="password"/></td> </tr>
    <tr><td>Nama Lengkap </td><td><input type="text" required name="nama_lengkap"/></td> </tr>
    <tr><td>Email </td><td><input type="email" name="email" required/></td> </tr>
    <tr><td>No.Telp </td><td><input type="email" name="no_telp" required/></td> </tr>
    <tr><td>Level Pengelolaan </td>
        <td>
            <select name="privileges">
                <option value="0">Semua</option>
                <?php while($row = mysql_fetch_object($sql)){ ?>
                <option value="<?=$row->id_kategori;?>"><?=$row->nama_kategori;?></option>
                <?php };?>
            </select>
        </td> 
    </tr>
    
    <tr>
        <td>Blokir </td>
        <td>
            <select name="blokir">
                <option value="N">No</option>
                <option value="Y">Yes</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"> 
            <button type="button" id="simpan" value="Simpan"> Simpan</button>
            <a href="./media.php?module=account"> Kembali</a>
        </td>
    </tr>
        
</table>
</form>
<script>
    $(document).ready(function(){
        $('#simpan').click(function(){
            var form = $('#form_insert').serialize();
            $.post("./modul/mod_account/index.php?page=post_insert",form,function(data){
               $('#pesan').html(data)
            })
        })
    })
</script>