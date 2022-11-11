<?php
include_once 'connections.php';

$res = mysqli_query($conn,'SELECT id, nickname FROM student');
$std = [];
while($row = mysqli_fetch_object($res)){
	$std[] = $row;
}

if( isset($_POST['id']) ){
	include_once 'generate-word.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>

<a href="seeder.php">Seed</a>
<br><br>

<h2>Buat Rapor Siswa</h2>
<form action="" method="post">
	<ul>
		<?php foreach($std as $s): ?>
			<li>
				<button type="submit" name="id"
					value="<?= $s->id ?>"><?= "$s->id $s->nickname" ?>
				</button>
			</li>
		<?php endforeach ?>
	</ul>
</form>

</body>
</html>
