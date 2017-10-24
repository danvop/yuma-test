<?php

namespace app;

abstract class Model
{
    protected $pdo;
    protected $model;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
        $this->model = strtolower(substr(strrchr(static::class, "\\"), 1));
    }

    public function getModel()
    {
        return $this->model;
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
            $sql = ("
                SELECT 
                * 
                FROM 
                ". $this->getModel() ."s 
                ");
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert($parameters)
    {
        
        try {
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->getModel().'s',
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

    public function update($parameters)
    {   
        $items = null;
        foreach($_POST as $key => $value) {
        
        //
        $items .= "$key=:$key";
        $items .= ', ';
        $params[$key] = $value;
        
        }
if (!$items) die("Nothing to update");
echo $items . "\n"; // name=:name, email=:email
        try {
            $sql = sprintf('UPDATE %s SET %s WHERE ID = :'.$this->getModel().'Id', $this->getModel().'s', $items);
            //die(var_dump($sql));
            $parameters["{$this->getModel()}id"] = $_POST['id'];
            $statement = $this->pdo->prepare($sql);
        
            $statement->execute($parameters);
            //return true;
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            //return false;
        }
    }

    
}
