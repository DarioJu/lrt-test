<?php

class Config {
    
    function BaseUrl($url = "") {
        
        return "http://localhost/lrt-test/".$url;
    }
    
    
    function db_connect($query) {
        
        $link = mysql_connect('localhost', 'root', '');
        mysql_select_db('lrt-test', $link);
        $result = mysql_query($query);
        mysql_close($link);
        
        return $result;
    } 
}


?>
