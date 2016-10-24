<?php


class UserController
{
    public $layout = 'index';

    public function index()
    {
        ob_start();
        include "view/" . $this->layout . ".html";
        $index = ob_get_clean();
        echo $index;
    }

    public function login()
    {
        $test = array_filter($_POST);

        $login_data = array();
        header("Content-type: application/json");

        if (isset($test['name']) && !ctype_alpha($test['name'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'name' => 'The data does not consist of all letters.'));
            die();
        }
        if (isset($test['email']) && !filter_var($test['email'], FILTER_VALIDATE_EMAIL)) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'email' => 'Please enter a valid email address.'));
            die();
        }

        if (isset($test['password']) && !ctype_alnum($test['password'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'password' => 'The data does not consist of all letters or digits.'));
            die();
        }

        if (count($test) == 3) {
            #ensure that fields is not empty, in case that fields is empty we send  message back to user

            $login_data['user'] = UserResource::login($test['name'], $test['email'], $test['password']);

            if ($login_data['user']) {
                echo json_encode($login_data);
            } else {

                header('HTTP/1.1 403 Unauthorized action');
                echo json_encode(array('code' => 404, 'user' => 'Wrong credentials.'));
                die();
            }
        } else {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'user' => 'Missed credentials.'));
            $login_data['user'] = 'Missed credentials';
            die();
        }
    }
    public function register()
    {
        $param = array_filter($_POST);

        header("Content-type: application/json");

        if (isset($param['name']) && !ctype_alpha($param['name'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'name' => 'The data does not consist of all letters.'));
            die();
        }
        if (isset($param['salarie']) && !ctype_digit($param['salarie'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'salarie' => 'The data does not consist of all digits.'));
            die();
        }
        if (isset($param['email']) && !filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'email' => 'Please enter a valid email address.'));
            die();
        }

        if (isset($param['password']) && !ctype_alnum($param['password'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'password' => 'The data does not consist of all letters or digits.'));
            die();
        }
        if (isset($param['password2']) && !ctype_alnum($param['password2'])) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 404, 'password' => 'The data does not consist of all letters or digits.'));
            die();
        }
        if ($param['password'] !== $param['password2']) {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('password' => 'Passwords do not match.'));
            die();
        }

        if (count($param) == 5) {

            $data['user'] = UserResource::register($param);

            if ($data['user']) {
                echo json_encode($data);
            } else {
                header('HTTP/1.1 403 Unauthorized action');
                echo json_encode(array('message' => 'Fail with registration try again.'));
                die();
            }
        }
    }

    public function getUsers()
    {
        header("Content-type: application/json");

        if (self::logged()) {
            $users = User::allUsers();

            if (count($users) > 0) //This count object and see if is empty
            {
                echo json_encode($users, JSON_NUMERIC_CHECK);
                //Avoid problems with num value use JSON_NUMERIC_CHECK
            } else {
                header('HTTP/1.1 404 Not Found'); 
                echo json_encode(array(
                    'code'    => 404,
                    'message' => "Sorry but we couldn’t find the page you are looking for",
                )
                );
            }

        } else {
            header('HTTP/1.1 403 Unauthorized action');
            echo json_encode(array('code' => 403, 'message' => 'Please Sign-in to continue...'));
        }
    }
    public static function logged()
    {
        if (Session::get('email')) {
            return true;
        }
        return false;
    }
    public function logOut()
    {
       
        Session::stop();
    }
}
