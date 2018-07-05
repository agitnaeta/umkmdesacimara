<h2>
  Login Client
</h2>
<?php if(isset($_SESSION['relogin'])){ ?>
  <p> Anda Harus Login </p>
 <?php }  else {};?> 
<form method="post"  id="form_login">
  <table width="50%">
    <thead>
      <th>Username </th>
      <th class="right">
          <input name="username">
      </th>
    </thead>
    <thead>
          <th>Password </th>
          <th class="right">
          <input name ="password" type="password">
          </th>
    </thead>
    
  </table>
</form>
<table width="50%">
   <thead>
          <th> </th>
          <th class="right">
            <button id="login"> Login</button>
          </th>
    </thead>
</table>

<script type="text/javascript">
  $(document).ready(function () {
      $('#login').click(function(){
          var form = $('#form_login').serialize();
          var url = './login/modul/mod_client/client.php?module=login';
          $.post(url,form,function (data) {
            var obj= JSON.parse(data);
            if (obj.code!=1000) {
              console.log(obj.params)
              alert(obj.msg)
            }else{
               window.location.href='./history'
            }
          })
      })
  })
</script>