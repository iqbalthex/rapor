<?php
require_once 'vendor/autoload.php';
include_once 'constants/autoload.php';
require_once 'functions.php';
include_once 'database.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$phpWord = new PhpWord();

$section = $phpWord->addSection([ ...A4, ...MARGIN ]);

(function(){
	global $section, $student;

	$col = [
		MAX_CONTENT_W * 19.74 / 100,
		MAX_CONTENT_W * 39.44 / 100,
		MAX_CONTENT_W * 15.79 / 100,
		MAX_CONTENT_W * 25.01 / 100,
	];

	$class = [
		'satu','dua','tiga','empat','lima','enam'
	][$student['class']-1];
	$smt = $student['smt'] % 2 !== 0 ? 'satu' : 'dua';

	$idty_tbl = $section->addTable([
		'alignment' => 'center',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$cont = [
		['Nama Peserta Didik', ": {$student['name']}", 'Kelas', ": {$student['class']} ($class)"],
		['NISN', ": {$student['nisn']}", 'Fase', ": {$student['phase']}"],
		['Sekolah', ": {$student['school']['name']}", 'Semester', ": {$student['smt']} ($smt)"],
		['Alamat', ": {$student['school']['addr']}", 'Tahun Pelajaran', ": {$student['year']}"],
	];

	for($i=0;$i<4;$i++){
		$idty_tbl->addRow(cm(0.45));
		for($j=0;$j<4;$j++){
			add_cell($idty_tbl, $col[$j], $cont[$i][$j]);
		}
	}

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section, $student;

	$col = [
		MAX_CONTENT_W * 04.52 / 100,
		MAX_CONTENT_W * 23.02 / 100,
		MAX_CONTENT_W * 12.95 / 100,
		MAX_CONTENT_W * 59.50 / 100,
	];

	$subj_tbl = $section->addTable([
		'borderSize' => 6,
		'borderColor' => '000000',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$cont = ['No','Mata Pelajaran','Nilai Akhir','Capaian Kompetensi'];
	$subj_tbl->addRow(cm(0.45));
	for($i=0;$i<4;$i++){
		add_cell($subj_tbl, $col[$i], $cont[$i], ['font' => BOLD, 'para' => CENTER_P]);
	}

	$n = 0;
	foreach($student['main_subj'] as $subj){
		$subj_tbl->addRow(cm(1.8));
		add_cell($subj_tbl, $col[0], ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, $col[1], $subj['name'], ['cell' => VALIGN_CENTER]);
		add_cell($subj_tbl, $col[2], $subj['score'], ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, $col[3], "Ananda Baik dalam {$subj['kd'][0]}, Ananda Sangat Baik dalam {$subj['kd'][1]}", ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	}

	$subj_tbl->addRow(cm(0.45));
	add_cell($subj_tbl, MAX_CONTENT_W, 'Muatan Lokal', ['cell' => ['gridSpan' => 4] ]);

	foreach($student['xtra_subj'] as $subj){
		$subj_tbl->addRow(cm(1.8));
		add_cell($subj_tbl, $col[0], ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, $col[1], $subj['name'], ['cell' => VALIGN_CENTER]);
		add_cell($subj_tbl, $col[2], $subj['score'], ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($subj_tbl, $col[3], "Ananda Baik dalam {$subj['kd'][0]}, Ananda Sangat Baik dalam {$subj['kd'][0]}", ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	}

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section, $student;
	$xtra_tbl = $section->addTable([
		'borderSize' => 6,
		'borderColor' => '000000',
		'cellMarginLeft' => cm(0.15),
		'cellMarginRight' => cm(0.15),
	]);

	$xtra_tbl->addRow(cm(0.45));
	add_cell($xtra_tbl,  0.86, 'No', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	add_cell($xtra_tbl,  5.20, 'Ekstra', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
	add_cell($xtra_tbl, 12.93, 'Keterangan', ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);

	$n = 0;
	foreach($student['xtra'] as $x){
		$xtra_tbl->addRow(cm(0.45));
		add_cell($xtra_tbl,  0.86, ++$n, ['cell' => VALIGN_CENTER, 'para' => CENTER_P]);
		add_cell($xtra_tbl,  5.20, $x['name'], ['cell' => VALIGN_CENTER]);
		add_cell($xtra_tbl, 12.93, $x['detail'], ['cell' => VALIGN_CENTER]);
	}

	$section->addText('', STD_FONT, STD_PARAGRAPH);
})();

(function(){
	global $section, $student;
	[ 's' => $s, 'i' => $i, 'a' => $a ] = $student['pres'];
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
	add_cell($absn_tbl,  1.69, ": $s hari");
	add_cell($absn_tbl, 13.75, '', ['cell' => BORDER_NONE]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  3.50, 'Izin');
	add_cell($absn_tbl,  1.69, ": $i hari");
	add_cell($absn_tbl, 13.75, '', ['cell' => BORDER_NONE]);

	$absn_tbl->addRow(cm(0.45));
	add_cell($absn_tbl,  3.50, 'Tanpa Keterangan');
	add_cell($absn_tbl,  1.69, ": $a hari");
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
$objWriter->save('Rapor.doc');
$objWriter->save('Rapor.pdf');
