<?php 
/**
 * 
 */
class Database 
{
	const HOST = 'localhost:3306';
	const DB = 'webltm';
	const PASSWORD = 'tao@@@2021';
	const USENAME = 'root';

	public function connect(){
		$connect = mysqli_connect(self::HOST,self::USENAME,self::PASSWORD,self::DB);
		mysqli_set_charset($connect,'utf8');
		if (mysqli_connect_errno() === 0) {
			return $connect;
		}
		return false;
	}
}

 ?>