<html>
	<head>
		<title>Form Input</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link type="text/css" href="assets/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<?php
			if($_POST){
				$dtheading=explode('|',$_POST['heading']);
				$dtfilling=explode('|',$_POST['filling']);
				
				$myfile=fopen('hasil/tabelci.txt','w')or die("tidak bisa dibuka");
				$txt1="";
				$txt2="";
				foreach($dtheading as $value){
					$txt1 .= "'".$value."',";
				}
				foreach($dtfilling as $value){
					$txt2 .= "$"."value->".$value.",";
				}
				$heading=substr($txt1, 0, -1);
				$filling=substr($txt2, 0, -1);
				$txt="$"."this->table->set_heading(".$heading.");";
				$txt .="
					foreach ($"."data as $"."key => $"."value) {
						$"."this->table->add_row(".$filling.");
					}
				";
				
				$txt .= "echo $"."this->table->generate();";
				
				fwrite($myfile, $txt);
				fclose($myfile);
			}
		?>
		<div class="container">
			<h1>Buat File Tabel CI</h1>
			<hr/>
			<form method="post" action="">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label for="heading">Heading</label><input id="heading" class="form-control" name="heading" />
						</div>
					</div>
				</div>
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