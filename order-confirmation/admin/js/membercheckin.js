 

	
jQuery(document).ready(function(){
	
	setInterval(function(){
		jQuery.ajax({
			url : 'index.php?option=com_membercheckin&task=getAttendeeUpdateUsingAjax',
			data : {attendeeUserArray : attendeeUserArray, memberDetailArray : memberDetailArray},
			dataType : 'json',
			cache: false,
			success : function(respond){
				
				var arrToUpdateBarcodeStatus	= new Array();
				var arrToInsertBarcode			= new Array();
				var arrToDeleteBarcode			= new Array();
				var arrToInsertUser 			= new Array();
				//var arrToDeleteUser 			= new Array();
				
				arrToUpdateBarcodeStatus = respond.arrToUpdateBarcodeStatus;//alert(arrToUpdateBarcodeStatus);
				arrToInsertBarcode 		 = respond.arrToInsertBarcode;//alert(arrToInsertBarcode);
				arrToDeleteBarcode 		 = respond.arrToDeleteBarcode;//alert(arrToDeleteBarcode);
				arrToInsertUser 		 = respond.arrToInsertUser;//alert(arrToInsertUser);
				//arrToDeleteUser 		 = respond.arrToDeleteUser;//alert(arrToDeleteUser);
				
				if(arrToUpdateBarcodeStatus !== null && arrToUpdateBarcodeStatus !== '' && arrToUpdateBarcodeStatus !==undefined){
					jQuery.each(arrToUpdateBarcodeStatus,function(key,value){
						var barcode = value.barcode;
						var barcodeStatus = value.barcodeStatus;
						var attendeeID = value.attendeeID;
						var userID = value.userID;
						if(barcodeStatus === 'unused'){
							var insertMark = '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',1, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
						}else{
							var insertMark = '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',0, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x check"></i></a>';
						}
						jQuery(".thisBarcodeStatus[rel="+barcode+"]").html(insertMark);
					});
				}
				
				/*if(arrToDeleteBarcode !== null && arrToDeleteBarcode !== '' && arrToDeleteBarcode !==undefined){	
					jQuery.each(arrToDeleteBarcode,function(key,value){
						var barcode = value.barcode;
						jQuery(".thisBarcodeStatus[rel="+barcode+"]").parent().parent().remove();
					});
				}*/
				
				if(arrToInsertBarcode !== null && arrToInsertBarcode !== '' && arrToInsertBarcode !==undefined){	
					jQuery.each(arrToInsertBarcode,function(key,value){
						var barcode = value.barcode;
						var barcodeStatus = value.barcodeStatus;
						var attendeeID = value.attendeeID;
						var userID = value.userID;
						var insertMark = '<tr lang="'+userID+'" class="barcode_'+userID+'" style="">';
						insertMark += '<td class="Name" colspan="2"><div>'+barcode+'</div></td>';
						insertMark += '<td id="checkinOptID_'+userID+'" class="checkinStatus">';
						insertMark += '<div rel="'+barcode+'" class="thisBarcodeStatus">';
						if(barcodeStatus === 'unused'){
							insertMark += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',1, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
						}else{
							insertMark += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',0, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x check"></i></a>';
						}
						insertMark += '</div></td></tr>';
						jQuery("#attendee_"+userID).after(insertMark);
					});
				}
				
			/*	if(arrToInsertUser !== null && arrToInsertUser !== '' && arrToInsertUser !==undefined){	
					jQuery.each(arrToInsertUser,function(key,value){
						var userID = value.userID;
						var userName = value.name;
						var userType = value.usertype;
												
						var insertMark = '<tr lang="'+userID+'" id="attendee_'+userID+'">';
						insertMark += '<td class="Name"><div>'+userName+'</div></td>';
						insertMark += '<td class="usertype"><div>'+userType+'</div></td>';
						insertMark += '<td id="hide_'+userID+'" class="checkinStatus clickToExpand hideRow">';
						//insertMark += '<img alt="Click here to check-in and check-out" title="Click here to check-in and check-out" src="'+startxUrl+'components/com_membercheckin/assets/images/minus.png">';
						insertMark += '</td></tr>';
						
						var barcodeInfo = value.barcodeInfo;
						jQuery.each(barcodeInfo,function(key1,value1){
							var barcode = value1.barcode;
							var barcodeStatus = value1.barcodeStatus;
							insertMark += '<tr lang="'+userID+'" style="" class="barcode_'+userID+'"><td colspan="2" class="Name">';
							insertMark += '<div>'+barcode+'</div></td>';
							insertMark += '<td class="checkinStatus" id="checkinOptID_'+userID+'">';
							insertMark += '<div class="thisBarcodeStatus" rel="'+barcode+'">';
							if(barcodeStatus === 'unused'){
								insertMark += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',1, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
							}else{
								insertMark += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',0, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x check"></i></a>';
							}
							insertMark += '</div></td></tr>';
						});
						
						jQuery("#allcheckinMember").append(insertMark);
					});
				}
				
				/*if(arrToDeleteUser !== null && arrToDeleteUser !== '' && arrToDeleteUser !==undefined){	
					jQuery.each(arrToDeleteUser,function(key,value){
						var attendeeID = value.attendeeID;
						var userID = value.userID;
						jQuery("#attendee_"+userID).remove();
						jQuery(".barcode_"+userID).remove();
					});
				}*/
				
				
				//Update global arrays
				/*var latestMemberDetailArr	= new Array();
				var latestAttendeeUserArr	= new Array();
				latestMemberDetailArr = respond.latestMemberDetailArr;//alert(latestMemberDetailArr);
				latestAttendeeUserArr = respond.latestAttendeeUserArr;//alert(latestAttendeeUserArr);
				
				if(latestMemberDetailArr !==undefined){	
					var j=0;
					memberDetailArray = new Array();
					jQuery.each(latestMemberDetailArr,function(key,value){
						memberDetailArray[j] = value;
						j = j+1;
					
					});
					
				}
				if(latestAttendeeUserArr !==undefined){	
					var i=0;
					attendeeUserArray = new Array();
					jQuery.each(latestAttendeeUserArr,function(key,value){
						attendeeUserArray[i] = value;
						i = i+1;
					
					});
					
				}*/ //alert(memberDetailArray);alert(attendeeUserArray);
			}
		});
	},30000);
	
	
	jQuery(".clickToExpand").click(function(){
		var getThisID = jQuery(this).attr('id').split('_');
		var getID = getThisID[1];
		if(getThisID[0] == 'show'){
			jQuery(this).removeClass('showRow');
			jQuery(this).addClass('hideRow');
			jQuery(".barcode_"+getID).show();
			jQuery(this).attr('id','hide_'+getID);
		}else{
			jQuery(this).removeClass('hideRow');
			jQuery(this).addClass('showRow');
			jQuery(".barcode_"+getID).hide();
			jQuery(this).attr('id','show_'+getID);
		}
	});
	
	//userID by vishal
function memberCheckin(id, checkinStatus){
	if(id > 0){
		  var cstatus = '';
		  jQuery.ajax({		   
			  type: 'POST',
			  url: "ajaxUpdate.php",
			  data : { id : id, checkinStatus : checkinStatus},
			  success: function(respond){				  
				  //alert('success'+userID);
				  status = "'"+status+"'";
				  if(checkinStatus == '1'){
					  cstatus = '<a class="" href="javascript:void(0);" onclick="memberCheckin('+id+',0)"><i class="icon-ok-sign icon-2x check"></i></a>';
				  }else{
					  cstatus = '<a class="" href="javascript:void(0);" onclick="memberCheckin('+id+',1)"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
				  }
				  //jQuery(".thisBarcodeStatus[rel="+barcode+"]").html(cstatus);
				  //alert(userID);
				  jQuery('#checkinOptID_'+id).html(cstatus);
			  }
	      });
	}else{
		
	}
}


	
	jQuery("#chekinMember").keyup(function() {
		var retVal = '';
		var memberName = jQuery('#chekinMember').val();
		jQuery.ajax({		   
		  type: 'POST',
		  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxMeberchekinUpdate",
		  data : { memberName : memberName },
		  success: function(respond){
			  var chekinMemberDetail = jQuery.parseJSON(respond);
			  if(chekinMemberDetail.length > 0){
				jQuery.each(chekinMemberDetail,function(key,value){
					var userID = value['id'];
					var userName = value['name'];
					var userType = value['usertype'];
					retVal += '<tr lang="'+userID+'" id="attendee_'+userID+'">';
					retVal += '<td class="Name"><div>'+userName+'</div></td>';
					retVal += '<td class="usertype"><div>'+userType+'</div></td>';
					retVal += '<td id="hide_'+userID+'" class="checkinStatus clickToExpand hideRow">';
					//retVal += '<img alt="Click here to check-in and check-out" title="Click here to check-in and check-out" src="'+startxUrl+'components/com_membercheckin/assets/images/minus.png">';
					retVal += '</td></tr>';
					
					var barcodeInfo = value['barcodeInfo'];
					jQuery.each(barcodeInfo,function(key1,value1){
						var barcode = value1.barcode;
						var barcodeStatus = value1.barcodeStatus;
						retVal += '<tr lang="'+userID+'" style="" class="checkinOptID_'+userID+'">';
						retVal += '<td class="checkinStatus" id="checkinOptID_'+userID+'">';
						//<td colspan="2" class="Name">';
						//retVal += '</td>'; //retVal += '<div>'+barcode+'</div></td>';
						
						/*retVal += '<div class="thisBarcodeStatus" rel="'+barcode+'">';
						if(barcodeStatus === 'unused'){
							retVal += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',1, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
						}else{
							retVal += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',0, '+barcode+')" style="float:none !important"><i class="icon-ok-sign icon-2x check"></i></a>';
						}
						retVal += '</div></td></tr>';*/
						/*##################### customize code*/
						 
						//retVal += '<div class="thisBarcodeStatus" rel="'+barcode+'">';
						if(barcodeStatus === 'unused'){
							retVal += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',1)" style="float:none !important"><i class="icon-ok-sign icon-2x uncheck"></i></a>';
						}else{
							retVal += '<a href="javascript:void(0);" onclick="memberCheckin('+userID+',0)" style="float:none !important"><i class="icon-ok-sign icon-2x check"></i></a>';
						}
						retVal += '</div></td></tr>';
						
						
					});					
				});
			  }else{
				  retVal = '<tr><td align="center">Member Not Found</td></tr>';
			  }
			  jQuery('#allcheckinMember').html(retVal);			  
		  }
	  });
	});

});






