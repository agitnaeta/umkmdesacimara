<style type="text/css">
	img {
		margin-left: auto;
		margin-right: auto;
		display: block;

	}
	
</style>
<link rel="stylesheet" type="text/css" href="./src/dt/media/css/jquery.dataTables.min.css">
<h2>Detail Orders</h2>
<table width="100%">
	<tr>
		<td> Pembelian Nomor</td>
		<td> <?=$rec->id_orders;?></td>
	</tr>
	<tr>
		<td> Nama Customer</td>
		<td> <?=$rec->nama_kustomer;?></td>
	</tr>
	<tr>
		<td> Alamat</td>
		<td> <?=$rec->alamat;?></td>
	</tr>
	<tr>
		<td> Telp</td>
		<td> <?=$rec->telpon;?></td>
	</tr>
	<tr>
		<td> Email</td>
		<td> <?=$rec->email;?></td>
	</tr>
	<tr>
		<td> Status Order</td>
		<td> <?=$rec->status_order;?></td>
	</tr>
	<tr>
		<td> Waktu</td>
		<td> <?=tgl_indo($rec->tgl_order);?> <?=$rec->jam_order;?></td>
	</tr>
	<tr>
		<td> Kirim ke</td>
		<td> <?=$rec->kota;?></td>
	</tr>
	<tr>
		<td> Jumlah Item</td>
		<td> <?=$rec->pesanan;?> Pcs</td>
	</tr>
</table>
<br>

<h2>Detail Items</h2>
<table id="example">
	<thead style="background-color: #c3c2c2;">
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Berat</th>
		<th>Qty</th>
		<th>Sub Total</th>
	</thead>
	<tbody>
		<?php foreach($data as $row):?>
			<tr>
				<td width="30%">
					<p><b> > <?=$row->nama_produk;?></b></p>
					<img width="100px" src="./foto_produk/<?=$row->gambar;?>">
				</td>
				<td style="text-align: right;">
					Rp. <?=format_rupiah($row->harga);?>
				</td>
				<td>
					<?=$row->berat;?>
				</td>
				<td>
					<?=$row->jumlah;?>
				</td>
				<td style="text-align: right;">
					Rp. <?=format_rupiah($row->harga*$row->jumlah);?>
				</td>
			</tr>
		<?php endforeach;?>	
		
		
	</tbody>
</table>
<table width="100%">
		<tr>
			<td colspan="4">
				<h4> > Sub Total</h4>
			</td>
			<td colspan="1" style="text-align: right;">
				<h4>Rp. <?=format_rupiah(array_sum($total));?></h4>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h4> > Ongkos Kirim</h4>
			</td>
			<td colspan="1" style="text-align: right;">
				<h4>Rp. <?=format_rupiah($ongkir);?> * <?=array_sum($berat);?> Kg = Rp. <?=format_rupiah($ongkir*array_sum($berat));?></h4>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h2>Total</h2>
			</td>
			<td colspan="1" style="text-align: right;">
				<h3>Rp. <?=format_rupiah($_total);?></h3>
			</td>
		</tr>
</table>

<script type="text/javascript" src="src/dt/media/js/jquery.js"></script>
<script type="text/javascript" src="./src/dt/media/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
$('#table').DataTable();
});
</script>