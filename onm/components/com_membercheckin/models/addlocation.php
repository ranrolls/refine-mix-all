<?php

global $alt_libdir;
JLoader::import('joomla.application.component.modellist', $alt_libdir);
jimport('joomla.application.component.helper');
 
class MembercheckinModelAddlocation extends JModelList
{
	public function __construct($config = array())
	{		
	
		parent::__construct($config);		
	}
	
	  
             /*Add Sub category with category id*/

        public function saveLocationData($post){
                 //print_r($post); die; 
	      $db		       = JFactory::getDBO();  
              $creationDate            = date('Y-m-d H:i:s');

               $query = $db->getQuery(true);
               $columns = array('catid','subcatid','org_id','locationName','location_lat','location_long','creationDate');      
             
              $values = array($db->quote($post['category']),$db->quote($post['subcatid']),$db->quote($post['orgid']),$db->quote($post['locationName']),$db->quote($post['locationLat']),$db->quote($post['locationLong']),$db->quote($creationDate));

             $query
                ->insert($db->quoteName('onm_offer_location'))
                ->columns($db->quoteName($columns))
                ->values(implode(',', $values));
     
 
            $db->setQuery($query);
 
            $result = $db->execute();
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Location Added')
                  window.location.href='/index.php/component/membercheckin/?view=listlocation';  
                 </SCRIPT>");
                 die();
             }







	/*
	 *
	 *  This function use to validate Company detail
	 * 
	 * */
	public function validate($post)
	{
		$errorMsg = array();
		$db		  = JFactory::getDBO();
		 
                if(empty($post['organizationName'])){
			$errorMsg['organizationName'] = "Organization name is a required field.";
		}
		 
		 
		return $errorMsg;
	}
	
	 
 


	
}
