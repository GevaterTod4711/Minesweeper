<?php

class Template {
    
    var $a = array();
    
    public function assign($key, $value) {
	global $a;
	$a[$key] = $value;
    }
    
    public function display($file) {
	global $a;
	$f = fopen($file, 'r');
	$input = fread($f, filesize($file));
	foreach ($a as $key => $val) {
	    $input = str_replace($key, $val, $input);
	}
	echo $input;
    }
}

?>