<?php
	/*
	*@filename AptPdoUpdateWithAes/index.php
	*@des It return data if Data exist otherwise it return error
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
	
	if(!defined('EPASS') or EPASS != 'UwRxVTHAN6IeR3IZpLD8Tg8u2twZW56mN'){
		function AptPdoUpdateWithAes($Data=array()){
			return ['status'=>'Error','data'=>'Autenication failed [Apt Update With Aes]','code'=>401]; die(); exit();
		}
	}else{
	
		function AptPdoUpdateWithAes($Data=array()){
			$DefaultCheckFor = 'All'; $DefaultCheckType = 'Equal'; $AcceptNullCondtion = False; $AcceptNullUpdate = False;
			foreach ($Data as $key=>$value){
				${ $key } = $value;
			}

			if(!array_key_exists("Update",$Data) or !array_key_exists("DbCon",$Data) or !array_key_exists("TbName",$Data) or !array_key_exists("EPass",$Data) or $Update == '' or $DbCon == '' or $TbName == '' or $EPass == ''  or $DefaultCheckFor == '' or $DefaultCheckType == '' or ($AcceptNullCondtion != False and $AcceptNullCondtion != true) or ($AcceptNullUpdate != False && $AcceptNullUpdate != true)){
				return ["status"=>"Error","msg"=>"Invalid Data format detect [Apt Update With Aes]","code"=>400];
			}

			if($Limit != preg_replace("/[^0-9]/","",$Limit)){
				return ["status"=>"Error","msg"=>"Invalid limit detect [Apt Update With Aes]","code"=>400];
			}
			if($Condtion != ''){
				// Get Condtion data in array
				$CondtionArray = explode("::,::",$Condtion);
				$CondtionKeyAndValue = array();
				$i = 0;
				if($CondtionArray[0] == ''){
					return ["status"=>"Error","msg"=>"Invalid Condtion detect [Apt Fetch Data With Aes]","code"=>400];
				}
				if($DefaultCheckFor == 'Any'){
					$DefaultCheckForSym = ' || ';
				}else{
					$DefaultCheckForSym = ' && ';
				}
				foreach ($CondtionArray as $value){
					$TempCheckType = ''; $TempCheckFor = '';
					$i++;
					$TmpCondtionArray = explode("::::",$value);
					if($TmpCondtionArray[2] != '' || $TmpCondtionArray[3] != ''){
						if($TmpCondtionArray[2] == 'Equal' || $TmpCondtionArray[2] == 'NotEqual' || $TmpCondtionArray[2] == 'LikeVal' || $TmpCondtionArray[2] == 'ValLike' || $TmpCondtionArray[2] == 'LikeValLike' || $TmpCondtionArray[2] == 'Grater' || $TmpCondtionArray[2] == 'Lower'){
							$TempCheckType = $TmpCondtionArray[2];
						}else{
							$TempCheckFor = $TmpCondtionArray[2];
						}
						
						if($TmpCondtionArray[3] == 'Equal' || $TmpCondtionArray[3] == 'NotEqual' || $TmpCondtionArray[3] == 'LikeVal' || $TmpCondtionArray[3] == 'ValLike' || $TmpCondtionArray[3] == 'LikeValLike' || $TmpCondtionArray[3] == 'Grater' || $TmpCondtionArray[3] == 'Lower'){
							if($TempCheckType == ''){ $TempCheckType = $TmpCondtionArray[3]; }
						}else{
							if($TempCheckFor == ''){ $TempCheckFor = $TmpCondtionArray[3]; }
						}

						if($TempCheckFor == ''){
							$TempCheckFor = $DefaultCheckFor;
						}
						if($TempCheckType == ''){
							$TempCheckType = $DefaultCheckType;
						}
					}else{
						$TempCheckType = $DefaultCheckType;
						$TempCheckFor = $DefaultCheckFor;
					}

					if($TempCheckType != 'Equal' && $TempCheckType != 'NotEqual' && $TempCheckType != 'LikeVal' && $TempCheckType != 'ValLike' && $TempCheckType != 'LikeValLike' && $TempCheckType != 'Grater' && $TempCheckType != 'Lower'){
						return ["status"=>"Error","msg"=>"Invalid Check Type detect! [Apt Update With Aes]","code"=>400];
					}

					if($TempCheckFor != 'Any' && $TempCheckFor != 'All'){
						return ["status"=>"Error","msg"=>"Invalid Check For detect! [Apt Update With Aes]","code"=>400];
					}

					if(strpos($value, "::::") !== False || $AcceptNullCondtion == true){
					   // Code
					} else{
					   return ["status"=>"Error","msg"=>"Invalid given data format detect! [Apt Update With Aes]","code"=>400];
					}

					if(preg_replace("/[^A-Za-z0-9_]/","",$TmpCondtionArray[0]) !== "" && preg_replace("/[^A-Za-z0-9_]/","",$TmpCondtionArray[0]) == $TmpCondtionArray[0] && (preg_replace("/^[ ]/","",$TmpCondtionArray[1]) !== "" || $AcceptNullCondtion == true)){
						if(strtolower($TmpCondtionArray[1]) == 'null' && ($TempCheckFor == 'LikeVal' || $TempCheckFor == 'ValLike' || $TempCheckFor == 'LikeValLike')){
							return ["status"=>"Error","msg"=>"Null condtion value  not support with LikeVal, ValLike or LikeValLike [Apt Update With Aes]","code"=>400];
						}
					}else{
						return ["status"=>"Error","msg"=>"Null key not support and value not support without AcceptNullCondtion [Apt Update With Aes]","code"=>400];
					}

					if($i > 1){
						if($PreCheckFor != $TempCheckFor){
							$PreCondtionString .= '('.$CondtionString.")$DefaultCheckForSym";
							$CondtionString = '';
						}
					}
					
					if($TempCheckFor == 'Any'){
						if($TempCheckType == 'Equal'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' || '. $TmpCondtionArray[0]." is null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' || '. $TmpCondtionArray[0]." = ''";
							}else{
								$CondtionString .= ' || '. $TmpCondtionArray[0]." = AES_ENCRYPT(:".$TmpCondtionArray[0].$i."Srh, :EPass)";
							}
							
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'NotEqual'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' || '. $TmpCondtionArray[0]." is not null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' || '. $TmpCondtionArray[0]." != ''";
							}else{
								$CondtionString .= ' || '. $TmpCondtionArray[0]." != AES_ENCRYPT(:".$TmpCondtionArray[0].$i."Srh, :EPass)";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'LikeVal' || $TempCheckType == 'ValLike' || $TempCheckType == 'LikeValLike'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString = $TmpCondtionArray[0]." LIKE null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString = $TmpCondtionArray[0]." LIKE ''";
							}else{
								$CondtionString .= ' || '. "lower(CONVERT(AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) USING latin1)) LIKE :".$TmpCondtionArray[0].$i.'Srh';
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								if($TempCheckType == 'LikeVal'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>'%'.$TmpCondtionArray[1]));
								}else if($TempCheckType == 'ValLike'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1].'%'));
								}else if($TempCheckType == 'LikeValLike'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>'%'.$TmpCondtionArray[1].'%'));
								}
							}
						}else if($TempCheckType == 'Grater'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > ''";
							}else{
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > :".$TmpCondtionArray[0].$i."Srh";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'Lower'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < ''";
							}else{
								$CondtionString .= ' || '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < :".$TmpCondtionArray[0].$i."Srh";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}
						$CondtionString = trim($CondtionString, ' || ');
					}else{
						
						if($TempCheckType == 'Equal'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' && '. $TmpCondtionArray[0]." is null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' && '. $TmpCondtionArray[0]." = ''";
							}else{
								$CondtionString .= ' && '. $TmpCondtionArray[0]." = AES_ENCRYPT(:".$TmpCondtionArray[0].$i."Srh, :EPass)";
							}
							
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'NotEqual'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' && '. $TmpCondtionArray[0]." is not null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' && '. $TmpCondtionArray[0]." != ''";
							}else{
								$CondtionString .= ' && '. $TmpCondtionArray[0]." != AES_ENCRYPT(:".$TmpCondtionArray[0].$i."Srh, :EPass)";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'LikeVal' || $TempCheckType == 'ValLike' || $TempCheckType == 'LikeValLike'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString = $TmpCondtionArray[0]." LIKE null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString = $TmpCondtionArray[0]." LIKE ''";
							}else{
								$CondtionString .= ' && '. "lower(CONVERT(AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) USING latin1)) LIKE :".$TmpCondtionArray[0].$i.'Srh';
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								if($TempCheckType == 'LikeVal'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>'%'.$TmpCondtionArray[1]));
								}else if($TempCheckType == 'ValLike'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1].'%'));
								}else if($TempCheckType == 'LikeValLike'){
									array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>'%'.$TmpCondtionArray[1].'%'));
								}
							}
						}else if($TempCheckType == 'Grater'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > ''";
							}else{
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) > :".$TmpCondtionArray[0].$i."Srh";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}else if($TempCheckType == 'Lower'){
							if(strtolower($TmpCondtionArray[1]) == 'null'){
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < null";
							}else if($TmpCondtionArray[1] == ''){
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < ''";
							}else{
								$CondtionString .= ' && '. "AES_DECRYPT(".$TmpCondtionArray[0].", :EPass) < :".$TmpCondtionArray[0].$i."Srh";
							}
							if(strtolower($TmpCondtionArray[1]) != 'null' && $TmpCondtionArray[1] != ''){
								array_push($CondtionKeyAndValue, array($TmpCondtionArray[0].$i.'Srh'=>$TmpCondtionArray[1]));
							}
						}
						$CondtionString = trim($CondtionString, ' && ');
					}
					$PreCheckFor = $TempCheckFor;
				}
			}else if($AcceptNullCondtion == true){
				$CondtionString = '0=0';
				$CondtionKey = array();
				$CondtionValue = array();
			}else{
				return ["status"=>"Error","msg"=>"Null Condtion not support without AcceptNullCondtiont enable [Apt Update With Aes]","code"=>400];
			}

			$PreCondtionString .= $CondtionString;
			$CondtionString = trim($PreCondtionString, ' || ');
			$CondtionString = trim($PreCondtionString, ' && ');

			$UpdateArray = explode("::,::",$Update);
			$UpdateKeyAndValue = array();
			$i = 0;
			foreach ($UpdateArray as $value){
				$IncrementOrDecrement = false;
				if($value == ''){
					return ["status"=>"Error","msg"=>"Invalid Update data detect [Apt Update With Aes]","code"=>400];
				}

				if(strpos($value, "::::") !== false || $AcceptNullUpdate == true){
				   $TmpUpdateArray = explode("::::",$value);
				}else{
				   return ["status"=>"Error","msg"=>"Invalid Update data detect [Apt Update With Aes]","code"=>400];
				}

				if($TmpUpdateArray[2] != ''){
					if(strtolower($TmpUpdateArray[2]) == 'increment'){
						if(preg_replace("/[^0-9]/","",$TmpUpdateArray[1]) != $TmpUpdateArray[1]){
							return ["status"=>"Error","msg"=>"Invalid Increment value detect [Apt Update With Aes]","code"=>400];
						}
						$IncrementOrDecrement = ' + '.$TmpUpdateArray[1];
					}else if(strtolower($TmpUpdateArray[2]) == 'decrement'){
						if(preg_replace("/[^0-9]/","",$TmpUpdateArray[1]) != $TmpUpdateArray[1]){
							return ["status"=>"Error","msg"=>"Invalid Decrement value detect [Apt Update With Aes]","code"=>400];
						}
						$IncrementOrDecrement = ' - '.$TmpUpdateArray[1];
					}else{
						return ["status"=>"Error","msg"=>"Invalid Update data detect [Apt Update With Aes]","code"=>400];
					}
				}else{
					$IncrementOrDecrement = false;
				}

				$i++;
				
				if(preg_replace("/[^A-Za-z0-9_]/","",$TmpUpdateArray[0]) !== ""){
					if(preg_replace("/^[ ]/","",$TmpUpdateArray[1]) !== "" || $AcceptNullUpdate == true){
						if($IncrementOrDecrement != false){
							$UpdateString = $UpdateString.', '.$TmpUpdateArray[0] . ' = AES_ENCRYPT(AES_DECRYPT('.$TmpUpdateArray[0].', :EPass)'.$IncrementOrDecrement.', :EPass)';
						}else{
							$UpdateString = $UpdateString.', '.$TmpUpdateArray[0] . ' = AES_ENCRYPT(:'.$TmpUpdateArray[0].$i.'Upd, :EPass)';
							array_push($UpdateKeyAndValue, array($TmpUpdateArray[0].$i.'Upd'=>$TmpUpdateArray[1]));
						}
					}else{
						return ["status"=>"Error","msg"=>"You can not use null value without AcceptNullUpdate enable in Update data [Apt Update With Aes]","code"=>400];
					}
				}else{
					return ["status"=>"Error","msg"=>"You can not use null column in Update data [Apt Update With Aes]","code"=>400];
				}
			}
			$UpdateString = trim($UpdateString,', ');
			if($DataOrder != ''){
				$TempDataOrder = explode('|', $DataOrder);
				if($TempDataOrder[0] != 'ASC' && $TempDataOrder[0] != 'DESC'){
					return ["status"=>"Error","msg"=>"Invalid Data Order format detect [Apt Fetch Data With Aes]","code"=>400];
				}else{
					$DataOrderType = $TempDataOrder[0];
					if($TempDataOrder[1] != ''){
						$DataOrderByColumn = "AES_DECRYPT(".$TempDataOrder[1].", :EPass)";
					}else{
						return ["status"=>"Error","msg"=>"Invalid Data Order format detect [Apt Fetch Data With Aes]","code"=>400];
					}
				}
				$FormatDataOrder = " ORDER BY $DataOrderByColumn $DataOrderType";
			}else{
				$FormatDataOrder = "";
			}

			if($OFFSET != preg_replace("/[^0-9]/","",$OFFSET)){
				return ["status"=>"Error","msg"=>"Invalid OFFSET detect [Apt Update With Aes]","code"=>400];
			}

			$UpdateStr = "UPDATE $TbName SET $UpdateString Where $CondtionString";

			if($FormatDataOrder != ''){ $UpdateStr .= $FormatDataOrder; }
			if($Limit != ''){ $UpdateStr .= " LIMIT $Limit"; }
			if($OFFSET != ''){ $UpdateStr .= " OFFSET $OFFSET"; }
			
			// Check and remove user if account created but Status is pending
			$stmt = $DbCon->prepare($UpdateStr);
			$stmt->bindValue(":EPass", $EPass, PDO::PARAM_STR);
			foreach ($CondtionKeyAndValue as $value) {
				foreach ($value as $key_1 => $value_1) {
					$stmt->bindValue(':'.$key_1 , $value_1);
				}
			}
			
			foreach ($UpdateKeyAndValue as $value) {
				foreach ($value as $key_1 => $value_1) {
					$stmt->bindValue(':'.$key_1 , $value_1, PDO::PARAM_STR);
				}
			}
			
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					return ["status"=>"Success","msg"=>'Data Update Successfully [Apt Update With Aes]','updaterows'=>$stmt->rowCount(),"code"=>200];
				}else{
					return ["status"=>"Error","msg"=>"Data Not Update [Apt Update With Aes]",'updaterows'=>0,'reason'=>json_encode($stmt->errorinfo()),"code"=>404];
				}
			}else{
			    return ["status"=>"Error","msg"=>"Update process not execute [Apt Update With Aes]",'reason'=>json_encode($stmt->errorinfo()),"code"=>400];
			}
		}
	}
?>