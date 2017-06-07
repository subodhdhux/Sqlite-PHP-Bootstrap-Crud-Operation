<?php 
namespace Myclasses\Connect;

class Connect
{
	protected $db;
	private $db_name;

    protected function __construct()
    {
         //$this->db_name = 'c:\sqlite\db\project.db';
         $this->db_name = 'project.db';
        
        if ($this->db === null) 
        {
        	if (realpath($this->db_name)) {
        		$this->db = new \SQLite3($this->db_name);
        		
			}
			else
			{
				$db = fopen($this->db_name, "w");
				$this->db = new \SQLite3($this->db_name);
				fclose($db);
			}
        }
    }

    protected function __clone()
    {
        
    }
}
 
