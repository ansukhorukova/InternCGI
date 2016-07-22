<?php

namespace Models;

use Core\Model;
use Lib\Validate;

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
    protected $optionsForPass = array('cost' => 7);

    public function setData($data)
    {
        $validate = new Validate();

        if (!filter_var($data['email'] = $validate->validateClear($data['email']), FILTER_VALIDATE_EMAIL) === false) {
            $this->email = $data['email'];
        } else {
            $this->_setSession('no');
            return false;
        }

        $this->password = $validate->validateClear($data['password']);
        $this->optionsForPass['salt'] = 'D/vtVeH03t213d!@$' . strrev($this->password);
        $this->password = password_hash($this->password, PASSWORD_BCRYPT, $this->optionsForPass);
        $this->remember = $validate->validateClear($data['remember']);

        $this->dbh = $this->getConnect();

        $user = new UserModel($this->dbh);
        if($user->loadByEmail($this->email) === true && (($userPassword = $user->getPassword()) == $this->password)) {
            if($this->remember == 'yes') {
                $this->_setSession('yes');
            } else {
                $this->_setSession('no');
            }
            return true;
        } else {
            $this->_setSession('no');
            return false;
        }
    }

    protected function _setSession($parameter)
    {
        $_SESSION['validate'] = $parameter;
    }
}