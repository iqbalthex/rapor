<a href="index.php">Back</a><br>

<?php
include_once 'connections.php';
include_once 'functions.php';

$main = json_encode([
	[
		'name' => 'Pendidikan Agama Islam',
		'score' => rand(75,100),
		'kd' => ['kd satu','kd dua'],
	],[
		'name' => 'Pendidikan Pancasila',
		'score' => rand(75,100),
		'kd' => ['kd tiga','kd empat'],
	],[
		'name' => 'Bahasa Indonesia',
		'score' => rand(75,100),
		'kd' => ['kd lima','kd enam'],
	],[
		'name' => 'Matematika',
		'score' => rand(75,100),
		'kd' => ['kd tujuh','kd delapan'],
	],[
		'name' => 'Ilmu Pengetahuan Alam dan Sosial',
		'score' => rand(75,100),
		'kd' => ['kd sembilan','kd sepuluh'],
	],[
		'name' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
		'score' => rand(75,100),
		'kd' => ['kd sebelas','kd duabelas'],
	]
]);

$local = json_encode([
	[
		'name' => 'Bahasa Daerah',
		'score' => rand(80,100),
		'kd' => ['kd tiga belas','kd empat belas'],
	],[
		'name' => 'Baca Tulis Al-Quran',
		'score' => rand(80,100),
		'kd' => ['kd lima belas','kd enam belas'],
	]
]);

$xtra = json_encode([
	[ 'name' => 'Pramuka', 'detail' => '' ],
	[ 'name' => '', 'detail' => '' ],
	[ 'name' => '', 'detail' => '' ],
]);

$pres = json_encode(['s' => 0, 'i' => 1, 'a' => 0]);


$res = query('INSERT INTO student VALUES(
	"",
	"Iqbal Arie Maulana",
	"Iqbal",
	"100345",
	5,
	"B",
	2022,
	1,
	\'' . $main . '\',
	\'' . $local . '\',
	\'' . $xtra . '\',
	\'' . $pres . '\',
	1
)');

$status = (mysqli_affected_rows($conn) > 0) ? 'success' : 'failed';
echo "Seeding $status...";
