<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class Candidateform extends Form
{
    public function __construct() {
        $this->name = 'candidateform';
        $this->className = 'candidate-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = '';
        $this->fields = 
        [
            new Field('name','input','text','form-control'),
       
        ];
    }
}