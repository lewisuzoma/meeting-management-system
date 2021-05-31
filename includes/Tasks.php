<?php
namespace app\includes;

/**
 * class Tasks
 *
 * @author BobLewis <boblewisu@gmail.com>
 * @package app\includes
 *
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use app\config\Connection;

class Tasks
{
	
	function __construct($pdo) {
    	$this->pdo = $pdo;
  	}

	public function allTasks($sql, $args=NULL){
		return $this->pdo->preparedStatement($sql, $args)->fetchAll();
	}

	public function addTask($post){
		$pdo = new Connection;
		$mail = new PHPMailer();
		if (!empty($post)) {
			extract($post);

		$qry = $this->pdo->preparedStatement("INSERT INTO `listtask`(`userId`, `createdBy`, `title`, `details`, `deadline`, `status`) VALUES ('$user','{$_SESSION["userId"]}','$title','$details','$deadline','active') ");
	
			if(!$qry) {
				return false;
			    
			} else {
				return true;
			    
			}
		}
	}

	public function updateTask($sql, $args = NULL) 
	{
		$this->pdo->preparedStatement($sql, $args);

	}

}//class