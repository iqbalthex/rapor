<?php

function add_cell($table, $cm=1, $text='', $opt=[]){
	$cell = isset($opt['cell']) ? $opt['cell'] : [];
	$font = isset($opt['font']) ? $opt['font'] : [];
	$para = isset($opt['para']) ? $opt['para'] : [];

	$table->addCell(cm($cm), [...$cell])->addText($text,
		[ ...$font, ...STD_FONT ],
		[ ...$para, ...STD_PARAGRAPH ]
	);
}
