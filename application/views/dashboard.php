<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
	<link href='<?php echo base_url('assets/css/mystyle.css'); ?>' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
	echo "<div class='container'>";
		echo "<div class='row'>";
			echo "<div class='col-md-4'></div>"; 
			echo "<div class='col-md-4 login'>"; 
				echo "<center><h1>Dashboard</h1></center>";
				echo "<br>";
				echo "<br>";
				echo form_open('Welcome/dashboard');
					echo form_submit('gotoKategori', 'Master Kategori', ['class'=>'btn btn-success form-control']);
					echo "<br><br>";
					echo form_submit('gotoPeraturan', 'Master Peraturan', ['class'=>'btn btn-success form-control']);
					echo "<br><br>";
					echo form_submit('gotoSiswa', 'Master Siswa', ['class'=>'btn btn-success form-control']);
					echo "<br><br>";
					echo form_submit('gotoMember', 'Master Member', ['class'=>'btn btn-success form-control']);
					echo "<br><br>";
					echo form_submit('gotoCatatPelanggaran', 'Pencatatan Pelanggaran', ['class'=>'btn btn-success form-control']);
				echo form_close();
			echo "</div>";
		echo "</div>";
	echo "</div>";
?>
</body>
</html>