function presenterDetail(companyID){
	var retVal = '';
	if(companyID > 0){
		 jQuery.ajax({		   
			  type: 'POST',
			  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxPresenterDetail",
			  data : { companyID : companyID  },
			  success: function(respond){				  
				  var memberDetail = jQuery.parseJSON(respond);
				  if(memberDetail.length > 0){
					  for(var i = 0; i < memberDetail.length; i++){
						  retVal += '<option value="'+memberDetail[i]['id']+'">'+memberDetail[i]['name']+'</option>';
					  }
					  
				  }else{
					  retVal = '<option value="">Select Presenter</option>';
				  }
				  jQuery('#userID').html(retVal);
			  }
	      });
	}else{
		jQuery('#userID').html('<option value="">Select Presenter</option>');
	}
}
	
function eventProcessLive(status,eventID){
	if(eventID > 0){
		jQuery.ajax({		   
		  type: 'POST',
		  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxUpdateEventProcess",
		  data : { status : status , eventID : eventID },
		  success: function(respond){	
			  if(status == '1'){
				if(respond == '0'){
					alert('Other event already Live');
				}else{
					var statusVar = '<div class="startStatus"><input type="button" value="Stop" onclick="eventProcessLive(3,'+eventID+');" class="eventaction button"><br><br><span class="noteme">Live Presentation / Edit to increase time</span></div>';
					var edStatus  = '<a title="Edit" onclick="editEventInline('+eventID+',1);" href="javascript:void(0);" class="editProcEvent"><span class="icon-edit icon-2x"></span></a>';
					jQuery('#companyEditDiv_'+eventID).html('');					
					jQuery('#checkinStatus_'+eventID).html('');
					jQuery('#startStatus_'+eventID).html('');
					jQuery('#companyShowDiv_'+eventID).attr('style','display:block;');
					
					jQuery('#evntProcess_'+eventID).attr('class','livepp');					
					jQuery('#checkinStatus_'+eventID).html(statusVar);
					jQuery('#startStatus_'+eventID).html(edStatus);
				}
			  }
			  if(status == '2'){
				if(respond == '0'){
					alert('Other event already Next Up');
				}
			  }
			  if(status == '3'){
				jQuery('#evntProcess_'+eventID).attr('class','finishpp');
				jQuery('#checkinStatus_'+eventID).html('<div class="startStatus">Finished Presentation</div>');
				jQuery('#startStatus_'+eventID).html('');				
			  }
		  }
		});
	}
}


