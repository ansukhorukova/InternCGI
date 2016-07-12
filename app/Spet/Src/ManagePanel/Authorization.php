<?php

namespace Spet\ManagePanel;

require_once '../../vendor/Autoloader.php';

$loader = new \Autoloader\Psr4Autoloader;

use Spet\Orm\User;

class Authorization
{
    public $email;
    public $password;
    public $remember;

    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                $this->email = $_POST['email'];
            }
            $this->password = $this->_testInput($_POST['password']);
            $this->remember = $this->_testInput($_POST['remember']);
        }
    }

    protected function _testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
