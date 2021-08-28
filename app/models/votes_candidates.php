<?php

namespace app\models;
use \sys\core\Model as Model;

class Votes_candidates extends Model
{
    public function add($vote_id, $candidate_id)
    {
        $sql = 'insert into votes_candidates (vote_id, candidate_id, count) ';
        $sql .= 'values (?, ?, ?)';
        $params = [$vote_id, $candidate_id, 0];
        $this->execute_dml_query($sql, $params);    
    }

    public function delete($vote_id, $candidate_id)
    {
        $sql = 'delete from votes_candidates where vote_id=? and candidate_id=? ';
        $params = [$vote_id, $candidate_id];
        $this->execute_dml_query($sql, $params);    
    }

    public function get_by_vote_id($vote_id)
    {
        $sql = 'select candidate_id from votes_candidates where vote_id=? ';
        $params = [$vote_id];
        $res = $this->execute_select_query($sql,$params);  
        return $res;
    }

    public function user_voted($vote_id,$candidate_id)
    {
        $sql = 'update votes_candidates set count = count+1 where vote_id=? and candidate_id=? ';
        $params = [$vote_id,$candidate_id];
        $this->execute_dml_query($sql, $params);    


    }

    public function check_candidate($vote_id,$candidate_id)
    {
        $sql = 'select * from votes_candidates where vote_id=? and candidate_id=? ';
        $params = [$vote_id, $candidate_id];
        $res = $this->execute_select_query($sql,$params);  
       if (count($res)===0)
       {
            return 'true';
       }
       else
       {
            return 'false';
       }
    }
  
}