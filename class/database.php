<?php 
    
    $host = '149.62.37.37';
    $db   = 'u957426041_teste_lucas';
    $user = 'u957426041_teste_lucas';
    $pass = 'o|4V2=sl';
    $port = "3306";
    $charset = 'utf8mb4';
    
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

    try {
        $db = new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        echo $e->getMessage();
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }