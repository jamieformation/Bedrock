<?php # Print Preformated
# Updated 05/04/2017 17:08
/*
function print_pre($expression,$return=false){
	$history=debug_backtrace(false);
	$history=$history[0];
	$out='<div class="print_pre">
		Debug<br><small><em>'.$history['file'].': '.$history['line'].'</em></small>
		<pre>'.htmlspecialchars(print_r($expression,true)).'</pre>
	</div>';
	if($return){
		return $out;
	}else{
		echo $out;
	}
}
*/
