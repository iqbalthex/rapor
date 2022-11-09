<?php

define('TITLE', [
	'name' => 'Times New Roman',
	'size' => 20,
	'color' => '000000'
]);

define('STD_FONT', [
	'name' => 'Times New Roman',
	'size' => '11',
]);

define('STD_PARAGRAPH', [
	'spaceBefore' => 0,
	'spaceAfter' => 0,
	'spacing' => 0,
]);

define('CENTER_P', ['alignment' => 'center', ...STD_PARAGRAPH]);

define('BOLD', ['bold' => true]);
define('VALIGN_CENTER', ['valign' => 'center']);

define('BORDER_NONE', [
	'borderTopStyle' => 'none',
	'borderBottomStyle' => 'none',
	'borderRightStyle' => 'none',
	'borderTopSize' => 6,
	'borderBottomSize' => 6,
	'borderRightSize' => 6,
]);
