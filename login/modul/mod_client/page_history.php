<div id="detail">
	<link rel="stylesheet" type="text/css" href="./src/dt/media/css/jquery.dataTables.min.css">
	<h2> History Pembelian </h2>
	<table id="example" class="display" style="width:100%">
	    <thead style="background-color: #c3c2c2;">
	    	<th>ID Order</th>
	    	<th>Tanggal</th>
	    	<th>Jumlah Item</th>
	    	<th>Status Order</th>
	    	<th>Action</th>
	    </thead> 
	    <tbody>
	    	<?php foreach($data as $row):?>
	    	<tr>
	    		<td><?php echo $row->id_orders;?></td>
	    		<td><?php echo tgl_indo($row->tgl_order);?></td>
	    		<td><?php echo $row->pesanan;?></td>
	    		<td><?php echo $row->status_order;?></td>
	    		<td>
	    			<a id="<?=$row->id_orders;?>" class="detail" href="#!"> Detail</a>
	    		</td>
	    	</tr>
		    <?php endforeach;?>
	    </tbody>
	</table>
	<script type="text/javascript" src="src/dt/media/js/jquery.js"></script>
	<script type="text/javascript" src="./src/dt/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
	   		 $('#example').DataTable();
		});
		$('.detail').click(function () {
			var id = $(this).attr('id');
			var url = './login/modul/mod_client/client.php?module=detail&id='+id+'';
			$.get(url,function (data) {
				$('#detail').html(data)
			})
		})
	</script>
</div>