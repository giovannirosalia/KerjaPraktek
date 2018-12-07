<link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
<script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
<script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistem Tata Tertib</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php
		if($this->session->userdata('jenis_aktif')) {
			if($this->session->userdata('jenis_aktif') == "WAKASEK") {
				echo "<li><a href='".site_url('Welcome/dashboard/1')."'>Master Kategori</a></li>";
				echo "<li><a href='".site_url('Welcome/dashboard/2')."'>Master Peraturan</a></li>";
				//echo "<li><a href='".site_url('Welcome/dashboard/3')."'>Master Siswa</a></li>";
				echo "<li><a href='".site_url('Welcome/dashboard/4')."'>Master Member</a></li>";
				echo "<li><a href='".site_url('Welcome/dashboard/5')."'>Pencatatan Pelanggaran</a></li>";
			}
			else {
				echo "<li><a href='".site_url('Welcome/dashboard/5')."'>Pencatatan Pelanggaran</a></li>";
			}
		}
		else {
			echo "<li><a href='".site_url('Welcome/index')."'>Home</a></li>";
			echo "<li><a href='".site_url('Welcome/contact')."'>Contact</a></li>";
		}
		?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php
		if($this->session->userdata('loginuser')) {
			echo "<li><a href='#'><span class='glyphicon glyphicon-log-person'></span> Welcome, ".$this->session->userdata('loginuser')."</a></li>";
			echo "<li><a href='".site_url('Welcome/logout')."'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		}
		else {
      echo "<li><a href='".site_url('Welcome/register')."'> Register</a></li>";
			echo "<li><a href='#' data-toggle='modal' data-target='#modalLogin'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
		}
		?>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<?php echo form_open("Welcome/login"); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login Member</h4>
      </div>
      <div class="modal-body">
		<div class='row'>
			<div class='col-md-12'>
				<div class="form-group">
					<label class='labeltitle'>Username :</label>
					<?php echo form_input('txtUsername', '', ['class'=>'form-control', 'id'=>'txtUsername']); ?>
				</div>
				<div class="form-group">
					<label class='labeltitle'>Password :</label>
					<?php echo form_password('txtPassword', '', ['class'=>'form-control', 'id'=>'txtPassword']); ?>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btnLoginMember">Login Member</button>
      </div>
    </div>
	<?php echo form_close(); ?>
  </div>
</div>
