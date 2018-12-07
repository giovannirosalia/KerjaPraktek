<?php 
	include("header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Kategori</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
</head>
<body>
<?php
	echo "<div class='container'>";
		echo "<h1>Master Kategori</h1>";
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-6'>"; 
				echo form_open('Welcome/masterKategori');
					echo form_input('txtkodekategori',$kodeKategori,['class'=>'form-control','readonly'=>'readonly']);
					echo "<br>";
					echo form_input('txtnamakategori','',['class'=>'form-control', 'placeholder'=>'Masukkan Nama Kategori']);
					echo "<br>";
					echo form_checkbox('isContinue', '1', FALSE)."Poin Berkelanjutan";
					echo "<br><br>";
					echo form_submit('btnSimpanKategori', 'Simpan Kategori', ['class'=>'btn btn-success']); 
				echo form_close();
			echo "</div>";
		echo "</div>";
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-6'>"; 
				echo "<h2>Daftar Kategori</h2>"; 
				echo "<table class='table table-striped'>"; 
					echo "<tr>"; 
						echo "<th>Kode Kategori</th>"; 
						echo "<th>Nama Kategori</th>"; 
						echo "<th>Kontinuitas</th>"; 
					echo "</tr>"; 		
					foreach($qryKategori->result() as $row){
						echo "<tr>";
						echo "<td>".$row->kode."</td>";
						echo "<td>".$row->nama."</td>";
						echo "<td>".$row->is_continue."</td>";
						echo "</tr>";
					}			
				echo "</table>";
			echo "</div>"; 
		echo "</div>"; 
	echo "</div>"; 
?>

</body>
</html>