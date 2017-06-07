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

            echo "Again here";
        	if (realpath($this->db_name)) {
                echo "Again here1";
        		$this->db = new \SQLite3($this->db_name);
			}
			else
			{    echo "Again here11";
				//$db = fopen($this->db_name, "w");
				$this->db = new \SQLite3($this->db_name);
				//fclose($db);
			}

            $this->db = new \SQLite3($this->db_name);
        }

         die("I am here");
    }

    protected function __clone()
    {
        
    }
}
 
