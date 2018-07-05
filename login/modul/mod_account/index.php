<script src="../jquery-1.4.js"></script>
<?php 
    
include 'account.php';

$page = @$_GET['page'];

switch ($page) {
    case "table":
        table();
        break;
    case 'form_insert':
        form_insert();
        break;
     case 'form_update':
        form_update();
        break;
    case 'post_insert':
        post_insert();
        break;
    case 'post_update' :
        post_update();
        break;
     case 'delete_account':
        delete_account();
        break;    
    default:
        table();
}
