<?php

spl_autoload_register(function($classPath) {
    // 1 => Якщо перед $classPath є '\' то його потрібно видалити:
    $classPath = ltrim($classPath,'\\');
    
    // 2 => Створюємо окремі змінні для ім'я класа, ім'я файла, простору імен
    $className = '';
    $fileName = '';
    $namespace = '';

    // 3 => Отримуємо позицію внутрішнього '\' відокремлюючого namespace від ім'я класу
    $slashPos = strrpos($classPath, '\\');
    // 4 => Визначаєм namespace і ім'я класу, якщо namespace - вказаний:
    if ($slashPos > -1)
    {
        $namespace = substr($classPath, 0, $slashPos);
        $className = substr($classPath, $slashPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
    }

    // 5 => Добааляємо ім'я самого файлу роміщення файлу
    $fileName .= str_replace('\\',DIRECTORY_SEPARATOR, lcfirst($className)).'.php';
    if(file_exists($fileName))
    {
        require_once($fileName);
    }
    else
    {
        //echo '<h3>Class Not Found</h3>';
    }

});