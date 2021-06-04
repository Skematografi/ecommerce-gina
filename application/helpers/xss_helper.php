<?php
	function check($str){
		echo strip_tags($str);
	} 
	
	function inspect($str){
		echo htmlentities($str,ENT_QUOTES,'UTF-8');
	}
 ?>