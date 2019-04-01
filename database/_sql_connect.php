<?php
// constantes
$path = dirname(__DIR__);
require_once $path."/config/const.php";

function cx_bench($database) {
    try {
        $conn = new PDO(SQL_TYPE.':'.SQL_HOST.'='.SQL_USER.'port='.SQL_PORT.';dbname='.SQL_BENCH, SQL_USER,SQL_PASS,array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_EMULATE_PREPARES => false,
            )
        );
    return $conn;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return false;
    }
}

function verfy_tb($table) {
    try {
        $result = cx_bench("mailtool")->query("SELECT 1 FROM $table LIMIT 1");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }
    return $result !== FALSE;
}
    
    // conectando ao sql
    // $pdo = new cx_bench("root","vfbr1101","mysql","localhost","bteste","3306");
    // $cx = $pdo->cx_bench();
?>