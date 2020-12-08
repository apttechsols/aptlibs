<?php
	
	if(EPASS != 'UwRxVTHAN6IeR3IZpLD8Tg8u2twZW56mN'){
		if(!DomainName){
			// Get server port type (exampale - http:// or https://)
			if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
				$HeaderSecureType = "https://";
			}else{
				$HeaderSecureType = "http://";
			}
			// Create Domain name and save it in const variable
			define("DomainName",  $HeaderSecureType.$_SERVER['HTTP_HOST']);
		}
		header("Location: " . DomainName . "Library/SiteComponents/PageNotFound/index.php"); die();
		exit();
	}
	function ConvertToDayFromSec($seconds){
		$dt1 = new DateTime("@0");
		$dt2 = new DateTime("@$seconds");
		return $dt1->diff($dt2)->format('%a Day : %h Hour : %i Min : %s sec');
	}
?>