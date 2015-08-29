<?php 

class Chart {
    
    public $config;
    
    function __construct() {
        
        $this->config = New Config;
        
    }
    
    public function anchor_text() {
        
        $words = $this->config->db_connect("SELECT anchor_text FROM import");
        
        $words_arr = array();
        
        while($row = mysql_fetch_assoc($words)) {
    
            $words_arr[] = $row['anchor_text'];
        }
        
        $text = implode(" ", $words_arr);

        $word = explode(" ", $text);

        $cwords = array_count_values($word);
        
        arsort($cwords);
        
        $sorted_words = array_keys($cwords);
        
        return $sorted_words;
    }
    
    public function link_status() {
        
        $links = $this->config->db_connect("SELECT link_status FROM import");
        
        $links_arr = array();
        
        while($row = mysql_fetch_assoc($links)) {
    
            $links_arr[] = $row['link_status'];
        }

        $clinks = array_count_values($links_arr);
        
        return $clinks;
    }
    
    public function from_url() {
        
        $furl = $this->config->db_connect("SELECT from_url FROM import");
        
        $furl_arr = array();
        
        while($row = mysql_fetch_assoc($furl)) {
    
            $furl_arr[] = $row['from_url'];
        }

        $from_url = array_count_values($furl_arr);
        
        arsort($from_url);
        
        $sorted_url = array_keys($from_url);
        
        $hosts = array();
        
        foreach ($sorted_url as $url) {
            
            $hosts[] = parse_url($url, PHP_URL_HOST);
        
        }

        $chosts = array_count_values($hosts);
        
        return $chosts;
    }
    
    public function bl_dom() {
        
        $link = $this->config->db_connect("SELECT bldom FROM import");
        
        $link_arr = array();
        
        while($row = mysql_fetch_assoc($link)) {
    
            $link_arr[] = intval(str_replace(",", "", $row['bldom']));
        }
        
        return $link_arr;
    }
    
    public function bl_dom_ranges() {
        
        $link = $this->config->db_connect("SELECT bldom FROM import");
        
        $link_arr = array();
        
        while($row = mysql_fetch_assoc($link)) {
    
            $link_arr[] = intval(str_replace(",", "", $row['bldom']));
        }
       
        $ranges = array(
            array(1, 10),
            array(11, 100)
        );

        $count_values = array_count_values($link_arr);

        $all_numbers = $count_values + array_fill(0, 100, 0);
        ksort($all_numbers);

        $result = array();

        foreach ($ranges as $range) {
            list($start, $end) = $range;
            $result["$start-$end"] = array_sum( array_slice($all_numbers, $start, $end - $start + 1));
        }
        
        return $result;
    }
    
}



?>