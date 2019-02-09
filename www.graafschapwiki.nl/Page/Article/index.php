<?php

require_once("Paragraph.php");


$ARTICLE_TITLE = "PHP";

//set header
$GLOBALS['title'] = "GraafschapWiki - " . $ARTICLE_TITLE;
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";

//conents
$test = new Paragraph("yeetest");
$test->addSub(new SubParagraph("history", "fsdjfsldkajflkasdjfdsagay"));
$test->addSub(new SubParagraph("boi", "sadfsadfaksdfklsdjflkasdjflkjads"));

//set data
$ARTICLE_INDEX = "dfasdfasdfasdfasdfsdfdsfsa0";
$ATRICLE_CONTENTS = array($test);


?>

<h1 class="Title"><?php echo $ARTICLE_TITLE; ?></h1>
<p class="ContentText"><?php echo $ARTICLE_INDEX; ?></p>

<?php

foreach ($ATRICLE_CONTENTS as $paragraph)
{
    $paragraph->write();
}

?>

<?php

include "../../include/views/Footer.php";
?>
