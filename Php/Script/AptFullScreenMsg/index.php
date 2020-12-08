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
		foreach (get_defined_vars() as $SetVarKey=>$SetVarVal){ unset($$SetVarKey); } unset($SetVarKey,$SetVarVal);
		echo json_encode(['status'=>'Error','msg'=>'Authentication failed [Apt Full Screen Msg]','code'=>400]); exit();
	}

	if($IsLogin['code'] != 200){
		$AptHomeUrl = DomainName;
	}else if($IsLogin['LAS'] == 'Main'){
		$AptHomeUrl = DomainName.'/Dashboard/Main/index.php';
	}else if($IsLogin['LAS'] == 'Partner'){
		$AptHomeUrl = DomainName.'/Dashboard/Partner/index.php';
	}else{
		$AptHomeUrl = DomainName;
	}
	echo "<style>.AptFullScreenMsgHome{display:'block';}</style>\n";

	echo "<a href='".$AptHomeUrl."' class='AptFullScreenMsgHome' id='AptFullScreenMsgHome' style='color:#fff;font-weight:bold;font-size:20px;border:2px solid #fff; padding:5px 45px;border-radius:5px;cursor:pointer;text-decoration:none;display:none;position: fixed;z-index: 100;text-align: center;bottom: 20;margin-left: calc(50% - 56px);'>Home</a>\n";

	function AptFullScreenMsg($AptFullScreenMsgData = array()){
		echo "<script>document.getElementById('AptFullScreenMsgHome').style.display = 'block';</script>";
		$msg = 'No Message Found'; $exit = true;
		foreach($AptFullScreenMsgData as $AptFullScreenMsgDatakey => $AptFullScreenMsgDatavalue){ ${strtolower($AptFullScreenMsgDatakey)} = $AptFullScreenMsgDatavalue; }
		
		$textalign='center'; $position='fixed'; $padding='0px'; $margin='0px'; $top='0px'; $right='0'; $bottom='0'; $left='0'; $background = '#224579 !important'; $z_index=20;

		$msgtextalign='center'; $msgpadding='0px'; $msgmargin='45vh 0px'; $msgcolor='#fff'; $msgfontsize = '20px'; $msgfontweight = 'bold';
		foreach ($style as $key => $value) {
			${strtolower($key)} = $value;
		}
		echo "<div style='width:100vw; height:100vh; z-index: ".$z_index."; background: ".$background."; position: ".$position."; padding: ".$padding."; margin: ".$margin."; top: ".$top."; right: ".$right."; bottom: ".$bottom."; left: ".$left."; text-align: ".$textalign."'>
			<p style='color:".$msgcolor."; font-size: ".$msgfontsize."; font-weight: ".$msgfontweight."; padding: ".$msgpadding."; margin: ".$msgmargin."; text-align: ".$msgtextalign.";'> $msg </p>
		</div>";
		if($exit == true){
			exit();
		}
	}
?>