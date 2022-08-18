<?php 
require_once(dirname(__FILE__) . '/../config/config.php');
function DBconnect()
{
    $dsn = 'mysql:host=localhost;dbname='. DBNAME . ';charset=utf8';
    $option =[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true, PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ];
    $pdo = null;
    
    try{
        $pdo = new PDO ($dsn, BDUSER, DBPWD, $option);
    } catch (PDOException $ex) {
        echo 'erreur de connexion à la connexion de base de donnée' . $ex->getMessage();
    }
    return $pdo;
}

