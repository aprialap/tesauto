<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Auto Complete CIWER.ID</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<div class="jumbotron col-md-4">
<div class="panel panel-primary ">
      <div class="panel-heading">
        <h3 class="panel-title">CIWER.ID</h3>
      </div>
      <div class="panel-body">
<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="db_kelas";
	$conect=mysql_connect($host,$user,$pass);
	$dbconfig =mysql_select_db($db,$conect);

	$query=mysql_query("select * from tb_siswa order by id_siswa asc");
    $result = mysql_query("select * from tb_siswa");
    $jsArray = "var prdName = new Array();\n";
	echo"


			<tr>
				<td>Select Id</td>
				<td>:</td>
				<td>
				<select class='form-control' onchange='changeValue(this.value)'>
				<option>-------</option>";
				while ($row = mysql_fetch_array($result)) {
				echo '<option name="id_siswa"  value="' . $row['id_siswa'] . '">' . $row['id_siswa'] . '</option>';
				$jsArray .= "prdName['" . $row['id_siswa'] . "'] = {miez:'" . addslashes($row['nama_siswa'])."'};\n";
				}
				echo"
				</select>
			</tr>


			<tr>
				<td>Nama Siswa</td>
				<td>:</td>
				<td><input name='nm' id='nama_siswa' disabled='' class='form-control'></td>
			</tr>

				";
?>

 </div>
    </div>
	</div>
</div>

<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('nama_siswa').value = prdName[id].miez;

};
</script>

</body>
</html>
