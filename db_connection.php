<?php
class DB_con {
	protected function dbconnect(){
		$dbconnect = new mysqli("localhost", "root", "", "borroweye");
		if(mysqli_connect_errno()) {
			echo "Connection failed:".mysqli_connect_error();
			exit;
		} else {
			return $dbconnect;
		}
	}
}