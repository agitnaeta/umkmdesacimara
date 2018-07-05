 <?php 
  include 'client.php';
  $client = new Client;
  $client->$_GET['module']();