<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/../libs/mysql/queries.php";
global $DB;

class Twitter extends queries {

  function Twitter ($debug = 0, $DBFile = "DB_Twitter") {
	  require $_SERVER["DOCUMENT_ROOT"] . "/../statlib/DBsLogins/" . $DBFile . ".php";
	  $DebugInfo["DBErrorsFilename"] = $DBErrorsFilename;
	  $DebugInfo["Flag"] = $debug;
	  $this->queries($databasename, $databaseserver, $databaseport, $databaseuser, $databasepassword, $sslkeys, $DebugInfo);
  }
  
	function SeeAllTwitterUsers() {
		$sql = "SELECT * FROM Twitter";	
		#$sql_vars = array(':Email' => $email);											
		return $this->_return_multiple($sql);
	}
	
	function SeeAllTwitterPurposes() {
		$sql = "SELECT * FROM TwitterPurpose " .
					 "LEFT JOIN Twitter ON (Twitter.Twitter_ID = TwitterPurpose.Twitter_ID) " .
					 "LEFT JOIN TwitterGroup ON (TwitterGroup.TwitterGroup_ID = TwitterPurpose.TwitterGroup_ID) " .
					 "ORDER BY TwitterPurpose.TwitterGroup_ID";
		return $this->_return_multiple($sql);
	}
	
	function CheckTwitter($TwitterUsername) {
		$sql = "SELECT * FROM Twitter WHERE Twitter_UserID = :TwitterUsername";
		$sql_vars = array(':TwitterUsername' => $TwitterUsername);											
		return $this->_return_simple($sql, $sql_vars);
	}
	
	function UpdatePurpose($PurposeID, $IDToAdd) {
		$sql = "UPDATE TwitterPurpose SET Twitter_ID = :TwitterID WHERE TwitterPurpose_ID = :PurposeID";
		$sql_vars = 	array('TwitterID' => $IDToAdd, "PurposeID" => $PurposeID);											
		return $this->_return_nothing($sql, $sql_vars);
	}
	
	function AddTwitterUsername($Username) {
		$sql = "INSERT INTO Twitter SET Twitter_UserID = :TwitterUsername";
		$sql_vars = array(':TwitterUsername' => $Username);											
		$this->_return_nothing($sql, $sql_vars);
		
		$sql = "SELECT LAST_INSERT_ID() as Twitter_ID";
		return $this->_return_simple($sql);
	}
	
	function GetFullText($TextID) {
		$sql = "SELECT * FROM TwitterText WHERE TwitterText_ID = :TextID";
		$sql_vars = array(':TextID' => $TextID);											
		return $this->_return_simple($sql, $sql_vars);
	}
	
	
}