function eventProcessLiveAdd(status,eventID){
	jQuery.ajax({		   
	  type: 'POST',
	  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxCheckUpdateEventProcess",
	  data : { status : status },
	  success: function(respond){	
		  
		  if(status == '2'){
			if(respond == '0'){
				alert('Other event already Next Up');
				if(eventID > 0){
					jQuery('#eventStatus_'+eventID).val(0);
				}
			}
		  }else if(status == '1'){
			if(respond == '0'){
				alert('Other event already Live');
				if(eventID > 0){
					jQuery('#eventStatus_'+eventID).val(0);
				}
			}  
		  }
		  
	  }
	});
}

function deleteEvent(eventID){
	if(eventID > 0){
		var conf = 	confirm("Are you sure to delete this event?");
		if(conf){
			jQuery.ajax({		   
			  type: 'POST',
			  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxDeteleEventProcess",
			  data : { eventID : eventID },
			  success: function(respond){				  
					jQuery('#evntProcess_'+eventID).remove();
			  }
			});
		}
	}
}

function checkEventTime(){
	var startHour = jQuery('#startHour').val();
	var startMin  = jQuery('#startMin').val();
	var startLfix = jQuery('#startLfix').val();
	jQuery('#startTimeErrorDiv').html('');
	if(startHour != "" && startMin != "" && startLfix != ""){
		jQuery('#startTimeErrorDiv').hide();
		var eventTime  = startHour+':'+startMin+' '+startLfix;
		var eventID   = jQuery('#eventID').val();
		if(eventTime != ""){
			jQuery.ajax({		   
			  type: 'POST',
			  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxCheckEventTime",
			  data : { eventTime : eventTime, eventID : eventID },
			  success: function(respond){				  
				  if(respond == '1'){				  
					return true;
				  }else{
					jQuery('#startTimeErrorDiv').html('Start time entered already exist');
					jQuery('#startTimeErrorDiv').show();
					jQuery('#startTime').focus();
					return false;
				  }
			  }
			});
		}
	}
}

