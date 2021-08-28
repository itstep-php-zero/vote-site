<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class InitCandidateForm extends Form 
{
    public function __construct($candidateName) {
        $this->name = 'initcandidateform';
        $this->className = 'init-candidate-form';
        $this->methodName = 'post';
        $this-> actionPath = '#';
        $this->enctype = 'multipart/form-data';
        $this->fields = [
            new Field('name','input','text','form-control',$candidateName)
        
        ];
    }
}
