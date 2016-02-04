<?php

include_once('config.php'); 
 

$action = $_REQUEST['action'];
$number = $_REQUEST['number'];
 
 ################### For Details based on Catid and Text keywords ###################
 
 if($action =="textsearch"){

$number = $_REQUEST['number'];

 if(!isset($number) || ($number == "" || $number == 0)){
  $page = 1;
 }	else{
 $page = $number;

}
			$retvalArray = array();
			$finalArray=array();
			
			$keywords=$_REQUEST['keywords'];
			
			$catid=$_REQUEST['id'];
			
			if(!empty($keywords)){
  
 $searchcond="(organizationName LIKE'%$keywords%' OR locationName Like'%$keywords%' OR propertyName Like'%$keywords%')";	 
			 
		 $checkin_details = "SELECT * FROM onm_property  WHERE  ".$searchcond." ";
		      
######### For Pagination #################					
$sql = mysql_query($checkin_details);	
$total_records = mysql_num_rows($sql);
$num_pages = ceil($total_records/20); 
$start =  20* ($page-1);
$end = 20;
$checkin_details .= " limit $start,$end ";
$rs 	= mysql_query($checkin_details);

########################################################	
 while($rows_details = mysql_fetch_assoc($rs)){
$tempArray = array();
$tempArray['id'] = $rows_details['propertyID'];
$tempArray['catid'] = $rows_details['catid'];
$tempArray['subcatid'] = $rows_details['subcatid'];
 
$tempArray['organization_id'] = $rows_details['organization_id']; 
$tempArray['organizationName'] = $rows_details['organizationName']; 
$tempArray['locationName'] = $rows_details['locationName']; 
$tempArray['location_lat'] = $rows_details['location_lat']; 
$tempArray['location_long'] = $rows_details['location_long']; 
$tempArray['offername'] = $rows_details['propertyName']; 
$tempArray['offerAddress'] = $rows_details['propertyAddress']; 
$tempArray['offerDesc'] = $rows_details['propertyDesc']; 
$tempArray['offerPrice'] = $rows_details['propertyPrice'];

//$tempArray['organizationName_short'] =  truncateWords(str_replace('&amp;','&', strip_tags(mb_convert_encoding($rows_details['organizationName'],'utf-8'))), 20, "..."); 
 $finalArray[]    = $tempArray;
 }
	 	               
 ################ End Here ########
			 
 $dat = array('status'=>'1','result'=>$finalArray);

 echo json_encode($dat);exit;      			
	 }
 }
 
 ################### End Here #############################

################# Search Details by offer id #### 
 else if($action =="search_result"){

				$retvalArray = array();
				$finalArray=array(); 

				$query= mysql_query("SELECT * FROM ".$prefix."property where propertyID='".$_REQUEST['id']."' and approval_status='1'"); 

				while($data=mysql_fetch_assoc($query)){

				$tempArray = array();

				$serverrul= "http://".$_SERVER['HTTP_HOST'];
 
				$tempArray['offerID']     	        = $data['propertyID'];	 
				$tempArray['catid']     	        = $data['catid'];
				$tempArray['subcatid']     	        = $data['subcatid'];
				$tempArray['orgid']     	        = $data['organization_id'];
				$tempArray['locatid']     	        = $data['location_id'];
				$tempArray['agentName']     	    = $data['agentName']; 
				$tempArray['offerName']             = $data['propertyName'];

				if($data['productLogo'] != ''){
					$tempArray['offerLogo']    	    = $serverrul.'/images/productLogo/'.$data['productLogo'];
				}
				else
				{
					$tempArray['offerLogo']    	    ='';//$serverrul.'/images/5.jpg'
				}  
				if($data['offerLogoThumb'] != ''){
					$tempArray['offerLogoThumb']    	    = $serverrul.'/images/productLogo/'.$data['offerLogoThumb'];
				}	
				else
				{
					$tempArray['offerLogoThumb']    	    =''; //$serverrul.'/images/5.jpg'
				}  
					$tempArray['shortDesc']                 =  $data['propertyDesc'];

					$tempArray['lTime']                     =  $data['lTime'];

					$tempArray['whatsp']                    =  '';
					$tempArray['disc']                      =   $data['ratingOffer'];
					$tempArray['rating']                    =  $data['rating'];

					$tempArray['fav']                     =  $data['fav'];

					$tempArray['phone']                   =  $data['phone']; 
					$tempArray['ratingOffer']             =  $data['ratingOffer']; 

					$tempArray['offerAddress']            =  $data['propertyAddress'];  
					$tempArray['offerDet']                =  $data['propertyDesc'];
					$tempArray['offerPrice']              = $data['propertyPrice'];
					$tempArray['approval_status']         = $data['approval_status'];  
					$tempArray['locationName']            = $data['locationName']; 
					$tempArray['location_lat']            = $data['location_lat']; 
					$tempArray['location_long']           = $data['location_long']; 
					$tempArray['termscondition']          = $data['termscondition'];    
					$created                              = date('d-m-Y', strtotime($data['creationDate']));
					$tempArray['created']                 = date('d F Y', strtotime($created));
   
					$finalArray[] = $tempArray;  

					} 
					$dat = array('result'=>$finalArray); 
					echo json_encode($dat);exit;   

					}  
		
################ End HERE #######################################



?>
