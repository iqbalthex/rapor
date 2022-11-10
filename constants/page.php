<?php
use PhpOffice\PhpWord\Shared\Converter;

function cm($cm){ return Converter::cmToTwip($cm); }

define('PAGE_H', 29.7);
define('PAGE_W', 21);
define('MARGIN_T', 1);
define('MARGIN_R', 1);
define('MARGIN_B', 1);
define('MARGIN_L', 1);

define('A4', [
	'pageSizeH' => cm(PAGE_H),
	'pageSizeW' => cm(PAGE_W),
]);


define('MARGIN', [
	'marginTop'		=> cm(MARGIN_T),
	'marginRight'	=> cm(MARGIN_R),
	'marginBottom'=> cm(MARGIN_B),
	'marginLeft'	=> cm(MARGIN_L),
]);

define('MAX_CONTENT_W', PAGE_W - (MARGIN_L + MARGIN_R));
