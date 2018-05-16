<!--
perbaikan dari versi 1 menjadi v.1.1
dilengkapi dengan class-class bootstrap
-->
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
				
				$txthead="$"."tmp_table=array(
                        'table_open' => '<table width=\"100%\" class=\"table table-bordered\" id=\"tbl-anak\">',
                        'thead_open' => '<thead>',
                        'thead_close' => '</thead>',
                        'table_close' => '</table>'
                );";
				$txthead .= "$"."this->table->set_template("."$"."tmp_table);";
				
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
				
				$txt = $txthead;
				$txt .= "$"."this->table->set_heading(".$heading.");";
				$txt .="
					foreach ($"."data as $"."key => $"."value) {
						$"."link = anchor('anak/read/'.$"."value->id,'<i class=\"fa fa-eye\"></i>','class=\"btn btn-primary\"');
                        $"."link .= anchor('anak/edit/'.$"."value->id,' <i class=\"fa fa-pencil\"></i> ','class=\"btn btn-warning\"');
                        $"."link .= anchor('kamar/delete/'.$"."value->id,'<i class=\"fa fa-trash\">','class=\"btn btn-danger\" onclick=\"return confirm(\'Anda yakin..?\')\"');
						$"."this->table->add_row(".$filling.",'<div class=\"btn-group\">$"."link</div>');
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