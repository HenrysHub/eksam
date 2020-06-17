<?php

class Session
{
    private $logged_in = false;
    public $user_id;
    public $group;
    public $message;
    public $language;

    function __construct() {
        session_start();
        $this->check_login();
        $this->check_message();

    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    private function check_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->group = $_SESSION['group'];
            $this->language = $_SESSION['language'];
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->language = $_REQUEST['language'];
            $this->logged_in = false;
        }
    }

    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    public function message ($msg = ""){
        if(empty($msg)) {
            return $this->message;
        } else {
            $_SESSION['message'] = $msg;
        }
    }

    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user->ID;
            $this->group = $_SESSION['group'] = $user->group_rights;

            $this->language = $_SESSION['language'] = 'en';
            $this->logged_in = true;
        }
    }

    public function logout() {
        session_unset();
        unset($this->user_id);
        $this->logged_in = false;
    }

    public function access ($page) {

        pd($this);

        //if admin
        if ($this->group === 'admin') {
            return true;
        }elseif ($this->group === 'moderator') {

            /*moderator
           ->      cars, edit-car, add-car, delete-car,
                   categories, edit-category, add-category, delete-category*/

            $allowedPages = ['home', 'logout', 'cars', 'edit-car', 'add-car', 'delete-car',
                'categories', 'edit-category', 'add-category', 'delete-category'];
            if (in_array($page, $allowedPages)) {
                return true;
            }

        } elseif ($this->group === 'user') {

            /*user
            ->      cars, edit-car, add-car, delete-car -> by his ID*/

            $allowedPages = ['home', 'logout', 'cars', 'edit-car', 'add-car', 'delete-car'];
            if (in_array($page, $allowedPages)) {
                return true;
            }
        }

        return false;

    }

    public function Lang () {
        $this->language = $_REQUEST['language'];
    }
}

$session = new Session();
$message = $session->message();