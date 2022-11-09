<?php
require_once 'vendor/autoload.php';
include_once 'constants/autoload.php';
require_once 'functions.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$phpWord = new PhpWord();

$section = $phpWord->addSection([ ...A4, ...MARGIN ]);

(function(){
	global $section;
	$idty_tbl = $section->addTable([
		'alignment' => 'center',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$idty_tbl->addRow(cm(0.45));
	add_cell($idty_tbl, 3.75, 'Nama Peserta Didik');
	add_cell($idty_tbl, 7.49, ': name');
	add_cell($idty_tbl, 3.00, 'Kelas');
	add_cell($idty_tbl, 4.75, ': $class_');

	$idty_tbl->addRow(cm(0.45));
	add_cell($idty_tbl, 3.75, 'NISN');
	add_cell($idty_tbl, 7.49, ': $nisn');
	add_cell($idty_tbl, 3.00, 'Fase');
	add_cell($idty_tbl, 4.75, ': $phase');

	$idty_tbl->addRow(cm(0.45));
	add_cell($idty_tbl, 3.75, 'Sekolah');
	add_cell($idty_tbl, 7.49, ': $school');
	add_cell($idty_tbl, 3.00, 'Semester');
	add_cell($idty_tbl, 4.75, ': $smt');

	$idty_tbl->addRow(cm(0.45));
	add_cell($idty_tbl, 3.75, 'Alamat');
	add_cell($idty_tbl, 7.49, ': $addr');
	add_cell($idty_tbl, 3.00, 'Tahun Pelajaran');
	add_cell($idty_tbl, 4.75, ': $year');

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section;
	$subj_tbl = $section->addTable([
		'borderSize' => 6,
		'borderColor' => '000000',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$subj_tbl->addRow(cm(0.45));
	add_cell($subj_tbl, 0.86, 'No', ['font' => BOLD, 'para' => CENTER_P]);
	add_cell($subj_tbl, 4.38, 'Mata Pelajaran', ['font' => BOLD, 'para' => CENTER_P]);
	add_cell($subj_tbl, 2.46, 'Nilai Akhir', ['font' => BOLD, 'para' => CENTER_P]);
	add_cell($subj_tbl, 11.3, 'Capaian Kompetensi', ['font' => BOLD, 'para' => CENTER_P]);

	$main_subj = [
		['name' => 'Pendidikan Agama Islam', 'score' => rand(70,100)],
		['name' => 'Pendidikan Pancasila', 'score' => rand(70,100)],
		['name' => 'Bahasa Indonesia', 'score' => rand(70,100)],
		['name' => 'Matematika', 'score' => rand(70,100)],
		['name' => 'Ilmu Pengetahuan Alam dan Sosial', 'score' => rand(70,100)],
		['name' => 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'score' => rand(70,100)]
	];

	$n = 0;
	foreach($main_subj as $subj){
		$subj_tbl->addRow(cm(1.8));
		add_cell($subj_tbl, 0.86, ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, 4.38, $subj['name'], ['cell' => VALIGN_CENTER]);
		add_cell($subj_tbl, 2.46, $subj['score'], ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, 11.3, 'Ananda Baik dalam $kd[0], Ananda Sangat Baik dalam $kd[1]', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	}

	$subj_tbl->addRow(cm(0.45));
	add_cell($subj_tbl, 18.99, 'Muatan Lokal', ['cell' => ['gridSpan' => 4] ]);

	$xtra_subj = [
		['name' => 'Bahasa Daerah', 'score' => rand(70,100)],
		['name' => 'Baca Tulis Al-Qur\'an', 'score' => rand(70,100)]
	];

	foreach($xtra_subj as $subj){
		$subj_tbl->addRow(cm(1.8));
		add_cell($subj_tbl, 0.86, ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, 4.38, $subj['name'], ['cell' => VALIGN_CENTER]);
		add_cell($subj_tbl, 2.46, $subj['score'], ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, 11.3, 'Ananda Baik dalam $kd[0], Ananda Sangat Baik dalam $kd[1]', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	}

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section;
	$xtra_tbl = $section->addTable([
		'borderSize' => 6,
		'borderColor' => '000000',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$xtra = [
		[ 'name' => 'Pramuka', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
		[ 'name' => '', 'detail' => '' ],
	];

	$xtra_tbl->addRow(cm(0.45));
	add_cell($xtra_tbl,  0.86, 'No', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	add_cell($xtra_tbl,  5.20, 'Ekstra', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	add_cell($xtra_tbl, 12.93, 'Keterangan', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);

	$n = 0;
	foreach($xtra as $x){
		$xtra_tbl->addRow(cm(0.45));
		add_cell($xtra_tbl,  0.86, ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($xtra_tbl,  5.20, $x['name'], ['cell' => VALIGN_CENTER]);
		add_cell($xtra_tbl, 12.93, $x['detail'], ['cell' => VALIGN_CENTER]);
	}

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section;
	$absn_tbl = $section->addTable([
		'borderSize' => 6,
		'borderColor' => '000000',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  5.19, 'Ketidakhadiran', ['cell' => [...VALIGN_CENTER, 'gridSpan' => 2], 'para' => CENTER_P]);
	add_cell($absn_tbl, 13.75, 'Pasuruan, 09 November 2022', [ 'cell' => BORDER_NONE, 'para' => ['alignment' => 'end'] ]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  3.50, 'Sakit');
	add_cell($absn_tbl,  1.69, ': ... hari');
	add_cell($absn_tbl, 13.75, '', ['cell' => BORDER_NONE]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  3.50, 'Izin');
	add_cell($absn_tbl,  1.69, ': ... hari');
	add_cell($absn_tbl, 13.75, '', ['cell' => BORDER_NONE]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  3.50, 'Tanpa Keterangan');
	add_cell($absn_tbl,  1.69, ': ... hari');
	add_cell($absn_tbl, 13.75, '', ['cell' => BORDER_NONE]);

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section;
	$sign_tbl = $section->addTable();

	$sign_tbl->addRow(cm(1.5));
	add_cell($sign_tbl, 6.33, 'Orang Tua Peserta Didik', ['para' => CENTER_P]);
	add_cell($sign_tbl, 6.33, '', ['para' => CENTER_P]);
	add_cell($sign_tbl, 6.33, 'Wali Kelas', ['para' => CENTER_P]);

	$sign_tbl->addRow(cm(1.5));
	add_cell($sign_tbl, 6.33, '_______________', ['para' => CENTER_P]);
	add_cell($sign_tbl, 6.33, 'Kepala Sekolah', ['para' => CENTER_P]);
	add_cell($sign_tbl, 6.33, '_______________', ['para' => CENTER_P]);

	$sign_tbl->addRow(cm(0.45));
	add_cell($sign_tbl, 6.33, '', ['para' => CENTER_P]);
	add_cell($sign_tbl, 6.33, '_______________', ['para' => CENTER_P]);
})();

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Rapor.docx');
