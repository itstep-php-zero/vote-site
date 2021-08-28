<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class Addcandidateform extends Form
{
    public function __construct() {
        $this->name = 'entryform';
        $this->className = 'entry-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = '';
        $this->fields = 
        [
            new Field('candidate','select','','form-select')           
        ];
    }
}