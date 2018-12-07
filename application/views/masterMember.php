<?php 
	include("header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Member</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
</head>
<body>
<?php
	$arrJenis['WAKASEK'] = 'Wakil Kepala Sekolah';
	$arrJenis['GURU'] = 'Guru';

	echo "<div class='container'>";
		echo "<h1>Master Member</h1>";
		
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-6'>"; 
				echo form_open('Welcome/masterMember');
					echo form_input('txtusername','',['class'=>'form-control', 'placeholder'=>'Masukkan Username']);
					echo "<br>";
					echo form_input('txtnama','',['class'=>'form-control', 'placeholder'=>'Masukkan Nama ']);
					echo "<br>";
					echo form_dropdown('cbjenis', $arrJenis, '', ['class'=>'form-control']); 
					echo "<br><br>";
					echo form_submit('btnSimpanMember', 'Simpan Member', ['class'=>'btn btn-success']);
				echo form_close();
			echo "</div>";
		echo "</div>";
		echo "<br><br>";
		echo "<div class='row'>";
			echo "<div class='col-md-10'>"; 
				echo "<h2>Daftar Member</h2>"; 
				echo "<table class='table table-striped'>"; 
					echo "<tr>"; 
						echo "<th>Username</th>"; 
						echo "<th>Nama Guru</th>"; 
						echo "<th>Jenis Guru</th>"; 
					echo "</tr>"; 		
					foreach($qryMember->result() as $row){
						echo "<tr>";
						echo "<td>".$row->username."</td>";
						echo "<td>".$row->nama."</td>";
						echo "<td>".$row->jenis."</td>";
						echo "</tr>";
					}			
				echo "</table>";
			echo "</div>"; 
		echo "</div>"; 
	echo "</div>"; 
?>

</body>
</html>