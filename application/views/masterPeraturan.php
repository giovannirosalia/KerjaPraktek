<?php 
	include("header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Peraturan</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
</head>
<body>
<?php
	foreach($qryKategori->result() as $row){
		$arrKategori[$row->kode] = $row->nama;
	}

	echo "<div class='container'>";
		echo "<h1>Master Peraturan</h1>";
		
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-6'>"; 
				echo form_open('Welcome/masterPeraturan');
					echo form_input('txtkodeperaturan',$kodePeraturan,['class'=>'form-control','readonly'=>'readonly']);
					echo "<br>";
					echo form_dropdown('cbkategori', $arrKategori, '', ['class'=>'form-control']);
					echo "<br>";
					echo form_input('txtnamaperaturan','',['class'=>'form-control', 'placeholder'=>'Masukkan Nama Peraturan']);
					echo "<br>";
					echo form_input('txtpoin','',['class'=>'form-control', 'placeholder'=>'Masukkan Poin Peraturan']);
					echo "<br>";
					echo form_input('txtsp','',['class'=>'form-control', 'placeholder'=>'Masukkan SP Peraturan']);
					echo "<br>";
					echo form_textarea('txtketerangan','',['class'=>'form-control', 'placeholder'=>'Keterangan']);
					
					echo "<br><br>";
					echo form_submit('btnSimpanPeraturan', 'Simpan Peraturan', ['class'=>'btn btn-success']); 
				echo form_close();
			echo "</div>";
		echo "</div>";
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-12'>"; 
				echo "<h2>Daftar Peraturan</h2>"; 
				echo "<table class='table table-striped'>"; 
					echo "<tr>"; 
						echo "<th>Kode Peraturan</th>"; 
						echo "<th>Kategori</th>"; 
						echo "<th>Nama Peraturan</th>"; 
						echo "<th>Poin</th>"; 
						echo "<th>SP</th>"; 
						echo "<th>Keterangan</th>"; 
					echo "</tr>"; 		
					foreach($qryPeraturan->result() as $row){
						echo "<tr>";
						echo "<td>".$row->kode."</td>";
						echo "<td>".$row->namakategori."</td>";
						echo "<td>".$row->nama."</td>";
						echo "<td>".$row->poin."</td>";
						echo "<td>".$row->sp."</td>";
						echo "<td>".$row->keterangan."</td>";
						echo "</tr>";
					}			
				echo "</table>";
			echo "</div>"; 
		echo "</div>"; 
	echo "</div>"; 
?>

</body>
</html>