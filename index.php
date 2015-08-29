<?php include('header.php'); ?>

Select a graph <br>

<a href="<?php echo $config->BaseUrl('import.php'); ?>">Upload CSV Here</a>

<ul class="menu">
    <li><a href="<?php echo $config->BaseUrl('anchor_text.php'); ?>">Anchor Text</a></li>
    <li><a href="<?php echo $config->BaseUrl('link_status.php'); ?>">Link Status</a></li>
    <li><a href="<?php echo $config->BaseUrl('from_url.php'); ?>">From Url</a></li>
    <li><a href="<?php echo $config->BaseUrl('bl_dom.php'); ?>">BLdom</a></li>
</ul>



<?php include('footer.php'); ?>