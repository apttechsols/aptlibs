# aptlibs Php Pdo

# Include or require file to access function
1. require($_SERVER['DOCUMENT_ROOT'].'<---path of dir--->/Apt/Php/Pdo/Aes/AptPdoUpdateWithAes/index.php');

# How to call function
2. AptPdoInsertWithAes(['InsertData'=>"id::::12::,::status::::true::,::name::::apt::,::time::::".time(),'DbCon'=>$db_conn,'TbName'=> 'account', 'EPass'=> '1234567890','AcceptNullValue'=>false]);

# Parameters

# InsertData ->
    1. InsertData is required
        Like ->
            1. "id::::12" -> inset id is 12
            2. "id::::12::,::status::::true" -> insert is 12 and status is true

# DbCon ->
    DbCon is required and accept pdo database connaction

# TbName ->
    TbName is required and accept table name where we want perfom opertaion

# EPass ->
    EPass is required and accept a password which use in encoding and encrypting data in database

# AcceptNullValue ->
    1. By default it is set false
    2. If you want to insert null value also so you need to true value of AcceptNullValue

# Debug ->
    Function return response in object array form. ->
        1. whene status is Error or code is 400 then here is some error
        3. whene status is Success or code is 200 then all good