function checkEventTimeAdd(){
	var startHour = jQuery('#startHour').val();
	var startMin  = jQuery('#startMin').val();
	var startLfix = jQuery('#startLfix').val();
	jQuery('#startTimeErrorDiv').html('');
	if(startHour != "" && startMin != "" && startLfix != ""){
		jQuery('#startTimeErrorDiv').hide();
		var eventTime  = startHour+':'+startMin+' '+startLfix;
		var eventID   = jQuery('#eventID').val();
		if(eventTime != ""){
			jQuery.ajax({		   
			  type: 'POST',
			  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxCheckEventTime",
			  data : { eventTime : eventTime, eventID : eventID },
			  success: function(respond){				  
				  if(respond == '1'){				  
					return true;
				  }else{
					jQuery('#startTimeErrorDiv').html('Start time entered already exist');
					jQuery('#startTimeErrorDiv').show();
					jQuery('#startTime').focus();
					return false;
				  }
			  }
			});
		}
	}
}


function checkEventTimeEdit(eventID){
	var startHour = jQuery('#startHour').val();
	var startMin  = jQuery('#startMin').val();
	var startLfix = jQuery('#startLfix').val();
	jQuery('#startTimeErrorDiv').html('');
	if(startHour != "" && startMin != "" && startLfix != ""){
		jQuery('#startTimeErrorDiv').hide();
		var eventTime  = startHour+':'+startMin+' '+startLfix;
		if(eventTime != ""){
			jQuery.ajax({		   
			  type: 'POST',
			  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxCheckEventTime",
			  data : { eventTime : eventTime, eventID : eventID },
			  success: function(respond){				  
				  if(respond == '1'){
					jQuery('.stm1').text('Start Time');  
					jQuery('.stm1').attr('style','');			  
					return true;
				  }else{
					jQuery('#startTimeErrorDiv').html('Start time entered already exist');
					//jQuery('#startTimeErrorDiv').show();
					jQuery('.stm1').attr('style','color:red;');
					jQuery('.stm1').text('Start time entered already exist');
					jQuery('#startTime').focus();
					return false;
				  }
			  }
			});
		}
	}
}

