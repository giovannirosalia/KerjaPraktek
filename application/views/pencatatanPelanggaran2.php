<?php 
 include("header.php"); 
?>
<!DOCTYPE html>
<html>
<head>
 <title>Pencatatan Pelanggaran</title>
 <link href='<?php echo base_url('assets/css/bootstrap.css'); ?>' rel='stylesheet' type='text/css'>
 <link href='<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>' rel='stylesheet' type='text/css'>
 
 <script src='<?php echo base_url('assets/js/jquery.js'); ?>' language='javascript'></script>
 <script src='<?php echo base_url('assets/js/bootstrap.js'); ?>' language='javascript'></script>
 <script src='<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>' language='javascript'></script>
</head>
<body>
<?php
 $arrSiswa[0] = "";
 $arrSiswa[1] = "";
 $arrSiswa[2] = "";
 $arrSiswa[3] = "";
 $arrSiswa[4] = "";

 foreach($qryPeraturan->result() as $row){
  $arrPeraturan[0] = $row->namakategori;
  $arrPeraturan[1] = $row->nama;
  $arrPeraturan[2] = $row->poin;
  $arrPeraturan[3] = $row->sp;
  $arrPeraturan[4] = $row->keterangan;
  $arrPeraturan[5] = $row->kode;
 }
 
 echo form_open('Welcome/pencatatanPelanggaran');
 echo form_hidden('txtKodePeraturan', $arrPeraturan[5]);
 echo "<input type='hidden' name='txtNomorInduk' id='txtNomorInduk' value=''>";
 echo "<div class='container'>";
  echo "<h1>Pencatatan Pelanggaran</h1>";
  
  echo "<br><br>";
  
  echo "<div class='row'>";
   echo "<div class='col-md-6'>";
    echo "<div class='panel panel-primary'>";
     echo "<div class='panel-body'>";
      echo "<table class='table table-striped'>"; 
       echo "<tr>"; 
        echo "<th>Kategori Peraturan</th>";
        echo "<td>".$arrPeraturan[0]."</td>";
       echo "</tr>";   
       echo "<tr>"; 
        echo "<th>Nama Peraturan</th>";
        echo "<td>".$arrPeraturan[1]."</td>";
       echo "</tr>";
       echo "<tr>"; 
        echo "<th>Poin Pelanggaran</th>";
        echo "<td>".$arrPeraturan[2]."</td>";
       echo "</tr>";
       echo "<tr>"; 
        echo "<th>Poin SP</th>";
        echo "<td>".$arrPeraturan[3]."</td>";
       echo "</tr>";
       echo "<tr>"; 
        echo "<th>Keterangan</th>";
        echo "<td>".$arrPeraturan[4]."</td>";
       echo "</tr>";
      echo "</table>";
     echo "</div>";
    echo "</div>";
   echo "</div>";
   echo "<div class='col-md-6'>";
    echo "<div class='panel panel-primary'>";
     echo "<div class='panel-body'>";
      echo "<table class='table table-striped'>"; 
       echo "<tr>"; 
        echo "<th>Nama Siswa</th>";
        echo "<td id='namasiswa'>".$arrSiswa[0]."</td>";
       echo "</tr>";   
       echo "<tr>"; 
        echo "<th>Kelas</th>";
        echo "<td id='kelas'>".$arrSiswa[1]."</td>";
       echo "</tr>";
       echo "<tr>"; 
        echo "<th>Absen</th>";
        echo "<td id='absen'>".$arrSiswa[2]."</td>";
       echo "</tr>";
       echo "<tr>"; 
        echo "<th>Nomor Induk</th>";
        echo "<td id='nomorinduk'>".$arrSiswa[3]."</td>";
       echo "</tr>";
      echo "</table>";
     
      echo " <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>
         Cari Siswa
        </button>";
     echo "</div>";
    echo "</div>";
   echo "</div>";
  echo "</div>";
  
  echo "<br>";
  
  echo "<div class='row'>";
   echo "<div class='col-md-6'>";
     echo form_submit('simpanPelanggaran', 'Simpan Pelanggaran', ['class'=>'btn btn-success']);    
   echo "</div>";
  echo "</div>";
 echo "</div>"; 
 echo form_close();    
?>
</body>
</html>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1000px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Cari Siswa</h2>
      </div>
      <div class="modal-body">
        <?php
   echo "<table class='table table-striped' id='mytable'>"; 
    echo "<thead>"; 
    echo "<tr>"; 
     echo "<th>Nomor Induk</th>"; 
     echo "<th>Nama</th>"; 
     echo "<th>Kelas</th>"; 
     echo "<th>Absen</th>"; 
     echo "<th>Poin</th>"; 
     echo "<th>SP</th>"; 
     echo "<th>Action</th>"; 
    echo "</tr>";   
    echo "</thead>"; 
    echo "<tbody>"; 
    foreach($qrySiswa->result() as $row){
     echo "<tr>";
      echo "<td>".$row->nomor_induk."</td>";
      echo "<td>".$row->nama."</td>";
      echo "<td>".$row->kelas."</td>";
      echo "<td>".$row->absen."</td>";
      echo "<td>".$row->poin."</td>";
      echo "<td>".$row->sp."</td>";
      echo "<td>";
      echo " <button type='submit' class='btn btn-primary btn-lg' onclick=pilihsiswa('".$row->nomor_induk."')>
         Pilih
        </button>";
      echo "</td>";
     echo "</tr>";
    }   
    echo "</tbody>"; 
   echo "</table>";
  ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script language="javascript">
$(document).ready(function() {
 $("#mytable").DataTable(
  { paging: true }
 );
}); 

function pilihsiswa(nomor) {
 var url = '<?php echo site_url(); ?>';
 alert(url); 
 $.post(url + "/Welcome/pilihsiswa", 
  { nomor: nomor },
  function(result) {
   $("#myModal").modal("toggle");
   alert(result); 
   var arrSiswa = result.split("-"); 
   $("#namasiswa").html(arrSiswa[1]); 
   $("#kelas").html(arrSiswa[2]); 
   $("#absen").html(arrSiswa[3]); 
   $("#nomorinduk").html(arrSiswa[0]); 
   $("#txtNomorInduk").val(arrSiswa[0]); 
  }
 );
}
</script>