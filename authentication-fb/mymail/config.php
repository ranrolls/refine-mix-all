<?php 

date_default_timezone_set('America/Los_Angeles');

  
  
$host = "localhost";
	$user = "sociacir_emailcr";
	$pass =  "ODL+0-T9#V~U";
	$db = "sociacir_emailcrm";
   
 
   
global $prefix; 
$prefix = "";

$con = mysql_connect('localhost','sociacir_emailcr','ODL+0-T9#V~U') or die("unable to connect database");
mysql_set_charset('utf8', $con);
$db  = mysql_select_db("sociacir_emailcrm",$con) or die("unable to select db");





 
function db_connect($host, $db, $user, $pass) 
{
	global $DB_DIE_ON_FAIL, $DB_DEBUG;
	if (!$dbh = mysql_connect($host,$user,$pass)) {
		if ($DB_DEBUG) 
		{
			echo "<h2>Can't connect to $dbhost as $dbuser</h2>";
			echo "<p><b>MySQL Error</b>: ", mysql_error();
		} else {
			echo "<h2>Database error encountered</h2>";
		}
		if ($DB_DIE_ON_FAIL) {
			echo "<p>This script cannot continue, terminating.";
			die();
		}
	}
	if (! mysql_select_db("joomla2_5")) {
		if ($DB_DEBUG) {
			echo "<h2>Can't select database $dbname</h2>";
			echo "<p><b>MySQL Error</b>: ", mysql_error();
		} else {
			echo "<h2>Database error encountered</h2>";
		}
		if ($DB_DIE_ON_FAIL) {
			echo "<p>This script cannot continue, terminating.";
			die();
		}
	}
	return $dbh;
}

function db_query($query, $debug=false, $die_on_debug=true, $silent=false) 
{
/* run the query $query against the current database.  if $debug is true, then
 * we will just display the query on screen.  if $die_on_debug is true, and
 * $debug is true, then we will stop the script after printing he debug message,
 * otherwise we will run the query.  if $silent is true then we will surpress
 * all error messages, otherwise we will print out that a database error has
 * occurred */
	global $DB_DIE_ON_FAIL, $DB_DEBUG;
	if ($debug) {
		echo "<pre>" . htmlspecialchars($query) . "</pre>";
		if ($die_on_debug) die;
	}
	$qid = mysql_query($query);
	if (! $qid && ! $silent) {
		if ($DB_DEBUG) {
			echo "<h2>Can't execute query</h2>";
			echo "<pre>" . htmlspecialchars($query) . "</pre>";
			echo "<p><b>MySQL Error</b>: ", mysql_error();
		} else {
			echo "<h2>Database error encountered</h2>";
		}
		if ($DB_DIE_ON_FAIL) {
			echo "<p>This script cannot continue, terminating.";
			die();
		}
	}
	return $qid;
}
 
 
function db_fetch_array($qid) {
/* grab the next row from the query result identifier $qid, and return it
 * as an associative array.  if there are no more results, return FALSE */
	return mysql_fetch_array($qid);
}

function db_fetch_object($qid) {
/* grab the next row from the query result identifier $qid, and return it
 * as an object.  if there are no more results, return FALSE */

	return mysql_fetch_object($qid);
}


function db_num_rows($qid) {
/* return the number of records (rows) returned from the SELECT query with
 * the query result identifier $qid. */ 
 if($qid){
	return mysql_num_rows($qid);
 }else{
	 return 0;
 }
}

function db_affected_rows() {
/* return the number of rows affected by the last INSERT, UPDATE, or DELETE
 * query */
	return mysql_affected_rows();
}

function db_insert_id() {
/* if you just INSERTed a new row into a table with an autonumber, call this
 * function to give you the ID of the new autonumber value */
	return mysql_insert_id();
}

function db_free_result($qid) {
/* free up the resources used by the query result identifier $qid */
	mysql_free_result($qid);
}

function db_num_fields($qid) {
/* return the number of fields returned from the SELECT query with the
 * identifier $qid */
	return mysql_num_fields($qid);
}