function checkEventStopTime(){
	var stopHour  = jQuery('#stopHour').val();
	var stopMin   = jQuery('#stopMin').val();
	var stopLfix  = jQuery('#stopLfix').val();
	jQuery('#stopTimeErrorDiv').html('');
	if(stopHour != "" && stopMin != "" && stopLfix != ""){
	  jQuery('#stopTimeErrorDiv').hide();
	  var eventStopTime =  stopHour+':'+stopMin+' '+stopLfix;
	  var startHour = jQuery('#startHour').val();
	  var startMin  = jQuery('#startMin').val();
	  var startLfix = jQuery('#startLfix').val();	
	  var eventStartTime = startHour+':'+startMin+' '+startLfix;
	  if(eventStopTime != ""){
		eventStartTime = eventStartTime.replace(/pm/gi, "");
		eventStartTime = eventStartTime.replace(":",""); 
		eventStartTime = eventStartTime.replace(" ",""); 
		eventStopTime  = eventStopTime.replace(/pm/gi, "");
		eventStopTime  = eventStopTime.replace(":",""); 
		eventStopTime  = eventStopTime.replace(" ",""); 
		if(eventStopTime <= eventStartTime){
			//jQuery('#stopTimeErrorDiv').html('Must be greater than start time');
			jQuery('.stp1').text('Must be greater than start time');
			jQuery('.stp1').attr('style','color:red;');
			jQuery('#stopTimeErrorDiv').show();
			jQuery('#stopTime').focus();
			return false;
		}else{
			jQuery('.stp1').text('Stop Time');
			jQuery('.stp1').attr('style','');
		}
	  }
	}
}

function checkEventStopTimeAdd(){
	var stopHour  = jQuery('#stopHour').val();
	var stopMin   = jQuery('#stopMin').val();
	var stopLfix  = jQuery('#stopLfix').val();
	jQuery('#stopTimeErrorDiv').html('');
	if(stopHour != "" && stopMin != "" && stopLfix != ""){
	  jQuery('#stopTimeErrorDiv').hide();
	  var eventStopTime =  stopHour+':'+stopMin+' '+stopLfix;
	  var startHour = jQuery('#startHour').val();
	  var startMin  = jQuery('#startMin').val();
	  var startLfix = jQuery('#startLfix').val();	
	  var eventStartTime = startHour+':'+startMin+' '+startLfix;
	  if(eventStopTime != ""){
		eventStartTime = eventStartTime.replace(/pm/gi, "");
		eventStartTime = eventStartTime.replace(":",""); 
		eventStartTime = eventStartTime.replace(" ",""); 
		eventStopTime  = eventStopTime.replace(/pm/gi, "");
		eventStopTime  = eventStopTime.replace(":",""); 
		eventStopTime  = eventStopTime.replace(" ",""); 
		if(eventStopTime <= eventStartTime){
			jQuery('#stopTimeErrorDiv').html('Must be greater than start time');
			jQuery('#stopTimeErrorDiv').show();
			jQuery('#stopTime').focus();
			return false;
		}
	  }
	}
}


