<?php
class Controller
{
    public function invoke(){
        if($_GET['route']== ""){
            $this->home();
        }elseif($_GET['route']== 'listing'){
            $this->listing();
        }elseif($_GET['route']== 'login'){
            $this->login();
        }elseif($_GET['route']== 'postLogin'){
            $this->postLogin();
        }elseif($_GET['route']== 'register'){
            $this->register();
        }else{
            echo "404 Not Found";
        }
    }

    public function home(){
        include_once("views/home.php");
    }
    public function postLogin(){
        include_once("views/postLogin.php");
    }

    public function listing(){
        include_once ("views/Demo_database.php");
    }

    public function login(){
        include_once("views/login.php");
    }
    public function register(){
        include_once("views/register.php");
    }
}

$controller = new Controller();
$controller->invoke();