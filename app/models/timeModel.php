<?php

class TimeModel extends DBModel{
    
    function insertTime($start,$end){
        
        $delete = "DELETE FROM time WHERE time_id = 1";
        $this->deleteRow($delete);
        
        $q = "INSERT INTO time(time_id,start,end) VALUES(1,'{$start}','{$end}')";
        
        return $this->insertData($q);
    }
    
    function getTime($time_id){
        
        $q = "SELECT * FROM time WHERE time_id = $time_id";
        
        return $this->getDataOneRow($q);
    }
}
