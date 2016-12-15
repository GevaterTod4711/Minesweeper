<?php

class Template {
    
    var $a = array();
    
    public function assign($key, $value) {
	$this->a[$key] = $value;
    }
    
    public function display($file) {
	$f = fopen($file, 'r');
	$input = fread($f, filesize($file));
	foreach ($this->a as $key => $val) {
	    $input = str_replace($key, $val, $input);
	}
	echo $input;
    }
}

?>
