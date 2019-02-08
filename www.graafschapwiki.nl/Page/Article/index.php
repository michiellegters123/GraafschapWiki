<?php

$GLOBALS['title'] = "GraafschapWiki";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";

//data
$ARTICLE_TITLE= "PHP";
$ARTICLE_INDEX = "dfasdfasdfasdfasdfsdfdsfsa0";
$ATRICLE_CONTENTS = array();

?>


<h1 class="Title"><?php echo $ARTICLE_TITLE; ?></h1>
<p class="ContentText"><?php echo $ARTICLE_INDEX; ?></p>

<?php

include "../../include/views/Footer.php";
?>
