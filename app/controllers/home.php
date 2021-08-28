<?php

namespace app\controllers;

use \sys\core\View as View;
use \sys\core\Controller as Controller;
use \app\forms\Feedbackform as Feedbackform; 
use \app\models\Vote as Vote;

class Home extends Controller
{
    // передати всі votes для генерування ссилок на single
    public function index()
    {
      $vote = new Vote();
      $vote->delete_expired();
       // echo '<h4>Загрузка представлення головної сторінки ...</h4>';
       return new View('home/index.php',
        [
           'title' => 'Головна',
           'votes' => $vote->get_all_votes()
        ]);
    }

    public function about()
    {
       return new View('home/about.php',
       [
         'title' => 'Про сайт'
       ]
      );

    }

    public function contact()
    {
      //  echo '<h4>Загрузка представлення сторінки контактів ...</h4>';
      return new View('home/contact.php',
      [
        'title' => 'Контакти'
      ]);

    }
   

    public function feedback()
    {       
      $form = new Feedbackform();

      if(empty($_POST['submit']))
        {
            return new View('home/feedback.php',
            [
                'title' => 'Регістрація',
                'form' => $form
            ]);
        }
        else
        {
            $form->fill();
            $message = $form->fields[0]->fieldValue;
           
            return new View('home/feedback_test.php',
                [
                    'title' => 'Register-Info',
                    'message' => $message,
                    'color' => $color
                ]); 
        }
    }
}