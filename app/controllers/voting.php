<?php

namespace app\controllers;

use \sys\core\View as View;
use \sys\core\Controller as Controller;
use \app\models\Vote as Vote;
use \app\models\Candidate as Candidate;
use \app\models\User as User;
use \app\models\Votes_candidates as Votes_candidates;
use \app\models\Votes_users as Votes_users;
use \sys\lib\Status as Status;


class Voting extends Controller
{
  public function __construct() 
  {
    parent::__construct(new Vote());
  }

  public function voteconfirmed($candidateName)
  {
    return new View('voting/voteconfirmed.php',
    [
      'title' => "Vote Confirmed",
      'candidateName'=>$candidateName
    ]);
  }
   
    public function single($id)
    {
     

      if(empty($_POST['submit']))
        {
          $user = new User();
          $vote_users = new Votes_users();
          $user_id = $user->get_id(Status::get_current_user());
          $vote = $this->model->get_by_id($id);   

            // отримати від candidates.php всіх кандидатів і передати їх
            
          return new View('voting/single.php',
          [
            'title' => 'Vote',
            'vote' => $vote,
            'candidates' => $this->get_candidates($id),
            'voted' => $vote_users->check_user($user_id, $id)

          ]);
        }
        else
        {
          if(!empty($_POST['candidate']))
          {
            $params = explode('/',$_POST['candidate']);
            $user = new User();

            $vote_users = new Votes_users();
            $vote_candidates = new Votes_candidates();
            $candidate = new Candidate();
            $user_id = $user->get_id(Status::get_current_user());
            $vote_id = $params[1];
            $candidate_id = $params[0];
            $candidateName=$candidate->get_by_id($candidate_id)['name'];

            $vote_candidates->user_voted($vote_id,$candidate_id);
            $vote_users->user_voted($vote_id,$user_id);

            $this->redirect($candidateName);
          }
        }

    }

    private function get_candidates($vote_id)
    {

      $vote_candidates = new Votes_candidates();
      $candidate = new Candidate();
      $res1 = $vote_candidates->get_by_vote_id($vote_id);
      $res2= [];
      foreach($res1 as $key => $value)
      {
        array_push($res2, $candidate->get_by_id($value['candidate_id']));

      }
      return $res2;
    }

   
    
    private function redirect($candidateName)
    {

        echo "<script>window.location = '/php/vote-site/voting/voteconfirmed/$candidateName' </script>";
    }

   
}
