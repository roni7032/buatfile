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
				
				
				
				$myfile=fopen('hasil/detail.txt','w')or die("tidak bisa dibuka");
				$txt='<form class="form-horizontal">';
				for($i=0;$i<count($dtfilling);$i++){
					$txt .= '
<div class="form-group">
    <label class="control-label col-sm-2" for="'.$dtheading[$i].'">'.$dtheading[$i].'</label>
<div class="col-sm-10">
      <p class="form-control-static"><?php echo '.'$'.'dtread->'.$dtfilling[$i].'; ?></p>
	   </div>
  </div>
';
				}
				$txt .='</form>';
				
				fwrite($myfile, $txt);
				fclose($myfile);
			}
		?>
		<div class="container">
			<h1>Bikin File Detail Satu</h1>
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