<?php 
	/**
	 * 
	 */
	class Client 
	{
		function __construct(){
			// echo error_reporting(E_ALL);
			include '../../../config/fungsi_indotgl.php';
			include '../../../config/fungsi_rupiah.php';
		}
		function query($query=''){
			include "../../../config/koneksi.php";
			return $result = mysql_query($query);
		}
		function reply($code,$msg,$params=''){
			$reply = array(
				"code"   =>$code,
				"msg"    =>$msg,
				"params" =>$params,
			);
			return  json_encode($reply);
		}
		function login(){
			$data=array();
			$u = $_POST['username'];
			$p = $_POST['password'];
			$sql = "SELECT * from user where username='$u' and password = '$p'";
			$query = $this->query($sql);
			while ($row=mysql_fetch_assoc($query)) {
				$data[]=$row;
			}
			if ($data==null) {
				echo $this->reply("99","Error Login, Pastikan username dan password benar",'');
			}else{
				session_start();
				$_SESSION['client']=$data[0];
				echo $this->reply(1000,'success Login',$_SESSION['client']);
			}
		}
		function formlogin(){
		
			 include 'form_login.php';
		}
		function client(){
			if (isset($_SESSION['client'])){
				$this->page_history();
			}else{
				$this->formlogin();
			}
		}


		function register(){
			// echo "Anjir";
			include 'form_register.php';

		}
		function add_client(){
			$keys = implode(",",array_keys($_POST));
			$value = array_values($_POST);
			$isi = null;
			foreach($value as $v){
				if($isi==null){
					$isi.="'".mysql_real_escape_string($v)."'";
				}else{
					$isi.=",'".mysql_real_escape_string($v)."'";

				}
			}

			$cek_duplikat = $this->cek_duplikat($_POST['username']);
			if ($cek_duplikat==true) {
				$sql = "INSERT into user($keys) values ($isi)";
				$this->query($sql);
				echo $this->reply(1000,'Success Register, Silahkan login',$sql);
			}else{
				echo $this->reply(99,'Error register, Username telah digunakan','');
			}
		}

		function cek_duplikat($username){
			$data = array();
			if ($username==null) {
				return false;
			}else{
				$username = mysql_escape_string($username);
				$sql = "SELECT username from  user where username='$username'";
				$query = $this->query($sql);
				while ($row=mysql_fetch_assoc($query)) {
					$data[]=$row;
				}
				if ($data==null) {
					return true;
				}else{
					return false;
				}
			}
		}

		function page_history(){
			session_start();
			$client = $_SESSION['client'];
			$iduser = $client['id'];

			$data = $this->source_history($iduser);
		
			include 'page_history.php';
		}
		function source_history($iduser=''){
			$data=array();
			
			$sql = "select o.*,(select count(id_orders) from orders i where o.id_orders=i.id_orders) as pesanan from orders o where o.iduser='$iduser'";
			$query = $this->query($sql);
			while ($row=mysql_fetch_assoc($query)) {
				$data []=(object)$row;
			}
		
			return $data;
		}

		function detail(){
			session_start();
			$data   =array();
			$total  =array();
			$ongkir =array();
			$berat  =array();
			$client    = $_SESSION['client'];
			$iduser    = $client['id'];
			$id_orders = $_GET['id'];

			// Detail Order
			$sql = "SELECT o.*,(select nama_kota from kota k where k.id_kota=o.id_kota) as kota,(select count(id_orders) from orders i where o.id_orders=i.id_orders) as pesanan from orders o where o.iduser='$iduser' and o.id_orders='$id_orders' ";

			$query = $this->query($sql);
			$rec   =mysql_fetch_object($query);
				

			// Detail Item  
			$sql_detail   = "SELECT d.id_orders,d.jumlah,p.* from orders_detail d inner join produk p on p.id_produk = d.id_produk where id_orders ='$rec->id_orders'";
			$query_detail = $this->query($sql_detail);
			while ($row=mysql_fetch_object($query_detail)) {
				$data[]  =$row;
				$total[] =$row->harga*$row->jumlah;
				$berat[] =$row->berat;
			}

			// Detail Ongkir
			$sql_ongkir = "SELECT ongkos_kirim from kota where id_kota='$rec->id_kota'";
			$query_ongkir = $this->query($sql_ongkir);
			$ongkir   =mysql_fetch_object($query_ongkir)->ongkos_kirim;


			// Totak 
			$_total = array_sum($total)+($ongkir*array_sum($berat));

			include 'detail_pembelian.php';
		
		}
		function client_logout(){				
				session_start(); //to ensure you are using same session
				session_destroy(); //destroy the session
		}

	}
	

	  $client = new Client;
	  $client->$_GET['module']();