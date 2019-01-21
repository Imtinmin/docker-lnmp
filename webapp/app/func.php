<?php
//funct
function waf($a){
	$result = preg_match('/^ddos|pass|password|\.\.|input_ip|attack$/i',$a);
	#|file:|gopher||
	return $result;
	}

?>               