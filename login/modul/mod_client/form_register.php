<style type="text/css">
	/*new Patch*/
  .right{
    text-align: right;
  }
  .left{
  	text-align: left;
  }
	input,textarea{
		width: 100%;
	}
	thead{
		line-height: 30px;
	}
</style>
<h2>
  Register Client
</h2>
<form method="post"  id="form_register">
  <table width="70%">
    <thead>
      <th class="left">Username </th>
      <th class="left">
          <input name="username" id="username" required="" minlength="5">
      </th>
    </thead>
    <thead>
      <th class="left">Nama Lengkap </th>
      <th class="left">
          <input name="nama_kustomer" required="">
      </th>
    </thead>
     <thead>
      <th class="left">Alamat </th>
      <th class="left">
          <textarea name="alamat"></textarea>
      </th>
    </thead>
     <thead>
      <th class="left">Email</th>
      <th class="left">
          <input name="email" type="email" required>
      </th>
    </thead>
     <thead>
      <th class="left">No Telp </th>
      <th class="left">
          <input name="telpon" minlength="9" maxlength="13" required="">
      </th>
    </thead>
     <thead>
      <th class="left">Password</th>
      <th class="left">
          <input name="password" minlength="8" required>
      </th>
    </thead>
  </table>
</form> 
<table width="70%">
	<thead>
      <th class="left"></th>
      <th class="right">
          <button id="register"> Sign Up!</button>
      </th>
    </thead>
</table>
<script type="text/javascript">
  $(document).ready(function () {
      $('#register').click(function(){
          var form = $('#form_register').serialize();
          var url = './login/modul/mod_client/client.php?module=add_client';
          $.post(url,form,function (data) {
            var obj= JSON.parse(data);
            if (obj.code==1000) {
	            	alert(obj.msg)
	              window.location.href='./client'
            }else{
            	alert(obj.msg)
            	$('#username').focus()
            	return false;
            }
          })
      })
  })
</script>