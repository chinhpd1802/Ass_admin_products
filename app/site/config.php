<?php   

try {
    //code...
   
    define('DB_HOST','fdb25.runhosting.com');
    define('DB_USER','3190142_shopvtc');
    define('DB_PASSWORD','Shop123@vtconline');
    define('DB_NAME','3190142_shopvtc');
    define('DB_PORT','3306');

       // make the connection

       $mysql= new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);

       //set the encoding optional but recommended
   
       $mysql -> set_charset("utf8");

    //checkn connection

    if ($mysql->connect_error) {
        # code...
        die("connection failed: " . $mysql->connect_error);
    }
 
} catch (Exception $th) {
   
    echo 'Caught Exception: ', $th->getMessage(),"\n";
}

?>