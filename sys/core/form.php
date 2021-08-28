<?php

namespace sys\core;

use \sys\lib\Field as Field;
use \app\models\User as User;
use \app\models\Category as Category;


class Form
{

    public $name;
    public $className;
    public $methodName;
    public $actionPath;
    public $enctype;
    public $fields;

    public function generate()
    {
        echo '<form';
        echo ' id="'.$this->name.'"';
        echo ' class="'.$this->className.'"';
        echo ' method="'.$this->methodName.'"';
        echo ' action="'.$this->actionPath.'"';
        if($this->enctype !== '')
        {
            echo ' enctype="'.$this->enctype.'"';
        }
        if($this->name === 'regform')
        {
        echo ' onsubmit="return false"';
        }
        echo '>';

        if(is_array($this->fields) && count($this->fields) > 0)
        {
            foreach ($this->fields as $field)
            {
                if($field instanceof Field)
                {
                    echo '<div class="form-group">';
                    //
                    if($field-> name !== 'stand' && $field-> name !== 'category' &&$field-> name !== 'author')
                    {
                    //    
                    echo '<label for="'.$field->name.'">';
                    echo ucfirst($field->name).':';
                    echo '</label>';
                    $field->generate();
                    }
                    elseif($field->name==='stand')
                    {
                        echo '<p style="text-align: center; margin: 30px 0px -10px;">';
                        echo '<input type="checkbox" id="stand" name="stand" value="yes">';
                        echo '&nbsp;';
                        echo '<label>Залишатись в системі</label>';
                        echo '</p>';
                    }
                    elseif($field->name==='category')
                    {
                        echo '<label for="'.$field->name.'">';
                        echo ucfirst($field->name).':';
                        echo '</label>';

                        $categoryModel = new Category();
                        $categories = $categoryModel->get_all_categories();
                        echo '<select name="category" class="form-control">';
                        foreach($categories as $category)
                        {
                            echo '<option value="'.$category['id'].'">';
                            echo $category['name'];
                            echo '</option>';
                        }
                        echo '</select>';
                    }
                    elseif($field->name==='author')
                    {
                        echo '<label for="'.$field->name.'">';
                        echo ucfirst($field->name).':';
                        echo '</label>';

                        $authorModel = new User();
                        $authors = $authorModel->get_all_authors();
                        echo '<select name="author" class="form-control">';
                        foreach($authors as $author)
                        {
                            echo '<option value="'.$author['id'].'">';
                            echo $author['login'];
                            echo '</option>';
                        }
                        echo '</select>';
                    }
                    //
                    echo '<div class="error"';
                    echo ' id="'.$field->name.'-error">';
                    echo '</div>';
                    //
                    echo '</div>';
                }
            }
        }
        //
        echo '<div class="btn-group">';
        echo '<input type="submit" id="submit" name="submit" value="Надіслати" class="btn-sm btn-success my-btn" />';
        echo '<input type="reset" id="reset" name="reset" value="Очистити" class="btn-sm btn-danger my-btn" />';
        echo '</div>';
        echo '</form>';
    }

    public function generate_with_values()
    {
        echo '<form';
        echo ' id="'.$this->name.'"';
        echo ' class="'.$this->className.'"';
        echo ' method="'.$this->methodName.'"';
        echo ' action="'.$this->actionPath.'"';
        if($this->enctype !== '')
        {
            echo ' enctype="'.$this->enctype.'"';
        }
        if($this->name === 'regform')
        {
        echo ' onsubmit="return false"';
        }
        echo '>';

        if(is_array($this->fields) && count($this->fields) > 0)
        {
            foreach ($this->fields as $field)
            {
                if($field instanceof Field)
                {
                    echo '<div class="form-group">';
                    //
                    if($field-> name !== 'stand')
                    {
                    //    
                    echo '<label for="'.$field->name.'">';
                    echo ucfirst($field->name).':';
                    echo '</label>';
                    $field->generate_with_value();
                    }
                    else
                    {
                        echo '<p style="text-align: center; margin: 30px 0px -10px;">';
                        echo '<input type="checkbox" id="stand" name="stand" value="yes">';
                        echo '&nbsp;';
                        echo '<label>Залишатись в системі</label>';
                        echo '</p>';
                    }
                    //
                    echo '<div class="error"';
                    echo ' id="'.$field->name.'-error">';
                    echo '</div>';
                    //
                    echo '</div>';
                }
            }
        }
        //
        echo '<div class="btn-group">';
        echo '<input type="submit" id="submit" name="submit" value="Надіслати" class="btn-sm btn-success my-btn" />';
        echo '<input type="reset" id="reset" name="reset" value="Очистити" class="btn-sm btn-danger my-btn" />';
        echo '</div>';
        echo '</form>';
    }

    public function fill()
    {
        if(is_array($this->fields) && count($this->fields) > 0)
        {
            foreach ($this->fields as $field) 
            {
                if(isset($_POST[$field->name]))
                {
                    $field->fieldValue = $_POST[$field->name];
                }
                //*
                if(isset($_FILES[$field->name]))
                {
                    $field->fieldValue = $_FILES[$field->name];
                }
            }
        }
    }



}