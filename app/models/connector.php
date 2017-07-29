<?php

class Connector {

    private $host = "localhost";
    private $username = 'root';
    private $passwd = '';
    private $dbname = 'pms';

    function __contruct() {
        echo "too hard to understand";
    }

    public function getLink() {
        $link = mysql_connect($this->host, $this->username, $this->passwd);
        mysql_select_db($this->dbname);
        if (!$link) {
            //trigger_error("Could not connect to database: ".mysqli_connect_error());
        } else {
            //Set connect method is utf-8
            //Set connect method is utf-8
            mysql_query("SET NAMES 'utf8'");
            mysql_query("set character_set_client='utf8'");
            mysql_query("set character_set_results='utf8'");
            mysql_query("set collation_connection='utf8'");
            //echo "You connected sucessfully";
        }
        return $link;
    }

}

?>