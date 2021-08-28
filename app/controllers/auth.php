<?php

namespace app\controllers;

use \sys\core\View as View;
use \app\models\User as User;
use \app\forms\Regform as Regform; 
use \app\forms\Entryform as Entryform; 
use \sys\core\Controller as Controller;
use \sys\lib\Mailer as Mailer;

class Auth extends Controller
{
    public function __construct() 
    {
      parent::__construct(new User());
    }

    public function reg()
    {
        $form = new Regform();
        if(empty($_POST['submit']))
        {
            return new View('auth/reg.php',
            [
                'title' => 'Регістрація',
                'form' => $form,
                'script' => View::RES.'/js/reg.js'
            ]);
        }
        else
        {
            $form->fill();
            $login = $form->fields[0]->fieldValue;
            $passw = md5($form->fileds[1]->fieldvalue);
            $email = $form->fields[3]->fieldValue;
            $regdate = date('Y-m-d H:i:s');
            $role_id = 5;
            $status_id = 1;
            $confirm = 'no';
            $this->model->register($login, $passw, $email, $regdate, $role_id, $status_id, $confirm);
            //
            // mail
            //$mailer = new Mailer($email);
            //$mailer->send();

            $message = 'Ви успішно зареєстровані на сайті Teach-Assistant!<hr>';
            $message .= "На вказаний вами email: $email відправлено відповідний лист, у якому міститься ссилка для підтвердження реєестраціЇ</hr>";
            $color = 'darkcyan';
            return new View('auth/reginfo.php',
                [
                    'title' => 'Register-Info',
                    'message' => $message,
                    'color' => $color
                ]); 
        }
    }
    public function entry()
    {     
        $form = new Entryform();
        if(empty($_POST['submit']))
        {
            return new View('auth/entry.php',
            [
                'title' => 'Авторизація',
                'form' => $form
            ]);
        }
        else
        {
            $form->fill();

            $login = $form->fields[0]->fieldValue;
            $passw = md5($form->fields[1]->fieldValue);
            $stand = $form->fields[2]->fieldValue;

            if($this->model->authenticate($login,$passw))
            {
                //*
                if ($this->model->check_confirm($login))
                {
                    $_SESSION['user'] = $login;
                    if($stand === 'yes')
                    {
                        setcookie('user',$login,time()+3600*24*7);
                    }
                    $message = 'Ви успішно авторизовані на сайті Teach-Assistant!<hr>';
                    $color = 'green';
                }
                else
                {
                    //*
                    $message = 'Ваша регістрація ще не підтверджена!<hr>';
                    $color = 'darkcyan';
                }
            }
            else
            {
                $message = $passw;
                $color = 'red';
            }
            return new View('auth/entryinfo.php',
            [
                'title' => 'Register-Info',
                'message' => $message,
                'color' => $color
            ]); 
        }
    }

    public function confirm($email)
    {
        $this->model->reg_confirm($email);
        return new View('auth/confirm.php',
        [
            'title' => 'Register-Confirm',
            'message' => "Регістрація користувача $email - успішно підтверджена!",
            'color' => 'green'
        ]);
    }

    public function profile()
    {
        return new View('auth/profile.php',
        [
            'title' => 'Профіль'
        ]);
    }

    public function exit()
    {
        session_destroy();
        if(isset($_COOKIE['user']))
        {
        setcookie('user','',-1);
        }
        $this->currentUser = 'Гість';
        return new View('auth/exit.php',
        [
            'title' => 'Вихід'
        ]);
    }

    public function ajax_check_login()
    {
        $loginX = $_POST['login'];
        if($this->model->check_login($loginX))
        {
            echo 'free';
        }
        else
        {
            echo 'taken';
        }
    }

    public function ajax_check_email()
    {
        $emailX = $_POST['email'];
        if($this->model->check_email($emailX))
        {
            echo 'free';
        }
        else
        {
            echo 'taken';
        }
    }
}