function editEventInline(eventID,eventStatus){
	
	var divValue = jQuery('#evntProcess_'+eventID).html();
	jQuery('.editProcEvent').hide();
	jQuery('.deleteProcEvent').hide();
	jQuery('#dplecateDivValue').html(divValue);
	
	
		//alert(newTextData);
		//return false;
	jQuery.ajax({		   
	  type: 'POST',
	  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxGetEventDetailOnID",
	  data : { eventID : eventID},
	  success: function(respond){
		  //alert(respond);	
		  //return false;			  
		  if(respond){
			  var resdata = jQuery.parseJSON(respond);			  
			  if(eventStatus == '1'){
				  var stopTimeSelect = hourMinut(resdata.stop,'stop','1',eventID);
				  var stValHour   = resdata.start.substring(0,2);
				  var stValMin    = resdata.start.substring(3,6);
				  var startTimeSelectDiv = '<input type="hidden" name="startHour" id="startHour" value="'+stValHour+'" />';
				  startTimeSelectDiv += '<input type="hidden" name="startMin" id="startMin" value="'+stValMin+'" />';
				  startTimeSelectDiv += '<input type="hidden" name="" id="" value="PM" />';
				  jQuery('#startTimeDiv_'+eventID).append(startTimeSelectDiv);
				  var stopTimeSelectDiv = stopTimeSelect;
				  stopTimeSelectDiv += '<br /><label for="" class="error" id="stopTimeErrorDiv" style="display:none;"></label><label  class="noteme stp1">Stop Time</label>';
				  jQuery('#stopTimeDiv_'+eventID).html(stopTimeSelectDiv);
				  jQuery('#dplcstatus').html(jQuery('#startStatus_'+eventID).html());
				  jQuery('#startStatus_'+eventID).html('<a class="editProcEvent" href="javascript:void(0);" title="Save" onclick="saveEditedAgendaValue('+eventID+',\'live\');"><span class="icon-save icon-2x"></span></a><a class="editProcEvent" title="Cancel" href="javascript:void(0);" onclick="cancleAgendaEdit('+eventID+');"><span class="icon-remove-sign icon-2x"></span></a>');
				  
			  }else{
				  
				  var startTimeSelect = hourMinut(resdata.start,'start','1', eventID);
				  var stopTimeSelect  = hourMinut(resdata.stop,'stop','1', eventID);
				  var startTimeSelectDiv = startTimeSelect;
				  startTimeSelectDiv += '<br/><label for="" class="error" id="startTimeErrorDiv" style="display:none;"></label><label class="noteme stm1">Start Time</label>';
				  jQuery('#startTimeDiv_'+eventID).html(startTimeSelectDiv);
				  
				  var stopTimeSelectDiv = stopTimeSelect;
				  stopTimeSelectDiv += '<br /><label for="" class="error" id="stopTimeErrorDiv" style="display:none;"></label><label class="noteme stp1">Stop Time</label>';
				  jQuery('#stopTimeDiv_'+eventID).html(stopTimeSelectDiv);
				  jQuery('#dplcstatus').html(jQuery('#startStatus_'+eventID).html());
				  if(eventStatus == '2'){
					jQuery('#evntProcess_'+eventID+' div[class="comclass"] select').attr('onchange','');
					jQuery('#startStatus_'+eventID).html('<a class="editProcEvent" href="javascript:void(0);" title="Save" onclick="saveEditedAgendaValue('+eventID+',\'nextUp\');"><span class="icon-save icon-2x"></span></a><a class="editProcEvent" title="Cancel" href="javascript:void(0);" onclick="cancleAgendaEdit('+eventID+');" ><span class="icon-remove-sign icon-2x"></span></a>');
				  }else{ 
					jQuery('#companyShowDiv_'+eventID).hide();
					jQuery('#companyEditDiv_'+eventID).show();
					jQuery('#eventStatus_'+eventID).show();
					jQuery('#evntProcess_'+eventID+' div[class="comclass"] select').attr('onchange','');  
					jQuery('#startStatus_'+eventID).html('<a class="editProcEvent" href="javascript:void(0);" title="Save" onclick="saveEditedAgendaValue('+eventID+',\'other\');"><span class="icon-save icon-2x"></span></a><a class="editProcEvent" title="Cancel" href="javascript:void(0);" onclick="cancleAgendaEdit('+eventID+');"><span class="icon-remove-sign icon-2x"></span></a>');
				  }
				  
				  
				  
			  }			  
		  }
	  }
	});

}


