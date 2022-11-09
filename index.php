<?php
require_once 'vendor/autoload.php';
include_once 'constants/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$phpWord = new PhpWord();

$section = $phpWord->addSection([ ...A4, ...MARGIN ]);

$idty_tbl = $section->addTable(['alignment' => PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
	'cellMarginLeft' => cm(0.15), 'cellMarginRight' => cm(0.15),
]);

(function(){
	global $idty_tbl;
	$idty_tbl->addRow(cm(0.45));
	$idty_tbl->addCell(cm(3.75))->addText('Nama Peserta Didik', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(7.49))->addText(': $name', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(3))		->addText('Kelas', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(4.75))->addText(': $class_', STD_FONT, STD_PARAGRAPH);

	$idty_tbl->addRow(cm(0.45));
	$idty_tbl->addCell(cm(3.75))->addText('NISN', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(7.49))->addText(': $nisn', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(3))		->addText('Fase', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(4.75))->addText(': $phase', STD_FONT, STD_PARAGRAPH);

	$idty_tbl->addRow(cm(0.45));
	$idty_tbl->addCell(cm(3.75))->addText('Sekolah', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(7.49))->addText(': $school', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(3))		->addText('Semester', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(4.75))->addText(': $smt', STD_FONT, STD_PARAGRAPH);

	$idty_tbl->addRow(cm(0.45));
	$idty_tbl->addCell(cm(3.75))->addText('Alamat', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(7.49))->addText(': $addr', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(3))		->addText('Tahun Pelajaran', STD_FONT, STD_PARAGRAPH);
	$idty_tbl->addCell(cm(4.75))->addText(': $year', STD_FONT, STD_PARAGRAPH);
})();
$section->addText('', STD_FONT, STD_PARAGRAPH);

$tbl_style = [
	'borderSize' => 6, 'borderColor' => '000000',
	'cellMarginLeft' => cm(0.15),
	'cellMarginRight' => cm(0.15),
];
$subj_tbl = $section->addTable($tbl_style);

(function(){
	global $subj_tbl;

	$main_subj = [
		[
			'name' => 'Pendidikan Agama Islam',
			'score' => rand(70,100)
		],
		[
			'name' => 'Pendidikan Pancasila',
			'score' => rand(70,100)
		],
		[
			'name' => 'Bahasa Indonesia',
			'score' => rand(70,100)
		],
		[
			'name' => 'Matematika',
			'score' => rand(70,100)
		],
		[
			'name' => 'Ilmu Pengetahuan Alam dan Sosial',
			'score' => rand(70,100)
		],
		[
			'name' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
			'score' => rand(70,100)
		]
	];

	$xtra_subj = [
		[
			'name' => 'Bahasa Daerah',
			'score' => rand(70,100)
		],
		[
			'name' => 'Baca Tulis Al-Qur\'an',
			'score' => rand(70,100)
		]
	];

	$subj_tbl->addRow(cm(0.45));
	$subj_tbl->addCell(cm(0.86))->addText('No', [...STD_FONT, ...BOLD], CENTER_P);
	$subj_tbl->addCell(cm(4.38))->addText('Mata Pelajaran', [...STD_FONT, ...BOLD], CENTER_P);
	$subj_tbl->addCell(cm(2.46))->addText('Nilai Akhir', [...STD_FONT, ...BOLD], CENTER_P);
	$subj_tbl->addCell(cm(11.3))->addText('Capaian Kompetensi', [...STD_FONT, ...BOLD], CENTER_P);

	$n = 0;
	foreach($main_subj as $subj){
		$subj_tbl->addRow(cm(1.8));
		$subj_tbl->addCell(cm(0.86), VALIGN_CENTER)->addText(++$n, STD_FONT, CENTER_P);
		$subj_tbl->addCell(cm(4.38), VALIGN_CENTER)->addText($subj['name'], STD_FONT, STD_PARAGRAPH);
		$subj_tbl->addCell(cm(2.46), VALIGN_CENTER)->addText($subj['score'], STD_FONT, CENTER_P);
		$subj_tbl->addCell(cm(11.3), VALIGN_CENTER)->addText('Ananda Baik dalam $kd[0], Ananda Sangat Baik dalam $kd[1]', STD_FONT, CENTER_P);
	}

	$subj_tbl->addRow(cm(0.45));
	$subj_tbl->addCell(cm(18.99), ['gridSpan' => 4])->addText('Muatan Lokal', STD_FONT, STD_PARAGRAPH);

	foreach($xtra_subj as $subj){
		$subj_tbl->addRow(cm(1.8));
		$subj_tbl->addCell(cm(0.86), VALIGN_CENTER)->addText(++$n, STD_FONT, CENTER_P);
		$subj_tbl->addCell(cm(4.38), VALIGN_CENTER)->addText($subj['name'], STD_FONT, STD_PARAGRAPH);
		$subj_tbl->addCell(cm(2.46), VALIGN_CENTER)->addText($subj['score'], STD_FONT, CENTER_P);
		$subj_tbl->addCell(cm(11.3), VALIGN_CENTER)->addText('Ananda Baik dalam $kd[0], Ananda Sangat Baik dalam $kd[1]', STD_FONT, CENTER_P);
	}
})();
$section->addTextBreak();


