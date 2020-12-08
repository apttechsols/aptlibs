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
	define('AptSafeTextDecodeEWords',array('$','=','(',')','[',']','*','/','<','>','~','!','@','^','-','_','+','|',':','.',',','`'));
	require_once (RootPath."Library/Apt/Php/Script/AptUtf8EncodeAndDecode/index.php");
	function AptSafeText($Data){
		foreach ($Data as $key => $value) {
			if($key != 'Str' && $key != 'EWords'){
				continue;
			}
			${$key} = $value;
		}
		if(!function_exists('AptUtf8Encode')){
			return ["status"=>"Error","msg"=>"Required function not found [AptSafeText]","code"=>400];
		}
  		$ExceptWords = $EWords;
		$data = '';
		foreach (str_split($Str) as $key => $value) {
			if(in_array($value, $ExceptWords)){
				$data .= AptUtf8Encode($value);
			}else{
				$data .= $value;
			}
		}
		return ["status"=>"Success","msg"=>$data,"code"=>200];
	}

	function AptSafeTextDecode($Data){
		foreach ($Data as $key => $value) {
			if($key != 'Str' && $key != 'EWords'){
				continue;
			}
			${$key} = $value;
		}
		if(!function_exists('AptUtf8Encode')){
			return ["status"=>"Error","msg"=>"Required function not found [AptSafeTextDecode]","code"=>400];
		}
  		$ExceptWords = $EWords;
		foreach ($ExceptWords as $key => $value) {
			$Str = str_replace(AptUtf8Encode($value), $value, $Str);
		}
		return ["status"=>"Success","msg"=>$Str,"code"=>200];
	}
?>