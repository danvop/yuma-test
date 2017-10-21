<?php

namespace app;

class User
{
    protected $name;
    protected $password;
    protected $email;
    protected $role;

    /**
     * [$pdo description]
     * @var [type]
     */
    protected $pdo;

    /**
     * return specific User table PDO
     */
    public function __construct()
    {
        $this->pdo = $this->getConnection();
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
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            'users',
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        try {
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            // dd($e);
            //die($e->getMessage());
            echo "<p>Dublicate entry email. Please enter again</p>";
        }

    }

    /**
     * connect to databas4e
     * @return PDO connection
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


//
}
