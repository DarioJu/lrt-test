<?php include ('config.php'); 
$config = new Config;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $config->BaseUrl("css/style.css"); ?>">
    <script src="<?php echo $config->BaseUrl("js/d3.js"); ?>"></script>
    <script src="<?php echo $config->BaseUrl("js/d3.layout.cloud.js"); ?>"></script>
  </head>
  <body>
      <div class="wrapper">
