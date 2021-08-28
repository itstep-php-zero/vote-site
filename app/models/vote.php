<?php

namespace app\models;
use \sys\core\Model as Model;

class Vote extends Model
{
    public function add_vote($title, $short_description, $description, $photo,$exp_date)
    {
        $sql = 'insert into votes (title, short_description, description, photo, exp_date) ';
        $sql .= 'values (?, ?, ?, ?, ?)';
        $params = [$title,$short_description, $description, $photo,$exp_date];
        $this->execute_dml_query($sql, $params);    
    }

    public function del_vote($voteId)
    {
        $sql = "delete from votes where id=?";
        $param = [$voteId];
        $this->execute_dml_query($sql,$param);
    }

    public function delete_expired()
    { 
          $sql = "delete from votes where exp_date<?";
        $param = [date('Ymd')];
        $this->execute_dml_query($sql,$param);
    }

    public function edit_vote($propsArray)
    {
        $sql = "update votes set title=?, short_description=?, description=?, photo=?, exp_date=? where id=?";
        
        $this->execute_dml_query($sql,$propsArray);
    }

    public function get_all_votes()
    {
        $sql = 'select * from votes';
        $res = $this->execute_select_query($sql);  
        return $res;  
    }

    public function get_by_id($id)
    {
        $sql = 'select * from votes where id=? ';
        $params = [$id];
        $res = $this->execute_select_query($sql,$params);  
        return $res[0];  
    }

  
}