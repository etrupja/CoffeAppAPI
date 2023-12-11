<?php
namespace Models;

require_once 'Base/EntityBase.php';
use Models\Base\EntityBase;


class User extends EntityBase {

    // public $id;

    public $firstName;
    public $lastName;
    public $email;
    public $password;

    function __construct($id, $firstName, $lastName, $email, $password){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }
}

?>