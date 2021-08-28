<?php

namespace app\models;
use \sys\core\Model as Model;

class Candidate extends Model
{
    public function add_candidate($name)
    {
        $sql = 'insert into candidates (name) ';
        $sql .= 'values (?)';
        $params = [$name];
        $this->execute_dml_query($sql, $params);    
    }

    public function del_candidate($candidateId)
    {
        $sql = "delete from candidates where id=?";
        $param = [$candidateId];
        $this->execute_dml_query($sql,$param);
    }

    public function edit_vote($name, $candidateId)
    {
        $sql = "update candidates set name=? where id=?";
        $param = [$name, $candidateId];
        $this->execute_dml_query($sql,$param);
    }


    public function get_all_candidates()
    {
        $sql = 'select * from candidates';
        $res = $this->execute_select_query($sql);  
        return $res;  
    }
   

    public function get_by_id($id)
    {
        $sql = 'select * from candidates where id=? ';
        $params = [$id];
        $res = $this->execute_select_query($sql,$params);  
        return $res[0];  
    }

  
}