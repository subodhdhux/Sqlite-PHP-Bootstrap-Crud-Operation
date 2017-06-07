<?php

function set_value($name, $value = "")
{
	if(!empty($name) && isset($_POST[$name]))
	{
		return $_POST[$name];
	}
	else
	{
		if(isset($value))
			return $value;
		else
			return "";
	}
}

function set_radio($name, $option = "", $value = "", $default = false)
{
	if(!empty($name) && isset($_POST[$name]))
	{
		if($_POST[$name] ==  $option)
			return "checked='checked'";
	}
	else
	{
		if(isset($value) && !empty($value))
		{
			if($value ==  $option)
				return "checked='checked'";
		}
		else
		{
			if($default)
				return "checked='checked'";
		}
		
	}
}