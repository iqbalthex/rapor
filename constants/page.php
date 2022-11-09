<?php
use PhpOffice\PhpWord\Shared\Converter;

function cm($cm){
	return Converter::cmToTwip($cm);
}

# page size
define('A4', [
	'pageSizeH' => cm(29.7),
	'pageSizeW' => cm(21)
]);

# page margin
define('MARGIN', [
	'marginTop'		=> cm(1),
	'marginRight'	=> cm(1),
	'marginBottom'=> cm(1),
	'marginLeft'	=> cm(1),
]);
