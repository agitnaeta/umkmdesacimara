<?php 
    function con(){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "dbgemakom";

        // Koneksi dan memilih database di server
        mysql_connect($server,$username,$password) or die("Koneksi gagal");
        mysql_select_db($database) or die("Database tidak bisa diakses. Periksa server!");
    }
    function table(){
        con();
        $sql = mysql_query("SELECT * FROM admins");
        include 'table_account.php';
    }

    function form_insert(){
        con();
        $sql = mysql_query("SELECT * FROM kategori");
        include 'form_insert.php';   
    }

    function post_insert(){
       
        $cek_username= cek_username($_POST['username']);
        if($cek_username == 0 ){
            echo "Username Sudah Digunakan";
        }else{
            $_POST['password'] = md5($_POST["password"]);
            $_POST['level'] = "admin";
            $field = implode(",",array_keys($_POST));
            $values = "'".implode("','",array_values($_POST))."'";
            $sql = ("insert into admins ($field) values($values)");
            $query = mysql_query($sql);
            echo "Success Tambah Data";
        }
    }
    function cek_username($username){
        con();
        $sql = mysql_query("SELECT * from admins where username ='$username'");
        $row = mysql_fetch_object($sql);
        if($row==null){
            return 1;
        }else{
            return 0;
        }
    }
    function delete_account(){
        con();
        $username = $_POST["username"];
        $sql = mysql_query("DELETE FROM admins where username = '$username' ");
        if(!$sql){
            echo mysql_error();
        }
    }
    function form_update(){
        con();
        $username = $_GET["username"];
        $sql = mysql_query("SELECT * FROM admins where username = '$username'");
        $kategori = mysql_query("SELECT * FROM kategori");

        include 'form_update.php';
    }
    function post_update()
    {
        con();

        $old = $_POST['old_username'];
        unset($_POST["old_username"]);
        $data = array_filter($_POST);
        $q = null ;
        foreach(array_keys($data) as $row){
            $q []= $row."='".$data[$row]."'";
        }
        $set = implode(",", $q);
         $sql =mysql_query("update admins set $set where username='$old'");
        echo "Success update data";
    }
    function kategori($id)
    {
        con();
        $sql =mysql_query("SELECT * from kategori where id_kategori='$id'");
        $row = mysql_fetch_object($sql);
        if ($row==null) {
            echo "Semua";
        }else{
             print_r($row->nama_kategori);
        }
    }

