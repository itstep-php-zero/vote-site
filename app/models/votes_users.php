<?php

namespace app\models;
use \sys\core\Model as Model;

class Votes_Users extends Model
{
    public function check_user($user_id, $vote_id)
    {
        $sql = 'select * from votes_users where user_id=? and vote_id=? ';
        $params = [$user_id,$vote_id];
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
    
    public function user_voted($vote_id,$user_id)
    {
        $sql = 'insert into votes_users (vote_id, user_id) ';
        $sql .= 'values (?, ?)';
        $params = [$vote_id, $user_id];
        $this->execute_dml_query($sql, $params);  
    }

  
}