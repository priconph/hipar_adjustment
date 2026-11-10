<?php
//THIS CLASS CONNECTS INTO YPICS SERVER OR MSSQL Server	
class HIPAR {
	//MALACHIXD CONNECTION INFO
	private $serverM = "192.168.3.253\MSSQLSERVER"; //MSSQL Server of ypics
	private $userM ="builder";  //username
	private $passM = ""; //password
	private $databaseM = "hrisdb"; //database
	// private $databaseM = "INTCHECK"; //database
	private $db_handleM =""; //handler 
	
	//FUNCTION TO CONNECT TO MALACHI SERVER	
    private function connect_DBM(){
        $this->db_handleM = mssql_connect($this->serverM,$this->userM,$this->passM);
            return mssql_select_db($this->databaseM,$this->db_handleM);
    }
   
    //FUNCTION TO CLOSE MALACHI SERVER
    private function close_DBM(){
        if(isset($this->db_handleM)){
            mssql_close($this->db_handleM);
        }
    }
	
	/////////////////////////////////PUBLIC FUNCTIONS///////////////////////////////////////////////	
	/////////////////// FUNCTION TO LOAD PO NUM FROM MALACHI DATABASE ////////////////////
	
	public function select_employee_info(){ // get hmo employee data
		$db_found = $this->connect_DBM();
		if($db_found){
			$SQL = "SELECT Employees.pkid, Employees.EmpNo, Employees.LastName, Employees.FirstName, Employees.MiddleName, Positions.[Position] AS Position, 
			Divisions.Division AS Division, Departments.Department AS Department, Sections.[Section] AS Section, HMOPrincipal.FkEmployee, 
			HMOPrincipal.Deduction
			FROM Employees Employees INNER JOIN
			Positions Positions ON Employees.fkPosition = Positions.pkid INNER JOIN
			Divisions Divisions ON Employees.fkDivision = Divisions.pkid INNER JOIN
			Departments Departments ON Employees.fkDepartment = Departments.pkid INNER JOIN
			Sections Sections ON Employees.fkSection = Sections.pkid INNER JOIN
			HMOPrincipal HMOPrincipal ON Employees.pkid = HMOPrincipal.FkEmployee
			WHERE (Employees.Status = '1' OR Employees.Status = '2') AND (Employees.HiringStatus = '2' OR
			Employees.HiringStatus = '3') AND (Employees.Salarytype = '1' OR
			Employees.Salarytype = '2' OR
			Employees.Salarytype = '4')
			ORDER BY Employees.EmpNo";
			// WHERE (Employees.Status = '1') AND (Employees.HiringStatus = '2' OR		
			$result = mssql_query($SQL);
			return $result;
			mssql_free_result($result);
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}
	
	public function get_employee_details($pkid){ // get hmo principal data
		$db_found = $this->connect_DBM();
		if($db_found){
								
				$SQL = "SELECT Emp.*, Emp.HiringStatus, Emp.LastName + ', ' + Emp.FirstName + ' (' + Emp.MiddleName + ')' AS EmpName, vwSumDependents.SumWithHMO AS SumWithHMO
				FROM vw_HMO_principal_view Emp LEFT OUTER JOIN vwSumDependents vwSumDependents ON Emp.pkid = vwSumDependents.fkEmployee
				WHERE (Emp.pkid = '$pkid') AND (Emp.HiringStatus = '2' OR Emp.HiringStatus = '3')";		

			$result = mssql_query($SQL);
			return $result;
			mssql_free_result($result);
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		} 
		$this->close_DBM();
	}
	
	public function update_amount($pkid, $Deduction){ 
		$db_found = $this->connect_DBM();
		if($db_found){
			
			// $SQL = "SELECT HMO.FkEmployee FROM Employees EMP LEFT OUTER JOIN
					// HMOPrincipal HMO ON EMP.pkid = HMO.FkEmployee WHERE EMP.pkid = '$pkid' ";
			
			// $result = mssql_query($SQL);
			// while($row = mssql_fetch_array($result)){
				// $hmo_fk = $row['FkEmployee'];
			// }
			
			// if (is_null($hmo_fk)) {
				// $SQL = "INSERT INTO HMOPrincipal (FkEmployee, ERShare, Amount, type_of_premium, Deduction) Values ('$pkid', '$ERShare', '$Amount', '$type_of_premium', '$Deduction')";
			// } else {
				$SQL = "UPDATE HMO SET HMO.Deduction = '$Deduction'
				 FROM HMOPrincipal AS HMO INNER JOIN Employees  AS EMP ON EMP.pkid = HMO.FkEmployee 
				 WHERE EMP.pkid = '$pkid' ";
			// } 
										
			$result = mssql_query($SQL);
			return "done update";
		}
		else {
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}
	
	// Detect enye
	public function detect_ene($str){
	if(strlen($str) != mb_strlen($str, 'utf-8')){ 
		$return = mb_convert_encoding( $str, 'UTF-8','ISO-8859-1' );
	}
	else {	
		$return		= $str; 
	}
	return $return;
}


	
} // End class


?>
