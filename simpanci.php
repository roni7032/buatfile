<html>
	<head>
		<title>Form Input</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link type="text/css" href="assets/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<?php
			if($_POST){
				$dtfilling=explode('|',$_POST['filling']);

				$myfile=fopen('hasil/simpanci.txt','w')or die("tidak bisa dibuka");
				$txt="";
				for($i=0;$i<count($dtfilling);$i++){
					$txt .= "
'".$dtfilling[$i]."' => $"."this->input->post('".$dtfilling[$i]."'),
";
				}

				fwrite($myfile, "array(".$txt.");");
				fclose($myfile);
			}
		?>
		<div class="container">
			<h1>Bikin array simpan CI</h1>
			<hr/>
			<form method="post" action="">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label for="filling">Filling</label><input id="filling" class="form-control" name="filling" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<input class="form-control btn btn-warning" type="submit" value="Simpan" name="simpan" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>