function db_field_name($qid, $fieldno) {
/* return the name of the field number $fieldno returned from the SELECT query
 * with the identifier $qid */
	return mysql_field_name($qid, $fieldno);
}

function db_data_seek($qid, $row) {
/* move the database cursor to row $row on the SELECT query with the identifier
 * $qid */
	if (db_num_rows($qid)) { return mysql_data_seek($qid, $row); }
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) { 
  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  if ($unit == "K") 
  {
    //return ($miles * 1.609344); 
	return ($miles); 
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

function image_upload($img_name)
{
	define ("MAX_SIZE","40000000000");
	$errors=0;
	if(!empty($img_name))
	{
	  $filename = stripslashes($img_name);
	  $extension = getExtension($filename);
	  $extension = strtolower($extension);
	 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	 {
		echo ' Unknown Image type please check the image ';
		$errors=1;	
	}
	else
	{
	   $size=$img_name['size'];
	   if ($size > MAX_SIZE*1024)
	   {
		 echo "You have exceeded the size limit";
		 $errors=1;
	   }  
	if($extension=="jpg" || $extension=="jpeg" )
	{
		$uploadedfile = $_FILES['image']['tmp_name'];
		$src = imagecreatefromjpeg($uploadedfile);
	}
	else if($extension=="png")
	{
		$uploadedfile = $_FILES['image']['tmp_name'];
		$src = imagecreatefrompng($uploadedfile);
	}
	else 
	{
		$src = imagecreatefromgif($uploadedfile);
	}

 

list($width,$height)=getimagesize($uploadedfile);
$newwidth=200;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);
$newwidth1=100;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
$filename = "../upload/".$img_name;
//echo $filename;
$filename1 = $upload_img_path."thumb/".$img_name;

imagejpeg($tmp,$filename,100);
//imagejpeg($tmp1,$filename1,100);
imagedestroy($src);
imagedestroy($tmp);

//imagedestroy($tmp1);

return true;

}

}
return false;
}

function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
 

function printresponse($json_var,$type)
{
	if($type == "json")
	{
		$json_var = trim(str_replace('<![CDATA[', "",$json_var));
		$json_var = trim(str_replace(']]>', "",$json_var));
		echo json_encode(simplexml_load_string($json_var));
	}
	else
	{
		echo $json_var;
	}
}
function getVaildText($str)
{
    //return preg_replace("/([]';[@!()&*~`@#$%^{}|.?<>_+=,-])/e",  "", $str);
	return preg_replace('/[^A-Z a-z0-9\-]/', '', $str);
}
/*
		It is used to get data of post and get or Request.
	
*/
 function replaceEmpty($variable,$value,$editor = false){
	if (isset($_GET[$variable])){
		$rtn = $_GET[$variable];
	}
	elseif (isset($_POST[$variable])){
		$rtn = $_POST[$variable];
	}
	else{
		$rtn = $value;
	}
	
	if (!get_magic_quotes_gpc()) {
		if (! is_array($rtn)){
			if(!$editor){
				$rtn = htmlentities($rtn);
			}
			return mysql_real_escape_string(addslashes($rtn));
		}
		else {
			$newRtn = array();
			foreach($rtn as $key=>$value){
				if(!$editor){
					$value = htmlentities($value);
				}
				$newRtn[$key] = mysql_real_escape_string(addslashes($value));
			}
			return $newRtn;
		}	
	}
	else {
		if (! is_array($rtn)){
			if(!$editor){
				$rtn = htmlentities($rtn);
			}
			return mysql_real_escape_string(addslashes($rtn));
		}
		else {
			$newRtn = array();
			foreach($rtn as $key=>$value){
				if(!$editor){
					$value = htmlentities($value);
				}
				$newRtn[$key] = mysql_real_escape_string(addslashes($value));
			}
			return $newRtn;
		}	
		//return mysql_real_escape_string(stripslashes($rtn));
	}
}
/* 
	This function is used to remove slashes
*/

function removeStripsSlashes($string){
	return stripslashes(stripslashes(htmlspecialchars_decode($string)));
}
 


?>
