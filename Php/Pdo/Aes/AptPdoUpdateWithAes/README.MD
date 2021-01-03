# aptlibs Php Pdo

# Include or require file to access function
1. require($_SERVER['DOCUMENT_ROOT'].'<---path of dir--->/Apt/Php/Pdo/Aes/AptPdoUpdateWithAes/index.php');

# How to call function
2. AptPdoUpdateWithAes(['Update'=>"name::::apt",'Condtion'=>"id::::12",'DbCon'=>$db_conn,'TbName'=>'account','EPass'=>'1234567890']);

# Parameters

# condtion ->
    1. Condtion for update data according condtion
        Like ->
            1. "id::::12" -> Where id is 12
            2. "id::::12::,::status::::true" -> Where is is 12 (and / or) status is true
        
        # Note ->
            Not give parameter condtion if you want perform action fo all rows

# Update ->
    Update is required ->
        1. 'name::::apt' -> update name as apt where condtion match

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

# Debug ->
    Function return response in object array form. ->
        1. whene status is Error or code is 400 then here is some error, use reason key to show error reason
        1. whene status is Error or code is 404 then condtion match but no data update
        3. whene status is Success or code is 200 then all good