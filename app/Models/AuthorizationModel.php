<?php

namespace Models;

use Core\Model;

class AuthorizationModel extends Model
{
    public $email;
    public $password;
    public $remember;
    public $dbh;

    /**
     * Specify the options for encrypting password.
     *
     * @var array $optionsForPass.
     */
    protected $optionsForPass = array('cost' => 13);

    public function setData($data)
    {
        if (!filter_var($data['email'] = $this->_testInput($data['email']), FILTER_VALIDATE_EMAIL) === false) {
                $this->email = $data['email'];
        }

        $this->password = $this->_testInput($data['password']);
        $this->password = password_hash($this->password, PASSWORD_BCRYPT, $this->optionsForPass);
        $this->remember = $this->_testInput($data['remember']);

        $this->dbh = $this->getConnect();

        return $this->_checkUser();
    }



    protected function _checkUser()
    {
        $user = new UserModel($this->dbh);
        if($user->loadByEmail($this->email) === TRUE) {
            if(($userPassword = $user->getPassword()) == $this->password) {
                setcookie("validate", "yes", time()+3600);
                return TRUE;
            } else {
                setcookie("validate", "no", time()+3600);
                return FALSE;
            }
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