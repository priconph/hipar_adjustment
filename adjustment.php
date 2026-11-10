<?php
    include("includes.php");
    require_once("oop.php");
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
?>
<html>

<head>

<meta charset="utf-8"/>

<style>
	
	#tbl_hipar tr:nth-child(odd) td {
	background-color: #f0f0f0
	} 

	#tbl_hipar tr:nth-child(even) td {
	background-color: #fff
	} 
	#tbl_hipar tr:hover td {
	background-color: #E3E4FA;
	} 

	#cont .rmFormLabel{
	width:25%;
	margin-left:7%;
	font-size: 13px;
	font-family: Consolas;
	}

	#cont .rmFormText{
	margin-bottom:5px;
	width:30%;
	font-size: 13px;
	}

	.button  {
	background-color: #2471A3; /* Green */
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	-webkit-transition-duration: 0.3s; /* Safari */
	transition-duration: 0.3s;
	cursor: pointer;
	}

	.btn_green {
	background-color: white;
	color: black;
	border: 2px solid #2471A3;
	border-radius: 8px;
	padding: 8px 20px;
	}

	.btn_green:hover {
	background-color: #2471A3;
	color: white;
	}

	.modal-header-success {
	color:#fff;
	padding:18px 15px;
	border-bottom:1px solid #eee;
	background-color: #5cb85c;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	}

	.navbar-custom {
	background-color:#2471A3;
	color:#ffffff;
	border-radius:0;
	}

	.navbar-custom .navbar-nav > li > a {
	color:#fff;
	padding-left:20px;
	padding-right:20px;
	}

	.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
	background-color: #33aa33;
	}

	.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus, .navbar-custom .navbar-nav .open>a  { 
	background-color: #33aa33;
	} 

	.navbar-custom .navbar-brand {
	color:#eeeeee;
	}
	
	.navbar-custom .navbar-toggle {
	background-color:#eeeeee;
	}
	
	.navbar-custom .icon-bar {
	background-color:#33aa33;
	}
		
</style>

</head>

<nav class="navbar navbar-custom navbar-static-top">
	<div class="navbar-header">
		<a class="navbar-brand" style="font-size:250%;">HIPAR ADJUSTMENT</a>
	</div>
</nav>

