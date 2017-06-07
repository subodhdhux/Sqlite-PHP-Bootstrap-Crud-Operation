<?php

function debug($array, $die = 0)
{
	if(is_array($array))
	{
		echo "<pre>";
		print_r($array);
	}
	else
		echo $array;

	if($die == 1)
		die();
}