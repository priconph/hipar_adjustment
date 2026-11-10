<?php
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action)
			{
				//switch case, in using ajax an action must be set in order to choose the specific function to use
				case "get_employee_details" 			: get_employee_details(); break;								
				case "update_amount" 			 	    : update_amount(); break;		

				
			}
		}
	}

function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	function get_employee_details(){
		require_once('oop.php'); 
		$return 	= $_POST;
		$ctr 		= 0;
		$result 	= "";
		$HIPAR 		= new HIPAR;
		$result 	= $HIPAR->get_employee_details($return['pkid']);
		
		$return = array();
		while($row = mssql_fetch_array($result)) {
		
			$EmpName = $HIPAR->detect_ene($row['EmpName']);
			
			$return['pkid'][$ctr]				= $row['pkid'];
			$return['EmpNo'][$ctr]				= $row['EmpNo'];
			$return['EmpName'][$ctr]			= $EmpName;
			$return['Deduction'][$ctr] 			= $row['Deduction'];
			$ctr++;
		}
		$return['ctr'] = $ctr;
		echo json_encode($return);
	}

	function update_amount(){
		require_once('oop.php');
		$return 	= $_POST;
		$HIPAR 		= new HIPAR;
		$result 	= $HIPAR->update_amount($return['pkid'],
			
			$return['Deduction']);
					
		echo json_encode($result);
	}


?>