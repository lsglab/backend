<?php

namespace App\Tables\Base\Columns;

class RememberToken extends Column{

    public function __construct($table,$name,$object=null){
        parent::__construct($table,$name,'remember_token',$object);
        $this->hidden = true;
        $this->fillable = false;
    }

    protected function getTypeValidation($object) : array{
        return [];
    }
}
