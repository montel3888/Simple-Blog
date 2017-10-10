<?php

namespace app\models;

use hc\core\base\Model;

class User extends Model {

    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ]; 
    public function login(){
        $login = !empty(trim($_POST['username'])) ? trim($_POST['username']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            $user = \R::findOne('admin', 'login = ? LIMIT 1', [$login]);
            if($user){
                if(password_verify($password, $user->password)){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

}