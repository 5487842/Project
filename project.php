<?php
include_once('simple_html_dom.php');


if(isset($_POST['submit'])){
		$count = 0;
		
		$db = mysqli_connect('localhost', 'root', '', 'projectdb');
		$selectquery = 'SELECT * FROM zameendata';
    	$resultCopy = mysqli_query($db , $selectquery);
    	mysqli_close($db);
		
		$result = [];
		foreach ($resultCopy as $value) {
			if(stripos($value['title'], $_POST['searchBar']) !== false) {
				$result[$count] = $value;
			}
			$count++;
		}
	} else {

$adds[] = [];
$i = 0;

for ($j=1; $j <= 4 ; $j++) {  

	$html = file_get_html('https://www.zameen.com/Homes/Lahore-1-'.$j.'.html');

	foreach($html->find('div[class=ls clr]') as $element)
	{
	    $adds[$i] = $element;
	    $i++;
	}
}
 $db = mysqli_connect('localhost', 'root', '', 'projectdb');



// deleting previous records
$delquery = "DELETE FROM zameendata";
mysqli_query($db, $delquery);

$title="";
$price="";
$description="";
$img="";

// adding new records
foreach ($adds as $add) {
       foreach ($add->find('span img') as $value){
       		$img = $value->getAttribute('src');
       		break;
       }
       foreach ($add->find('span[title]') as $value){
           $title = $value->plaintext;
           break;
       }
       foreach ($add->find('div[class=ls_p]') as $value){
           $price = $value->plaintext;
           break;
       }
       foreach ($add->find('div[class=description]') as $value){
           $description = $value->plaintext;
           break;
       }


       $insertquery = sprintf("INSERT INTO zameendata(title, price, description, imgPath) VALUES(
          '%s', '%s', '%s', '%s'
        )", mysqli_real_escape_string($db, $title),
            mysqli_real_escape_string($db, $price),
            mysqli_real_escape_string($db, $description),
        	mysqli_real_escape_string($db, $img));
       
       mysqli_query($db, $insertquery);
       
	}


	// getting all ads from db
	$selectquery = 'SELECT * FROM zameendata';
    $result = mysqli_query($db , $selectquery);


	mysqli_close($db);
}
?>

<!DOCTYPE html>
<html style="background: #deefd2">
<head>
    <title>Project</title>
</head>
<body>
<div>
<span style="float: right;margin-top: 60px;">
		<form method="post" action="">
			<input type="text" name="searchBar" style="width: 300px;font-size: 20px">
		    <input type="submit" name="submit" value="Search" style="font-size: 20px">
		</form>
	</span>

	<a href=""><img src="images/Logo.png"></a>
	<hr>
</div>

<div>
	

	<?php
		foreach ($result as $value) {
			echo "<div style='float:left;margin-bottom:20px'><img src='".$value['imgPath']."'></div><div style='margin-top:60px;margin-left:300px'><h3>".$value['title']."</h3><h4>".$value['price']."</h4><p>".$value['description']."</p></div><hr style='clear:both;height:3px;border:none;color:#333;background-color:#333'><br>";
		}
	?>
</div>

<div>
	<p style="text-align: center;">OxenLab 2018</p>
</div>
</body>
</html>
