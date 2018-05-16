<html>
	<head>
		<title>Form Input</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link type="text/css" href="assets/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<?php
			if($_POST){
				$data=explode(' ',$_POST['kolom']);
				
				$myfile=fopen('test.php','w')or die("tidak bisa dibuka");
				$txt="";
				for($i=0;$i<count($data);$i++){
					$txt .= "<input type='text' name='".$data[$i]."' />\n";
				}
				
				fwrite($myfile, $txt);
				fclose($myfile);
			}
		?>
		<div class="container">
			<h1>Bikin File Form Input</h1>
			<hr/>
			<form method="post" action="">
				<div class="form-group">
					<textarea class="form-control" name="kolom"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control btn btn-warning" type="submit" value="Simpan" name="simpan" />
				</div>
			</form>
		</div>
	</body>
</html>