<?php

namespace app;

use core\App;

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

        $dbConfig = App::get('config')['database'];
        try {
            return new \PDO(
                "mysql:dbname={$dbConfig['name']};host={$dbConfig['host']}",
                $dbConfig['username'],
                $dbConfig['password'],
                $dbConfig['options']
            );
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

    public function fetchFilt($filtQuery, $filtBy)
    {
        $sql = sprintf(
            'SELECT 
            * 
            FROM %s
            WHERE %s LIKE ?',
            $this->getModel().'s',
            $filtBy
            );
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array("%{$filtQuery}%"));
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    
    public function store($parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $this->getModel().'s',
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
    
        $statement->execute($parameters);
    }

    public function update($parameters)
    {
        
        try {
            foreach ($parameters as $key => $value) {
                if ($key == 'id') {
                    continue;
                }
                $set[] = $key .' = :'. $key;
            }

            $set = implode(', ', $set);
               
            $sql = sprintf(
                "UPDATE %s
                SET %s 
                WHERE id = :id",
                $this->getModel().'s',
                $set
            );

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
            try {
            $sql = sprintf(
                'DELETE FROM %s WHERE id = :id',
                static::getModel().'s'
                
            );

            $statement = $this->pdo->prepare($sql);
        
            $statement->execute(['id' => $id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    

    

//    
}