function updateCompanyEventComing(companyID,eventID){
	jQuery.ajax({		   
	  type: 'POST',
	  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxUpdateComingEvent",
	  data : { eventID : eventID, companyID : companyID},
	  success: function(respond){				  
		  if(respond){
			  var resdata  = jQuery.parseJSON(respond);
			  var rEventID = resdata['replaceEventID'];
			  var rCompanyID = resdata['replaceCompanyID'];
			  var rCompanyNm = resdata['replaceCompanyName'];
			   var rSessionNm = resdata['replaceSession'];
			  if(rEventID > 0){ //alert(rCompanyID+'ddddd'+rEventID);
				//alert(jQuery('#companySelectDiv_'+rEventID+" select").val());
				jQuery('#companySelectDiv_'+rEventID+" select").val(rCompanyID);
				jQuery('#companyShowDiv_'+rEventID).html(rCompanyNm);
				//alert(jQuery('#companySelectDiv_'+rEventID+" select").val());
			  }
		  }
	  }
	});
}


function hourMinut(timeVal, namePrefix, status, eventID){
	var retVal    = '';
	var tempNum   = '';
	var selectcls = '';
	var valHour   = timeVal.substring(0,2);
	var valMin    = timeVal.substring(3,5);
	var startHour = (status == 1)?parseInt(valHour):1;				// Check for live start hour
	var onchangeFunction = (namePrefix == 'start')?'checkEventTimeEdit('+eventID+');checkEventStopTime();':'checkEventStopTime();';
	//var onchangeFunction = 'checkEventStopTime();';
	//alert(valHour+'||'+valMin);
	retVal = '<select name="'+namePrefix+'Hour" id="'+namePrefix+'Hour" onchange="'+onchangeFunction+'" style="width:33% !important;padding-right:5px;">';
	retVal += '<option value="">HH</option>';
	
	for(var i=startHour; i<=12; i++){
		tempNum = (i<10)?'0'+i:i;
		selectcls = (valHour == tempNum)?' selected="selected"':'';
		retVal += '<option value="'+tempNum+'" '+selectcls+'>'+tempNum+'</option>';
	}
	retVal += '</select>';
	
	retVal += '<select name="'+namePrefix+'Min" id="'+namePrefix+'Min" onchange="'+onchangeFunction+'" style="width:33% !important;padding-right:5px !important;">';
	retVal += '<option value="">MM</option>';
	for(var i=1; i<=60; i++){
		tempNum = (i<10)?'0'+i:i;	
		selectcls = (valMin == tempNum)?' selected="selected"':'';		
		retVal += '<option value="'+tempNum+'" '+selectcls+'>'+tempNum+'</option>';
	}
	retVal += '</select> PM';
	retVal += '<select name="'+namePrefix+'Lfix" id="'+namePrefix+'Lfix"  onchange="'+onchangeFunction+'" style="display:none; width:33% !important">';
	retVal += '<option value="PM">PM</option>';
	retVal += '</select>';
	
	return retVal;
}


