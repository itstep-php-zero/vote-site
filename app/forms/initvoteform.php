<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class InitVoteForm extends Form 
{
    public function __construct($propsArray) {
        $this->name = 'initvoteform';
        $this->className = 'init-vote-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = '';
        $this->fields = 
        [
            new Field('title','input','text','form-control',$propsArray['title']),
            new Field('short_description','input','text','form-control',$propsArray['short_description']),
            new Field('description','textarea','-','form-control',$propsArray['description']),
            new Field('photo','input','text','form-control',$propsArray['photo']),
            new Field('exp_date','input','date','form-control',$propsArray['exp_date'])

        ];
    }
}
