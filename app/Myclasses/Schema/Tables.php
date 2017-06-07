<?php 
namespace Myclasses\Schema;

use Myclasses\Connect\Connect;

class Tables extends Connect
{
	function __construct()
	{ 
		parent::__construct();
	}

	function Createtable()
	{
		 $this->db->exec("CREATE TABLE `tasks` (
													`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
													`name`	VARCHAR(128),
													`description`	TEXT,
													`start_date`	VARCHAR(128),
													`end_date`	VARCHAR(128),
													`status`	VARCHAR(128),
													`created_date`	VARCHAR(128),
													`updated_date`	VARCHAR(128)
												)");
	}

	function Droptable()
	{
		$this->db->exec('DROP TABLE IF EXISTS `tasks`');
	}
}