<body style="margin: 0px; padding: 0px; font-family: Consolas; background-color:white">

    <div id="wrapper" style="margin: 0px; padding: 0px;">
        <div class="container-fluid" id="page-wrapper" style="height: 100%; margin: 0px; padding: 0px;">
            <div id="page-wrapper">
                <div class="container-fluid">
			
				<h4 class="text-primary" style="margin-bottom: 5px;"><strong>ADDITIONAL INFORMATION:</strong><br></h4>
				<h5 style="font-size: 13px; margin-bottom: 5px;">Double click the specific row that you want to <strong>update HIPAR.</strong><br></h5>
				<h5 style="font-size: 13px; margin-bottom: 5px;">You can click each <strong>column header</strong> to sort the content accordingly.<br></h5>
				<h5 style="font-size: 13px; margin-bottom: 5px;">Content of the table will be filtered by typing 'keywords' on the <strong>search bar</strong>.<br></h5>
				<br>
	
				
				<table id="tbl_hipar" name="tbl_hipar" class="table table-bordered" data-card-view="true" width="100%" style="border: solid 1px gray; font-family:Consolas;">
					<thead>
						<tr style="font-size: 13px;">
							<th style="text-align: center; vertical-align: middle;" class="hide">pkid</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by EmpNo." data-original-title="">EmpNo.</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by Employee Name" data-original-title="">Employee Name</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by Division" data-original-title="">Division</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by Department" data-original-title="">Department</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by Section" data-original-title="">Section</th>
							<th style="text-align: center; vertical-align: middle;" data-toggle="tooltip" data-placement="bottom" title="Sort by HIPAR" data-original-title="">Ampunt</th>
					  </tr>
					</thead>
			 
					<tbody>
						<?php
						
						$HIPAR 		= new HIPAR;
						$result 	= $HIPAR->select_employee_info();
						while($row 	= mssql_fetch_array($result)){
						
							$LastName 	= $HIPAR->detect_ene($row['LastName']);
							$FirstName 	= $HIPAR->detect_ene($row['FirstName']);
							$MiddleName = $HIPAR->detect_ene($row['MiddleName']);
							
							echo "
								<tr>	
									<td style='display:none'>".$row['pkid']."</td>
									<td style='text-align: center; font-size: 12px;'>".$row['EmpNo']."</td>
									<td style='text-align: left; font-size: 12px;'>".$LastName.", ".$FirstName."(".$MiddleName.")</td>
									<td style='text-align: center; font-size: 12px;'>".$row['Division']."</td>
									<td style='text-align: center; font-size: 12px;'>".$row['Department']."</td>
									<td style='text-align: center; font-size: 12px;'>".$row['Section']."</td>
									<td style='text-align: center; font-size: 12px; color: blue;'><b>".$row['Deduction']."</b></td>
								</tr>
							";
						}
						
						?>
					</tbody>
				</table>
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade" id="update_hipar_info">
		<div class="modal-dialog" style="width:30%">
			<div class="modal-content">
				
				<div class="modal-body" align="left" id="cont">
					
					<form action="#" id="form_update" method="POST" data-confirm="Are you sure you want to Update this Amount?"> 
					<input type="hidden" id="txt_pkid" name="txt_pkid" value="<?php echo $pkid ?>" readonly>	
					<br>
					
					<label class="rmFormLabel">Employee #:</label>
					<input type="text" style="width:250px; height:5%;" class="rmFormText" id="UpdateEmpNo" name="UpdateEmpNo" value="<?php echo $EmpNo ?>" readonly>	
					<br>
					
					<label class="rmFormLabel">Employee Name:</label>
					<input type="text" style="width:250px; height:5%;" class="rmFormText" id="UpdateEmpName" name="UpdateEmpName" value="<?php echo $EmpName; ?>" readonly>

					<label class="rmFormLabel">Amount:</label>
					<input type="text" style="width:250px; height:5%; color: blue;" class="rmFormText" id="UpdateDeduction" name="UpdateDeduction" value="<?php echo $Deduction; ?>">	
					<br>
					
				</div>

					<center>
						<div class="modal-footer">
							<button class="button btn_green" type="submit" id="btn_submit"  name="btn_submit" style="width:100px;"> UPDATE </button>
							<button class="button btn_green" type="button" id="btn_cancel"  name="btn_cancel" style="width:100px;">CANCEL </button>
						</div>
					</center>
					<br>
					
					</form>		
			</div>
		</div>
	</div>


<script type="text/javascript">

	$("#tbl_hipar").dataTable({"order": [],
		"columnDefs": [{
		  "targets"  : 'no-sort',
		  "orderable": false,
		}]});

	$("#tbl_hipar tbody").on('dblclick', 'tr', function(){
		$("#modal-body input").val("");		
		get_employee_details($(this).find("td:eq(0)").text());
	});
		
	function get_employee_details(pkid) {	
		var data = {
			"action"			 : "get_employee_details",
			"pkid"				 : pkid
		}
		data = $.param(data);
		$.ajax({
			type		: "POST",
			dataType	: "json",
			data		: data,
			url			: "handler.php",
			success		: function (result) {
				
				$('#UpdateEmpNo').val(result['EmpNo']);
				$('#UpdateEmpName').val(result['EmpName']);
				$('#UpdateDeduction').val(result['Deduction']);			
				$('#txt_pkid').val(pkid);
				
				$("#update_hipar_info").modal();
				
			}, error	: function (result) {
				alert('ERROR: '+result);
			
			}
		});
	}

	$('#btn_cancel').click(function(){               
		window.location.href = "adjustment.php";
	});
	
	$('#form_update').submit(function(e){

		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}
		
		var data = {
			"action"				: "update_amount",
			"pkid"					: $('#txt_pkid').val(),
			"Deduction"				: $('#UpdateDeduction').val()
		}
		
		data = $.param(data);
		$.ajax({
		type			: "post",
		dataType		: "json",
		data			: data,
		url				: "handler.php",
		success			: function(data){	

			alert('Successfully Updated!');
			window.location.reload();

			},error(data){
				alert('error');
			}
		});
	});
	
	
</script>

</body>
</html>