<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
	<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
	<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
	<link href='<?php echo base_url('assets/css/mystyle.css'); ?>' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
	echo "<div class='container'>";
		echo "<div class='row'>";
			echo "<br><br>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
			echo "<div class='col-md-4'></div>"; 
			echo "<div class='col-md-4 login'>";
				echo "<center><h2>Sistem Tata Tertib</h2>";
				echo "<h3>SMA Santa Maria Surabaya</h3>";
				echo "<br>";
				echo "<p style='color:Tomato;'>".$error."</p>";
				echo "<br>";
				echo "</center>";
				echo form_open('Welcome/pageLogin');
					echo form_input('txtusername','',['class'=>'form-control', 'placeholder'=>'Masukkan Username']);
					echo "<br>";
					echo form_password('txtpassword','',['class'=>'form-control', 'placeholder'=>'Masukkan Password ']);
					echo "<br><br>";
					echo form_submit('btnLogin', 'Login', ['class'=>'btn btn-success']);
				echo form_close();
			echo "</div>";
		echo "</div>";
	echo "</div>";
?>
</body>
</html>