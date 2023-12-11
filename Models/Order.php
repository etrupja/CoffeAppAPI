<?php
namespace Models;

require_once 'Base/EntityBase.php';
use Models\Base\EntityBase;

class Order extends EntityBase  {

    // public $id;

    public $title;
    public $email;
    public $description;

    function __construct($id, $title, $email, $description){
        $this->id = $id;

        $this->title = $title;
        $this->email = $email;
        $this->description = $description;
    }

    function getTitle(){
        return $this->title;
    }

    function getEmail(){
        return $this->email;
    }

    function getDescription(){
        return $this->description;
    }
}

?>