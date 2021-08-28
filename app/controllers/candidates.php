<?php

namespace app\controllers;

use \app\models\Vote as Vote;
use \app\forms\CandidateForm as CandidateForm;
use \app\forms\InitCandidateForm as InitForm;
use \app\models\Candidate as Candidate;
use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \sys\lib\Status as Status;

class Candidates extends Controller
{
    public function __construct()
    {
        parent::__construct(new Candidate());
    }

    public function index()
    {
        $grantUser = 'admin';
        if(Status::get_current_user() ===$grantUser)
        {
            return new View('candidates/index.php',[
                'title' => 'Керування категоріями',
                'candidates' => $this->model->get_all_candidates(),

            ]);
        } else
        {
            return new View('errors/forbidden.php',[
                'title' => '403'
            ]);
        }
    }

    public function create()
    { 
        $grantUser = 'admin';
        if(Status::get_current_user() !==$grantUser)
        {
            return new View('errors/forbidden.php',[
                'title' => '403'
            ]);
        }
        else
        {
            
            $form = new CandidateForm();
            if(empty($_POST['submit']))
            {
                return new View('candidates/create.php',[
                    'title' => 'Добавлення Голосування',
                    'form' => $form
                ]);
            }
            else
            {
                $form->fill();
                $candidateName = $form->fields[0]->fieldValue; 


                $this->model->add_candidate($candidateName);

               $this->redirect();
            }
        }
    }

    public function update($id)
    { $grantUser = 'admin';
        if(Status::get_current_user() !==$grantUser)
        {
            return new View('errors/forbidden.php',[
                'title' => '403'
            ]);
        }
        else
        {
            $name = $this->model->get_by_id($id)['name'];
            $form = new InitForm($name);
            if(empty($_POST['submit']))
            {
                return new View('candidates/update.php',[
                    'title' => '',
                    'form' => $form

                ]);
            }
            else
            {
                $form->fill();
                $candidateName = $form->fields[0]->fieldValue; 
                $this->model->edit_candidate($categoryName,$id);
               $this->redirect();
            }
      
    }
    }

    public function delete($id)
    { $grantUser = 'admin';
        if(Status::get_current_user() ===$grantUser)
        {
        $this->model->del_candidate($id);
        $this->redirect();
        }
    }

    // public function edit($id)
    // {
    //     $grantUser = 'admin';
    //     if(Status::get_current_user() !==$grantUser)
    //     {
    //         return new View('errors/forbidden.php',[
    //             'title' => '403'
    //         ]);
    //     }
    //     else
    //     {
            
    //         $form = new CandidateForm();
    //         $candidate = $this->model->get_by_id($id);
            
    //         if(empty($_POST['submit']))
    //         {
    //             return new View('candidates/edit.php',[
    //                 'title' => 'редагування голосування',
    //                 'form' => $form,
    //                 'candidate' => $candidate,
    //                 'script' => View::RES.'/js/edit_candidate.js'

    //             ]);
    //         }
    //         else
    //         {
    //             $form->fill();
    //             $candidateName = $form->fields[0]->fieldValue; 
               
    //             $this->model->edit_vote($candidateName, $id);

    //            $this->redirect();
    //         }
    //     }
    // }  

    public function get_candidate()
    {        
        $id = $_POST['id'];
        $res =  json_encode($this->model->get_by_id($id));
       echo $res;
    }


    private function redirect()
    {
        echo "<script>window.location = '/php/vote-site/candidates' </script>";
    }


}