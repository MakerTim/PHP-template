<?php
	header('Content-Type: text/css');
	header('Content-Encoding: gzip');
	require(join(DIRECTORY_SEPARATOR, array('..', 'Classes', 'IncludeManager.php')));
	$find = array(
		'$Lijntje;', '$LijntjeDikte;', '$Menu_Text;', '$Menu_Background;', '$Menu_Outline;',
		'$Menu_Highlight;', '$Sub_Text;', '$Sub_Item;', '$Sub_Item_Highlight;', '$Sub_Item_Hover;',
		'$Sub_Item_Sub;', '$Sub_Item_Sub_Hover;', '$Sub_Item_Border;', '$Markdown_Background;', '$Markdown_Text;',
		'$Markdown_Link;', '$Markdown_Balk;', '$Markdown_HeaderLine;', '$Markdown_Highlight;', '$Markdown_TableBorder;',
		'$Markdown_TableBackground;', '$Markdown_TableBackground2;', '$Footer_Text;', '$Footer_Link;', '$Footer_Background;',
		'$Media_Background;', '$Cookie_Text;', '$Cookie_Background;', '$Cookie_Button'
	);
	$repl = array(
		MktColor::$Lijntje, MktColor::$LijntjeDikte, MktColor::$Menu_Text, MktColor::$Menu_Background, MktColor::$Menu_Outline,
		MktColor::$Menu_Highlight, MktColor::$Sub_Text, MktColor::$Sub_Item, MktColor::$Sub_Item_Highlight, MktColor::$Sub_Item_Hover,
		MktColor::$Sub_Item_Sub, MktColor::$Sub_Item_Sub_Hover, MktColor::$Sub_Item_Border, MktColor::$Markdown_Background, MktColor::$Markdown_Text,
		MktColor::$Markdown_Link, MktColor::$Markdown_Balk, MktColor::$Markdown_HeaderLine, MktColor::$Markdown_Highlight, MktColor::$Markdown_TableBorder,
		MktColor::$Markdown_TableBackground, MktColor::$Markdown_TableBackground2, MktColor::$Footer_Text, MktColor::$Footer_Link, MktColor::$Footer_Background,
		MktColor::$Media_Background, MktColor::$Cookie_Text, MktColor::$Cookie_Background, MktColor::$Cookie_Button
	);
	$site = "";
	foreach(scandir('.') as $file) {
		if($file[0] != '.' && !is_dir($file) && $file[0] != '-') {
			$input = str_replace($find, $repl, file_get_contents($file));
			$site .= str_replace(array('	', '\n', '\r', PHP_EOL), '', $input) . PHP_EOL;
		}
	}
	echo gzencode($site);
?>