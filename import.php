<?php include('header.php'); ?>


<?php 

if($_FILES) {
    if($_POST['submit']) {
        $content = fopen($_FILES['csv']['tmp_name'], 'r');
        $count = 0;
        while(($data = fgetcsv($content, 1000, ',')) !== FALSE) {
            if(!$count == 0) {
            $config->db_connect("INSERT INTO import (favorites, from_url, to_url, anchor_text, link_status, type, bldom, dompop, power, trust, power_trust, alexa, ip, cntry) VALUES ('".stripslashes($data[0])."', '".stripslashes($data[1])."', '".stripslashes($data[2])."', '".stripslashes($data[3])."', '".stripslashes($data[4])."', '".stripslashes($data[5])."', '".stripslashes($data[6])."', '".stripslashes($data[7])."', '".stripslashes($data[8])."', '".stripslashes($data[9])."', '".stripslashes($data[10])."', '".stripslashes($data[11])."', '".stripslashes($data[12])."', '".stripslashes($data[13])."')");
            }
            $count++;
            
            }
    }
    
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="csv" />
    <input type="submit" name="submit" value="Submit"/>
</form>



<?php include('footer.php'); ?>