<div class="col-md-12">
	<div class="col-md-12" style="margin-top:1.5%;">
		<div class="box" style="border-top:none;">
			<button class="btn btn-success btn-md pull-left grow" style="margin-right:1%;" data-toggle="modal"  data-target="#UpdateModal" ><i class="fa fa-plus" ></i> Create</button>
			<button class="btn btn-primary btn-md pull-left grow"><i class="fa fa-edit"></i> Update For Summary</button>	
		</div>
	</div><br><br>
	<div class="col-md-12" style="margin-top:1.5%;">
		<div class="box box-primary" style="background-color:#eff3f9;padding:3%;min-height:70%;">
			<table id="t_main" class="table table-bordered table-hover" style="border-color:#ccd4e2;border-radius:px;">
				<thead>
					<tr style="background-color:#4288f7;color:#fcfcfc;">	
						<th style="width:13%;text-align:center;">Charge to</th>
						<th style="width:13%;text-align:center;">Attention</th>
						<th style="width:13%;text-align:center;">CC</th>
						<th style="width:12%;text-align:center;">Date</th>
						<th style="width:12%;text-align:center;">Control No.</th>	
						<th style="width:13%;text-align:center;">Debit/Credit No.</th>
						<th style="text-align:center;">Nature of Charging</th>								
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<form id="frm_create_pmi" method="POST" action="">
		<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:50%;">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">Update Report</h4>
		      		</div>
				<div class="modal-body" style="overflow-y:scroll;height:70%;">
				<label id="lblPass" hidden></label>
				<label id="lblPass1" hidden></label>
				<label id="lblPass2" hidden></label>
				<label id="lblPass3" hidden></label>
				<form name="PPCform" method="post" action="">
	  			<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<center><label>PMI CHARGING REPORT</label></center>
							<div class="row">
								<div class="col-md-12">
									</br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>CHARGE TO</label>
								</div>
								<div class="col-md-1">
									<label>:</label>
								</div>
								<div class="col-md-4">
