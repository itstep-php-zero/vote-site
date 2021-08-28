<?php

namespace sys\lib;

class Field
{
    public $name;
    public $tagName;
    public $typeName;
    public $className;
    public $fieldValue;

    public function __construct($name, $tagName, $typeName, $className, $fieldValue = '')
    {
        $this->name=$name;
        $this->tagName=$tagName;
        $this->typeName=$typeName;    
        $this->className=$className;
        $this->fieldValue=$fieldValue;

    }

    public function generate()
    {
        // <input type="text" name="login" id="login" class="form-item" placeholder="..."
        echo '<';
            echo $this->tagName;
            echo ' type="'.$this->typeName.'"';
            echo ' name="'.$this->name.'"';
            echo ' id="'.$this->name.'"';
            echo ' class="'.$this->className.'"';
            echo ' placeholder="Type '.$this->name.' here..."';
            echo ' required';
            echo '>';
            echo '</';
            echo $this->tagName;
            echo '>';
    }

    public function generate_with_value()
    {
        echo '<';
        echo $this->tagName;
        echo ' type="'.$this->typeName.'"';
        echo ' name="'.$this->name.'"';
        echo ' id="'.$this->name.'"';
        echo ' class="'.$this->className.'"';
        echo ' value="'.$this->fieldValue.'"';
        echo ' placeholder="Type '.$this->name.' here..."';
        echo ' required';
        echo '>';
        if($this->tagName==='textarea')
        {
        echo $this->fieldValue;
        }
        echo '</';
        echo $this->tagName;
        echo '>';
    }
}
