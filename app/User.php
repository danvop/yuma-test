<?php

namespace app;

class User extends Model
{
    protected $id;
    protected $name;
    protected $password;
    protected $email;
    protected $role;

    public function getId()
    {
        return $this->id;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function checkUserByEmail($email)
    {
        $sql = ("SELECT * FROM `users` WHERE `email`='{$email}'");
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'app\User');
        $stmt->execute();
        $ret = $stmt->fetch();
        if (!$ret) {
            throw new \Exception('User not found');
        }
        return $ret;
    }

}
