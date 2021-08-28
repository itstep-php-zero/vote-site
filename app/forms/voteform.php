<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class Voteform extends Form
{
    public function __construct() {
        $this->name = 'voteform';
        $this->className = 'vote-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = '';
        $this->fields = 
        [
            new Field('title','input','text','form-control'),
            new Field('short_description','input','text','form-control'),
            new Field('description','textarea','-','form-control'),
            new Field('photo','input','text','form-control'),
            new Field('exp_date','input','date','form-control')

        ];
    }
}