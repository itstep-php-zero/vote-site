<?php

namespace app\controllers;

use \app\models\Vote as Vote;
use \app\forms\VoteForm as VoteForm;
use \app\forms\InitvoteForm as InitForm;
use \app\models\Candidate as Candidate;
use \app\models\Votes_candidates as Votes_candidates;
use \app\forms\Addcandidateform as Addcandidateform;
use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \sys\lib\Status as Status;

class Votes extends Controller
{
    public function __construct()
    {
        parent::__construct(new Vote());
    }

    public function index()
    {
        $grantUser = 'admin';
        if(Status::get_current_user() ===$grantUser)
        {
            return new View('votes/index.php',[
                'title' => 'Керування категоріями',
                'votes' => $this->model->get_all_votes(),
                'script' => View::RES.'/js/delete.js'

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
            
            $form = new VoteForm();
            if(empty($_POST['submit']))
            {
                return new View('votes/create.php',[
                    'title' => 'Добавлення Голосування',
                    'form' => $form
                ]);
            }
            else
            {
                $form->fill();
                $voteTitle = $form->fields[0]->fieldValue; 
                $voteShortDescription = $form->fields[1]->fieldValue; 
                $voteDescription = $form->fields[2]->fieldValue; 
                $votePhoto = $form->fields[3]->fieldValue; 
                $voteExpDate = $form->fields[4]->fieldValue; 

                $this->model->add_vote($voteTitle, $voteShortDescription, $voteDescription, $votePhoto,$voteExpDate);

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

            $vote = $this->model->get_by_id($id);
            $form = new InitForm($vote);
            if(empty($_POST['submit']))
            {
                return new View('votes/update.php',[
                    'title' => 'Добавлення категорії',
                    'form' => $form

                ]);
            }
            else
            {
                $form->fill();
                $propsArray = [];
                foreach ($form->fields as $field)
                {
                    array_push($propsArray,$field->fieldValue);
                } 
                array_push($propsArray,$id);
                $this->model->edit_vote($propsArray);
               $this->redirect();
            }

        
    }
    }

    public function delete($id)
    {
         $grantUser = 'admin';
        if(Status::get_current_user() ===$grantUser)
        {
        $this->model->del_vote($id);
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
            
    //         $form = new VoteForm();
    //         $vote = $this->model->get_by_id($id);
            
    //         if(empty($_POST['submit']))
    //         {
    //             return new View('votes/edit.php',[
    //                 'title' => 'редагування голосування',
    //                 'form' => $form,
    //                 'vote' => $vote,
    //                 'script' => View::RES.'/js/edit_vote.js'

    //             ]);
    //         }
    //         else
    //         {
    //             $form->fill();
    //             $voteTitle = $form->fields[0]->fieldValue; 
    //             $voteShortDescription = $form->fields[1]->fieldValue; 
    //             $voteDescription = $form->fields[2]->fieldValue; 
    //             $votePhoto = $form->fields[3]->fieldValue; 
    //             $voteExpDate = $form->fields[4]->fieldValue; 

    //             $this->model->edit_vote($voteTitle, $voteShortDescription, $voteDescription, $votePhoto,$voteExpDate,$id);

    //            $this->redirect();
    //         }
    //     }
    // }  

    public function addcandidate($id)
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
            
            $form = new Addcandidateform();
            if(empty($_POST['submit']))
            {
                return new View('votes/addcandidate.php',[
                    'title' => 'Добавлення категорії',
                    'form' => $form,
                    'vote_id' => $id,
                    'script' => View::RES.'/js/add_candidate.js'
                ]);
            }
            else
            {
              
               $this->redirect();
            }
        }

    }

    public function deletecandidate($id)
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
            
            $form = new Addcandidateform();
            if(empty($_POST['submit']))
            {
                return new View('votes/deletecandidate.php',[
                    'title' => 'Добавлення категорії',
                    'form' => $form,
                    'vote_id' => $id,
                    'script' => View::RES.'/js/delete_candidate.js'
                ]);
            }
            else
            {
              
               $this->redirect();
            }
        }

    }

    public function ajax_add_candidate()
    {
        $vote_id = $_POST['vote_id'];
        $candidate_id = $_POST['candidate_id'];

        $votes_candidates = new Votes_candidates();

        $votes_candidates->add($vote_id,$candidate_id);

        echo 'added';
    }

    public function ajax_del_candidate()
    {
        $vote_id = $_POST['vote_id'];
        $candidate_id = $_POST['candidate_id'];

        $votes_candidates = new Votes_candidates();

        $votes_candidates->delete($vote_id,$candidate_id);

        echo 'deleted';
    }

    public function check_candidate()
    {
        $vote_id = $_POST['vote_id'];
        $candidate_id = $_POST['candidate_id'];

        $votes_candidates = new Votes_candidates();

        echo $votes_candidates->check_candidate($vote_id,$candidate_id);

         
    }

    public function get_candidates()
    {
      $candidate = new Candidate();
     $res = $candidate->get_all_candidates();

      echo json_encode($res);
    }

    public function get_candidates_by_vote_id()
    {
        $vote_id=$_POST['vote_id'];
        $candidates=[];
        $vote_candidates = new Votes_candidates();
        $candidate = new Candidate();
        $candidate_ids = $vote_candidates->get_by_vote_id($vote_id);
        foreach($candidate_ids as $value)
        {
          array_push($candidates,$candidate->get_by_id($value['candidate_id']));
  
        }
      echo json_encode($candidates);
    }

    private function redirect()
    {
        echo "<script>window.location = '/php/vote-site/votes' </script>";
    }


}