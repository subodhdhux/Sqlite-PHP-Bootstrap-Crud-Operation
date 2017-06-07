<?php 
namespace Myclasses\Form;

class Validation
{
	protected $rule;
	public $errors;

	function setRules($rules)
	{
		$this->rule = $rules;
	}

	function Check()
	{
		$fields = $this->rule;
		if(!empty($fields))
		{
			foreach($fields as $k => $v)
			{
				switch($v)
				{
					case 'required':
						if(empty($_POST[$k]) || $_POST[$k] == "" )
							$this->errors[$k] = "$k field is required";
					break;
					case 'numeric'	:
						if(!is_numeric($_POST[$k]))
							$this->errors[$k] = "$k field must be numeric";
					break;
					default:
						unset($this->errors[$k]);
        			
				}
			}
		}

		if(!empty($this->errors))
			return false;
		else
			return true;
	}
}