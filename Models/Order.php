<?php
namespace Models;

//Include EntityBase namespace
require_once 'Base/EntityBase.php';
use Base\EntityBase;

class Order extends EntityBase {
    
    public $name;
    public $email;
    public $description;

    public function __construct($id, $name, $email, $description){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->description = $description;
    }
}

?>