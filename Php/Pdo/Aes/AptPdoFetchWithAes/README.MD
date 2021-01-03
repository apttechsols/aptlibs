# aptlibs Php Pdo

# Include or require file to access function
1. require($_SERVER['DOCUMENT_ROOT'].'<---path of dir--->/Apt/Php/Pdo/Aes/AptPdoFetchWithAes/index.php');

# How to call function
2. AptPdoFetchWithAes(['Condtion'=> "username::::apt::,::email::::admin@apt.com",'FetchData'=>'name::::mobile' ,'DbCon'=> $db_connection, 'TbName'=> 'account', 'EPass'=> '1234567890','DefaultCheckFor'=>'Any','FetchRowNo'=>'All']);

# Parameters

# condtion ->
    1. Condtion for fetch data according condtion
        Like ->
            1. "id::::12" -> Where id is 12
            2. "id::::12::,::status::::false" -> Where is is 12 (and / or) status is false
        
        # Note ->
            Not give parameter condtion if you want perform action fo all rows

# FetchData ->
    FetchData is optional ->
        1. 'name::::mobile' -> featch name and mobile  where condtion match

# DbCon ->
    DbCon is required and accept pdo database connaction

# TbName ->
    TbName is required and accept table name where we want perfom opertaion

# EPass ->
    EPass is required and accept a password which use in encoding and encrypting data in database

# DefaultCheckFor ->
    DefaultCheckFor is optional -> accept (All, Any)
        1. By default it is set on ALL
        2. All for and condtion between all condtions
        2. Any for or condtion between all condtions

# FetchRowNo ->
    1. FetchRowNo set All to fetch all rows
    1. Otherwise it retun only one row

# Debug ->
    Function return response in object array form. ->
        1. whene status is Error or code is 400 then here is some error, use reason key to show error reason
        2. whene status is Error or code is 404 then no result found with this condtion
        3. whene status is Success or code is 200 then all good