$xtra_tbl = $section->addTable($tbl_style);
(function(){
	global $xtra_tbl;
	$xtra = [
		[ 'name' => 'Pramuka', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
	];

	$xtra_tbl->addRow(cm(0.45));
	$xtra_tbl->addCell(cm(0.86),	VALIGN_CENTER)->addText('No', STD_FONT, CENTER_P);
	$xtra_tbl->addCell(cm(5.2),		VALIGN_CENTER)->addText('Ekstra', STD_FONT, CENTER_P);
	$xtra_tbl->addCell(cm(12.93),	VALIGN_CENTER)->addText('Keterangan', STD_FONT, CENTER_P);

	$n = 0;
	foreach($xtra as $x){
		$xtra_tbl->addRow(cm(0.45));
		$xtra_tbl->addCell(cm(0.86),	VALIGN_CENTER)->addText(++$n, STD_FONT, CENTER_P);
		$xtra_tbl->addCell(cm(5.2),		VALIGN_CENTER)->addText($x['name'], STD_FONT, STD_PARAGRAPH);
		$xtra_tbl->addCell(cm(12.93),	VALIGN_CENTER)->addText($x['detail'], STD_FONT, STD_PARAGRAPH);
	}
})();
$section->addTextBreak();

$absn_tbl = $section->addTable($tbl_style);
(function(){
	global $absn_tbl;

	$absn_tbl->addRow(cm(0.45));
	$absn_tbl->addCell(cm(5.19), ['gridSpan' => 2, ...VALIGN_CENTER])->addText('Ketidakhadiran', STD_FONT, CENTER_P);
	$absn_tbl->addCell(cm(13.75), BORDER_NONE)->addText('Pasuruan, 09 November 2022', STD_FONT, ['alignment' => 'end', ...STD_PARAGRAPH]);

	$absn_tbl->addRow(cm(0.45));
	$absn_tbl->addCell(cm(3.5))	->addText('Sakit', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(1.69))	->addText(': ... hari', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(13.75), BORDER_NONE)->addText('', STD_FONT, STD_PARAGRAPH);

	$absn_tbl->addRow(cm(0.45));
	$absn_tbl->addCell(cm(3.5))		->addText('Izin', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(1.69))	->addText(': ... hari', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(13.75), BORDER_NONE)->addText('', STD_FONT, STD_PARAGRAPH);

	$absn_tbl->addRow(cm(0.45));
	$absn_tbl->addCell(cm(3.5))		->addText('Tanpa Keterangan', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(1.69))	->addText(': ... hari', STD_FONT, STD_PARAGRAPH);
	$absn_tbl->addCell(cm(13.75), BORDER_NONE)->addText('', STD_FONT, STD_PARAGRAPH);
})();
$section->addTextBreak();

$sign_tbl = $section->addTable();
(function(){
	global $sign_tbl;
	$sign_tbl->addRow(cm(1.5));
	$sign_tbl->addCell(cm(6.33))->addText('Orang Tua Peserta Didik', STD_FONT, CENTER_P);
	$sign_tbl->addCell(cm(6.33))->addText('', STD_FONT, CENTER_P);
	$sign_tbl->addCell(cm(6.33))->addText('Wali Kelas', STD_FONT, CENTER_P);

	$sign_tbl->addRow(cm(1.5));
	$sign_tbl->addCell(cm(6.33))->addText('_______________', STD_FONT, CENTER_P);
	$sign_tbl->addCell(cm(6.33))->addText('Kepala Sekolah', STD_FONT, CENTER_P);
	$sign_tbl->addCell(cm(6.33))->addText('_______________', STD_FONT, CENTER_P);

	$sign_tbl->addRow(cm(0.45));
	$sign_tbl->addCell(cm(6.33))->addText('', STD_FONT, CENTER_P);
	$sign_tbl->addCell(cm(6.33))->addText('_______________', STD_FONT, CENTER_P);
})();


$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Rapor.docx');
