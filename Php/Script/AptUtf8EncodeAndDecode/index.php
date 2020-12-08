<?php
	/*
	*@filename AptSpecialCharacterEncode/index.php
	*@des --- 
	*@Author Arpit sharma
	*/
	
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
	
	if(EPASS != 'UwRxVTHAN6IeR3IZpLD8Tg8u2twZW56mN'){
		header("Location: " . RootPath . "Library/SiteComponents/PageNotFound/index.php"); die();
		exit();
	}

	function AptUtf8Decode($str){
		$data = '';
		foreach (explode(';', $str) as $key1 => $value1) {
			$tmp = preg_replace("/[^0-9]/", '',$value1);
			if($tmp != '' ){
				$data .= chr($tmp);
			}
		}
		return $data;

	}

	function AptUtf8Encode($str) {
	    $str = mb_convert_encoding($str , 'UTF-32', 'UTF-8');
	    $t = unpack("N*", $str);
	    $t = array_map(function($n) { return "&#$n;"; }, $t);
	    return implode("", $t);
	}
?>