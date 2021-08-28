<?php

namespace app\controllers;

use \sys\lib\Status as Status;
use \sys\core\Controller as Controller;
use \sys\core\View as View;

class Admin extends Controller
{
    public function index()
    {
  
        $grantUser = 'admin';
        if(Status::get_current_user() ===$grantUser)
        {
            return new View('admin/index.php',[
                'title' => 'Адмінка'
            ]);
        }
        else
        {
            return new View('errors/forbidden.php',[
                'title' => '403'
            ]);
        }
    }
}