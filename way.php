<html>
<head>
	<title>Cara buat file PHP</title>
</head>
<body>
	<h1>Cara buat file PHP</h1>
	<hr/>
	
	<?php
		$myfile=fopen('test.txt', 'w') or die('file tidak bisa dibuka!');
		$txt="Bahroni\n";
		fwrite($myfile, $txt);
		$txt="Paling hebat\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	?>
</body>
</html>