<?php
    
    // Get server port type (exampale - http:// or https://)
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        $HeaderSecureType = "https://";
    }else{
        $HeaderSecureType = "http://";
    }
    // Create Domain name and save it in const variable
    define("DomainName",  $HeaderSecureType.$_SERVER['HTTP_HOST']);

   if(EPASS != 'UwRxVTHAN6IeR3IZpLD8Tg8u2twZW56mN'){
       header("Location: " . RootPath . "Library/SiteComponents/PageNotFound/index.php"); die();
        exit();
    }
    function GetSubStringBetweenTwoCharacter($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	    //Use -> GetSubStringBetweenTwoCharacter($fullstring, '[tag]', '[/tag]');
	}
?>