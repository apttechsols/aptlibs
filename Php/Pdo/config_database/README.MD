# aptlibs Php Pdo

# Include or require file to access function
1. require($_SERVER['DOCUMENT_ROOT'].'<---path of dir--->/Apt/Php/Pdo/config_database/system_db_conn.php');

# How to use function
    $db_conn = new system_db_conn(['host'=>db_host,'name'=>db_name,'user'=>db_user,'pass'=>db_pass]);
    $db_conn = $SystemDbConn->get_conn();
    if($db_conn['status'] != true){
        echo 'Connection failed';
        echo 'Reason : '.$db_conn['data'];
    }else{
        $db_conn = $db_conn['data'];
        echo 'Connection stablished succesfully';
    }