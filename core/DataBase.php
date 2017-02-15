<?php

namespace Core;

use PDO;
use PDOException;

class DataBase
{
    public static function getDataBase()
    {
        $conf = include_once __DIR__ . "/../app/database.php";

        if($conf['driver'] == 'sqlite'){

            $sqlite = __DIR__ . "/../storage/database/" . $conf['sqlite']['database'];
            $sqlite = "sqlite:" . $sqlite;

            try{
                $pdo = new PDO($sqlite);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            }catch (PDOException $e){
                echo $e->getMessage();
            }

        }elseif($conf['driver'] == 'mysql'){

            $host = $conf['mysql']['host'];
            $db = $conf['mysql']['database'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['pass'];
            $charset = $conf['mysql']['charset'];
            $collation = $conf['mysql']['collation'];

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

}