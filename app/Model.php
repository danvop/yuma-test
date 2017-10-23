<?php

namespace app;

abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    /**
    * return specific table PDO
    */
    protected function getConnection()
    {
        $username = 'homestead';
        $password = 'secret';
        $host = 'localhost';
        $db = 'yuma';
        $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];
        
        try {
            return new \PDO("mysql:dbname=$db;host=$host", $username, $password, $options);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function fetchAll()
    {
            $sql = ("SELECT * FROM users ");
                    
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert($parameters)
    {
        try {
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                'users',
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );
            $statement = $this->pdo->prepare($sql);
        
            $statement->execute($parameters);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
