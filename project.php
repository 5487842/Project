<?php
// include_once('simple_html_dom.php');
// $html=file_get_html('https://www.zameen.com/Homes/Lahore-1-1.html');
//
// $adds[] = [];
// $i = 0;
// foreach($html->find('div[class=ls clr]') as $element)
// {
//     $adds[$i] = $element;
//     $i++;
// }
// ?>
<!-- <html>-->
<!-- <head>-->
<!--     <title>Project</title>-->
<!-- </head>-->
<!-- <body>-->
<!-- <div>-->
<!-- --><?php
//    foreach ($adds as $add) {
//        foreach ($add->find('span img') as $value){
//            echo $value;
//        }
//        foreach ($add->find('span[title]') as $value){
//            echo "<h3>Title:</h3>";
//            echo $value;
//        }
//        foreach ($add->find('div[class=ls_p]') as $value){
//            echo "<h3>Price:</h3>";
//            echo $value;
//        }
//        foreach ($add->find('div[class=description]') as $value){
//            echo "<h3>Description:</h3>";
//            echo $value;
//        }
//        echo "<br><hr><br>";
//    }
// ?>
<!-- </div>-->
<!-- </body>-->
<!-- </html>-->


<?php
include_once('simple_html_dom.php');

$html = file_get_html('https://www.zameen.com/Homes/Lahore-1-1.html');

$adds[] = [];
$i = 0;
foreach($html->find('div[class=ls clr]') as $element)
{
    $adds[$i] = $element;
    $i++;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
</head>
<body>
<div>
    <?php
    foreach ($adds as $add) {
        foreach ($add->find('span img') as $value) {
            echo $value;
            break;
        }
        foreach ($add->find('span[title]') as $value) {
            echo "<h3>Title:</h3>";
            echo $value;
            break;
        }
        echo "<br><hr><br>";
    }
    ?>
</div>
</body>
</html>