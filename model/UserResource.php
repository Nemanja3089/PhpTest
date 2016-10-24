<?php

class UserResource
{

    public $user_id, $name, $email, $pass, $salarie, $created_at, $updated_at;

    public function setSess()
    {
        Session::set("user_id", $this->user_id);
        Session::set("name", $this->name);
        Session::set("email", $this->email);
        Session::set("created_at", $this->created_at);
        Session::set("updated_at", $this->updated_at);
        Session::set("salarie", $this->salarie);

    }

    public static function login($name, $email, $pass)
    {

        $conn    = Db::getInstance();
        $shaPass = hash("SHA256", $pass);
        $query   = $conn->prepare("SELECT * FROM users WHERE name = :name AND email = :email AND password = :password ");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $shaPass);
        $query->execute();

        if ($query->rowCount() == 1) {
            $users = $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
            foreach ($users as $user) {
                $user->setSess();
            }
            
            return $user;
        } else {
            return false;
        }
    }
    public static function register($param)
    {

        $shaPass = hash("SHA256", $param['password']);

        $obj           = new User;
        $obj->name     = ucfirst($param['name']);
        $obj->email    = $param['email'];
        $obj->salarie  = $param['salarie'];
        $obj->password = $shaPass;
        $obj->save();

        if (count($obj) > 0) {
            foreach ($obj as $k => $v) {
                Session::set($k, $v);
            }
            unset($_SESSION['password']);
            return $_SESSION;
        } else {
            return false;
        }

    }

    public static function emailExists($email)
    {

        $conn  = Db::getInstance();
        $query = $conn->prepare('SELECT user_id FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
