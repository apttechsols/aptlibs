<?php
	
	function AptPdoInsertWithAes($Data=array()){
		$AcceptNullValue = False;
		
		foreach ($Data as $key=>$value){
			${ $key } = $value;
		}
		
		if(!array_key_exists("InsertData",$Data) or !array_key_exists("DbCon",$Data) or !array_key_exists("TbName",$Data) or !array_key_exists("EPass",$Data) or $InsertData == '' or $DbCon == '' or $TbName == '' or $EPass == '' or ($AcceptNullValue != False && $AcceptNullValue != true)){
			return ["status"=>"Error","msg"=>"Invalid Data format detect [Apt Insert Data With Aes]","code"=>400];
		}
		
		$InsertDataArray = explode("::,::",$InsertData);
		$StmtPreapredData = array();
		$InsertDataOptions = array();
		$StmtInsertKey = '';
		$StmtInsertVal = '';
		foreach ($InsertDataArray as $value) {
			
			if(strpos($value, "::::") != false || $AcceptNullValue=true){
				$TmpInsertDataArray = explode("::::",$value);
			} else{
				return ["status"=>"Error","msg"=>"Null Insert Value not support without AcceptNullValue enable Code -1 [Apt Insert Data With Aes]","code"=>400]; exit();
			}
			
			if(preg_replace("/[^A-Za-z0-9_]/","",$TmpInsertDataArray[0]) !== ""){
				if(preg_replace("/^[ ]/","",$TmpInsertDataArray[1]) != "" || $AcceptNullValue === true){
					if(strtolower($TmpInsertDataArray[1]) == ''){
						$StmtInsertKey .= ', '.$TmpInsertDataArray[0];
						$StmtInsertVal .= ',null';
					}else{
						$StmtInsertKey .= ', '.$TmpInsertDataArray[0];
						$StmtInsertVal .= ', AES_ENCRYPT(:'.$TmpInsertDataArray[0].'InsertKey, :EPass)';
						$StmtPreapredData[$TmpInsertDataArray[0].'InsertKey'] = $TmpInsertDataArray[1];
					}
				}else{
					return ["status"=>"Error","msg"=>"Null Insert Value not support without AcceptNullValue enable Code -2 [Apt Insert Data With Aes]","code"=>400]; exit();
				}
			}else{
				return ["status"=>"Error","msg"=>"Invalid Insert Key detect [Apt Insert Data With Aes]","code"=>400]; exit();
			}
		}
		$StmtInsertKey = trim($StmtInsertKey,', ');
		$StmtInsertVal = trim($StmtInsertVal,', ');

		// Check and remove user if account created but Status is pending
		$stmt = $DbCon->prepare("INSERT INTO $TbName ($StmtInsertKey) VALUES ($StmtInsertVal)");

		$stmt->bindValue(":EPass", $EPass, PDO::PARAM_STR);
		foreach ($StmtPreapredData as $key=>$value) {
			$stmt->bindValue(":".$key, $value, PDO::PARAM_STR);
		}

		if($stmt->execute()){
			if($stmt->rowCount() > 0){
				return ["status"=>"Success","msg"=>'Data Insert Successfully [Apt Insert Data With Aes]',"code"=>200];
			}else{
				return ["status"=>"Success","msg"=>'Data Insert Proccess done but data not inserted [Apt Insert Data With Aes]','reason'=>json_encode($stmt->errorinfo()),"code"=>404];
			}
		}else{
			return ["status"=>"Error","msg"=>"Data Not Insert due to technical error [Apt Insert Data With Aes]",'debug'=>"INSERT INTO $TbName ($StmtInsertKey) VALUES ($StmtInsertVal)",'reason'=>json_encode($stmt->errorinfo()),"code"=>400];
		}
	}
?>