<?php

/*$q = "SELECT
	student.name, student.nick, student.nisn, student.class,
	student.phase, student.year, student.smt,
	student.main_subj, student.xtra_subj, student.xtra,
	student.pres, school.name, school.addr
		FROM student INNER JOIN school ON (student.school_id = school.id)
			WHERE student.id = $id
";*/

$student = [
	'name' => 'Iqbal Arie Maulana',
	'nick' => 'Iqbal',
	'nisn' => '100345',
	'class' => 5,
	'phase' => 'B',
	'year' => '2021/2022',
	'smt' => 1,
	'main_subj' => [
		[
			'name' => 'Pendidikan Agama Islam',
			'score' => 80,
			'kd' => ['kd satu','kd dua'],
		],
		[
			'name' => 'Pendidikan Pancasila',
			'score' => 80,
			'kd' => ['kd tiga','kd empat'],
		],
		[
			'name' => 'Bahasa Indonesia',
			'score' => 80,
			'kd' => ['kd lima','kd enam'],
		],
		[
			'name' => 'Matematika',
			'score' => 80,
			'kd' => ['kd tujuh','kd delapan'],
		],
		[
			'name' => 'Ilmu Pengetahuan Alam dan Sosial',
			'score' => 80,
			'kd' => ['kd sembilan','kd sepuluh'],
		],
		[
			'name' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
			'score' => 82,
			'kd' => ['kd sebelas','kd duabelas'],
		],
	],
	'xtra_subj' => [
		[
			'name' => 'Bahasa Daerah',
			'score' => 82,
			'kd' => ['kd tiga belas','kd empat belas'],
		],
		[
			'name' => 'Baca Tulis Al-Qur\'an',
			'score' => 82,
			'kd' => ['kd lima belas','kd enam belas'],
		]
	],
	'xtra' => [
		[ 'name' => 'Pramuka', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
	],
	'pres' => [
		's' => 0, 'i' => 0, 'a' => 1,
	],
	'school' => [
		'name' => 'SDN BEJI IV',
		'addr' => 'Rodowo, Desa Beji, Kab. Pasuruan',
	],
];
