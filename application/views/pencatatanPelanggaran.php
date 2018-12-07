<?php 
	include("header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencatatan Pelanggaran</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
</head>
<body>
<?php

	echo "<div class='container'>";
		echo "<h1>Pencatatan Pelanggaran</h1>";
		echo "<div class='row'>";
			echo "<div class='col-md-6'>"; 
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
						echo "<td><a href='".site_url('Welcome/insertpelanggaran/'.$row->kode)."'>".$row->kode."</a></td>";
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