<!-- 									<select class="form-control" id="slctCTupdt">
										<option value="YEC SAKURA">YEC SAKURA</option>
										<option value="YEC OKAYAMA">YEC OKAYAMA</option>
										<option value="YEU">YEU</option>
										<option value="SIIX LOGISTICS  PHILIPPINES">SIIX LOGISTICS  PHILIPPINES</option>
									</select> -->
									<input list="list_charge_to" class="form-control" name="txt_charge_to" placeholder="Charge to" type="text">
									<datalist class="txt_operator" id="list_charge_to">
										<option value="YEC SAKURA">YEC SAKURA</option>
										<option value="YEC OKAYAMA">YEC OKAYAMA</option>
										<option value="YEU">YEU</option>
										<option value="SIIX LOGISTICS  PHILIPPINES">SIIX LOGISTICS  PHILIPPINES</option>
									</datalist>
								</div>
								<div class="col-md-1">
									<label>FROM</label>
								</div>
								<div class="col-md-1">
									<label>:</label>
								</div>
								<div class="col-md-2">
									<label id="lblPPCupdt">PPC</label>
								</div>
							</div>
							<div class="row">
									<div class="col-md-3">
										<label>ATTENTION</label>
									</div>
									<div class="col-md-1">
										<label>:</label>
									</div>
										<div class="col-md-8">
										 <input type="text" class="form-control" name="txt_attention" required onkeypress="return onKeyValidate(event,alphaPMIU);" />
									</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>DATE</label>
								</div>
								<div class="col-md-1">
									<label>:</label>
								</div>
									<div class="col-md-8">
									<input  name="txt_date" type="text" class="form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>CC</label>
								</div>
								<div class="col-md-1">
									<label>:</label>
								</div>
								<div class="col-md-8">
									<input type="text" class="form-control" name="txt_cc" required onkeypress="return onKeyValidate(event,alphaPMIUB);"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									</br>
								</div>
							</div>
							<div class="row">
									<div class="col-md-3">
										<label>Copy For</label>
									</div>
									<div class="col-md-1">
										<label>:</label>
									</div>
									<div class="col-md-8">
										<label id="lblCFupdt"></label>
									</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>Control No</label>
								</div>
								<div class="col-md-1">
									<label>:</label>
								</div>
								<div class="col-md-8">
									<input name="txt_control_no" type="text" class="form-control" readonly /><!--onkeypress="return onKeyValidate(event,alphaPMIUC);"-->
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<select class="form-control" name="txt_debit_credit">
										<option value="1">DEBIT NOTE No</option>
										<option value="0">CREDIT NOTE No</option>
									</select>
								</div>
								<div class="col-md-8">
									<input name="txt_debit_credit_no" type="text" class="form-control" onkeypress="return onKeyValidate(event,alphaPMIUC);" />
								</div>
							</div>
						</div>
					</div>
			  	</div>
			  	<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<div clas="row">
								<center><h5><strong>Nature of Charging:</strong></h5></center>
							</div>
							<div class="row">
							<input name="txt_nature" type="text" class="form-control" onkeypress="return onKeyValidate(event,alphaPMIUD);" />
							</div>
							<table id="tbl2" cellspace="5" style="width:100%;">
							</table>
							<div class="row">
								<div class="col-md-6" style="margin-top:0.5em">
									<a href="#" title="" id="link_add_row"><span class="fa fa-plus" aria-hidden="true"></span> Add Row</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<center><label>EQUIVALENT COST</label></center>
								</div>
								</div>
							<div class="row">
								<div class="col-md-6">
									<label>A. Manpower (Man hours)</label>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4">
									<input style="text-align: right" id="txtMnpwrupdt" type="text" class="form-control"  onkeypress="return onKeyValidate(event,numericPMIUB);" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>B. Machine Tools/Equipment</label>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4">
									<input style="text-align: right" id="txtMTEupdt" type="text" class="form-control"  onkeypress="return onKeyValidate(event,numericPMIUB);" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>C. Materials</label>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4">
									<input style="text-align: right" id="txtMtrlsupdt" type="text" class="form-control"  onkeypress="return onKeyValidate(event,numericPMIUB);" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>D. Other Chargers</label>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4">
									<input style="text-align: right" id="txtOthrsupdt" type="text" class="form-control"  onkeypress="return onKeyValidate(event,numericPMIUB);" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Total Charges</label>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4" style="text-align: right">
									<span class="lblAdds-addon" style="float:left">$</span>
									<label style="margin-right:0.9em" class="lblAdds" id="lblTtlupdt"></label>
								</div>
								<div class="col-md-1">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<center><label>Prepared by / Checked by:</label></center>
							</div>
							<div class="row">
								<div class="col-md-6">
									
								</div>
								<div class="col-md-6">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<center><label>Noted by / Approved by:</label></center>
							</div>
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" id="slctNoteByupdt">
										<option value="0">Choose Noter</option>
										
									</select>
								</div>
								<div class="col-md-6">
									<select class="form-control" id="slctApprvByupdt">
										<option value="0">Choose Approver</option>
								
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<strong>ATTACHMENT:</strong>
								</div>
								<div class="col-md-1">
									A
								</div>
								<div class="col-md-2">
									<input id="chckJupdt" type="checkbox"/> 
								</div>
								<div class="col-md-4">
									JUSTIFICATION
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-1">
									B
								</div>
								<div class="col-md-2">
									<input id="chckCupdt" type="checkbox"/> 
								</div>
								<div class="col-md-4">
									COMPUTATION
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label></label>
								</div>
								<div class="col-md-1">
									C
								</div>
								<div class="col-md-2">
									<input id="chckOupdt" type="checkbox"/> 
								</div>
								<div class="col-md-4">
									OTHERS
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> Close</button>
		        		<button id="btnPrint" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-print" aria-hidden="true" style="float:left">&nbsp;</span>Print</button>
		        		<button id="btnUpdate" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="float:left">&nbsp;</span>Update</button>
		      		</div>
		    	</div>
			</div>
		</div>
	</form>	
</div>
<script src="./js/pmicr.fn.js" language="javascript"></script>
