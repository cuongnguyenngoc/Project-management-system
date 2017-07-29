<?php

require 'connector.php';

class DBModel {

    private $connector;
    private $link;

    function __construct() {
        $this->connector = new Connector;
        $this->link = $this->connector->getLink();
    }

//// Cac Ham chung
// Ham lay ve ket qua sau khi truy van csdl
    public function getResult($q) {
        $r = mysql_query($q) or die("Query {$q} \n <br/> MYSQL Error: " . mysql_error($this->link));
        return $r;
    }

// Ham get so luong, và mở rộng hơn cho công việc giáo viên
    public function getDataManyRows($sql) {

        $r = $this->getResult($sql);
        $datas = array();
        if (mysql_num_rows($r) > 0) {

            while ($data = mysql_fetch_array($r,MYSQL_ASSOC)) {
                $datas[] = $data;
            }
            return $datas;
        }else{
            $datas = null;
        }
    }

    public function getDataOneRow($sql) {

        $r = $this->getResult($sql);
        if (mysql_num_rows($r) == 1) {
            
            return mysql_fetch_array($r);
            
        }elseif(mysql_num_rows($r) == 0){
            
            return null;
        }
    }

//Ham insert data
    public function insertData($sql) {

        $r = $this->getResult($sql);
        if (mysql_affected_rows() == 1) {
            $notice = 1; //  thanh cong
        } else {
            $notice = 0; // khong thanh cong, do loi he thong, you know that
        }
        return $notice;
    }

//Ham delete dong trong bang
    function deleteRow($sql) {

        $r = $this->getResult($sql);
        if (mysql_affected_rows() > 0) {
            $notice = 4; // xoa thanh cong
        } else {
            $notice = 5; // khong xoa duoc
        }
        return $notice;
    }
    
    //delete use prepearestatement
    //Dat them vao
    function deleteRows($sql, $typeString, $data) {
        
        $stmt = $this->link->prepare($sql);
            $stmt->bind_param($typeString, $val1, $val2);
            foreach ($data as $i) {
                $val1 = $i[0];
                $val2 = $i[1];
                $stmt->execute();
            }
            $stmt->close();
    }
    //het Dat them vao
////Ket thuc cac ham chung 
}