function saveEditedAgendaValue(eventID,eventStatus){
	
	if(eventStatus == 'live'){
		
		var stopHour = jQuery("#stopHour").val();
		var stopMin  = jQuery("#stopMin").val();
		var stopLfix = jQuery("#stopLfix").val();
		var errorLength = jQuery('#stopTimeErrorDiv').html();
		var errorOnform = errorLength.length;
		var stopTime = stopHour+':'+stopMin+' '+stopLfix;
		alert('rrr');
		jQuery.ajax({		   
		  type: 'POST',
		  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxUpdateEvents",
		  data : { eventID : eventID, stopTime : stopTime, status : 'live', errorOnform : errorOnform},
		  success: function(respond){	
			if(respond != 0){			  
				jQuery("input[type='hidden']").remove();
				jQuery('#stopTimeDiv_'+eventID).html(stopTime);
				jQuery('#startStatus_'+eventID).html(jQuery('#dplcstatus').html());
				jQuery('#dplecateDivValue').html('');
				jQuery('#dplcstatus').html('');
				location.reload();
			}else{
				alert('Some wrong entry for save data');
			}
		  }
		});
		
	}else if(eventStatus == 'nextUp'){
		
		var startHour = jQuery("#startHour").val();
		var startMin  = jQuery("#startMin").val();
		var startLfix = jQuery("#startLfix").val();
		var stopHour  = jQuery("#stopHour").val();
		var stopMin   = jQuery("#stopMin").val();
		var stopLfix  = jQuery("#stopLfix").val();
		var companyID = jQuery('#evntProcess_'+eventID+' div[class="comclass"] select').val();
		var errorStartLength = jQuery('#startTimeErrorDiv').html();
		var errorStopLength = jQuery('#stopTimeErrorDiv').html();
		var errorOnform = parseInt(errorStartLength.length) + parseInt(errorStopLength.length);
		var startTime = startHour+':'+startMin+' '+startLfix;
		var stopTime  = stopHour+':'+stopMin+' '+stopLfix;
		
		jQuery.ajax({		   
		  type: 'POST',
		  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxUpdateEvents",
		  data : { eventID : eventID, startTime : startTime, stopTime : stopTime, companyID : companyID,  status : 'nextUp', errorOnform : errorOnform},
		  success: function(respond){	
			if(respond != 0){		
				//return false;	  
				location.reload();
			}else{
				alert('Some wrong entry for save data');
			}
		  }
		});
		
	}else{
		
		var startHour = jQuery("#startHour").val();
		var startMin  = jQuery("#startMin").val();
		var startLfix = jQuery("#startLfix").val();
		var stopHour  = jQuery("#stopHour").val();
		var stopMin   = jQuery("#stopMin").val();
		var stopLfix  = jQuery("#stopLfix").val();
		var companyID = jQuery('#evntProcess_'+eventID+' div[class="comclass"] select').val();
		var eventStatus = jQuery('#eventStatus_'+eventID).val();
		var errorStartLength = jQuery('#startTimeErrorDiv').html();
		var errorStopLength = jQuery('#stopTimeErrorDiv').html();
		var errorOnform = parseInt(errorStartLength.length) + parseInt(errorStopLength.length);
		var startTime = startHour+':'+startMin+' '+startLfix;
		var stopTime  = stopHour+':'+stopMin+' '+stopLfix;
		
		var newElement='#Session_'+eventID;
		var newTextData=jQuery(newElement).val();
		
		
		jQuery.ajax({		   
		  type: 'POST',
		  url: "index.php?option=com_membercheckin&view=membercheckin&task=ajaxUpdateEvents",
		  data : { eventID : eventID, startTime : startTime, stopTime : stopTime, companyID : companyID, eventStatus : eventStatus, status : 'other', errorOnform : errorOnform, Session:newTextData},
		  success: function(respond){	//alert(respond);return false;
			if(respond != 0){		
				//return false;	  
				location.reload();
			}else{
				alert('Some wrong entry for save data');
			}
		  }
		});
	}
}


function cancleAgendaEdit(eventID){
	jQuery('#evntProcess_'+eventID).html(jQuery('#dplecateDivValue').html());
	jQuery('#dplecateDivValue').html('');
	jQuery('#dplcstatus').html('');
	jQuery('.editProcEvent').show();
	jQuery('.deleteProcEvent').show();
}
