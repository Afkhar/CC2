<?php
function connect2db ()
{
    $conn = null;
    $username = 'root';
    $password = null;
    $databaseName = 'channeldoc_lk'; //Add your database Name
    $servername= 'localhost';

    //data source Name
    $dsn = "mysql:host=$servername; dbname=$databaseName";
    $options = [    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                   // PDO::ATTR_DEFAULT-FETCH-MODE => PDO::ERRMODE_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                    //PDO::ATTR_PRESISTENT => true,
                ];  

    try 
    {
        $conn = new PDO ($dsn, $username, $password, $options);
        //echo "Connected to Database. $dsn";
    }
    catch (PDOException $e) 
    {
        //Catch Exception (errors)
        throw new PDOException ($e->getMessage(),(int)$e->getCode());

    }
    return $conn;
}