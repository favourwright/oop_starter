<?php
class Students extends DB_con {
	# sanitize the value that gets passed in
	public function sanitizeNum($input){
		if(spaceCheck($input)!=""){
			$input = (int)stripChars(addslashes($input));
			return $input;
		}
	}
	
	public function slim_select_sql($column, $table, $condition = 0, $condVal = 0){
		$condVal = $this->sanitizeNum($condVal);
		if($condition==0){
			$Sql = "SELECT ".$column." FROM ".$table;
			$Query = mysqli_query($this->dbconnect(), $Sql);
			if($Query){
				// the students exists
				if(mysqli_num_rows($Query)==1){
					return mysqli_fetch_object($Query);
				}
			} else {
				return NULL;
			}
		} else {
			$Sql = "SELECT ".$column." FROM ".$table." WHERE ".$condition."=".$condVal;
			$Query = mysqli_query($this->dbconnect(), $Sql);
			if($Query){
				// the students exists
				if(mysqli_num_rows($Query)==1){
					return mysqli_fetch_object($Query);
				}
			} else {
				return NULL;
			}
		}
	}
	
	#---------------------===== STUDENT SECTION OF GET.CHECK =====---------------------#
	
	# checks if a particular userId exists in the databases
	public function checkStudent($userId){
		$userId = $this->sanitizeNum($userId);
		$checkSql = "SELECT uId FROM user WHERE uId=".$userId;
		$checkQuery = mysqli_query($this->dbconnect(), $checkSql);
		if($checkQuery){
			// the students exists
			if(mysqli_num_rows($checkQuery)==1){
				return true;
			}
		} else {
			return NULL;
		}
		
	}
	# fetch complete details belonging to this user
	public function getStudent($userId){
		$userId = $this->sanitizeNum($userId);
		$fetchSql = "SELECT * FROM user WHERE uId=".$userId;
		$fetchQuery = mysqli_query($this->dbconnect(), $fetchSql);
		if($fetchQuery){
			// the students exists
			if(mysqli_num_rows($fetchQuery)==1){
				return mysqli_fetch_object($fetchQuery);
			}
		} else {
			return NULL;
		}
	}
	# fetch requisite details belonging to this user
	public function getStudentRequisite($userId){
		$userId = $this->sanitizeNum($userId);
		$fetchSql = "SELECT nickname, name, thumb, regNumber, department, level FROM user WHERE uId=".$userId;
		$fetchQuery = mysqli_query($this->dbconnect(), $fetchSql);
		if($fetchQuery){
			// the students exists
			if(mysqli_num_rows($fetchQuery)==1){
				return mysqli_fetch_object($fetchQuery);
			}
		} else {
			return NULL;
		}
	}
}