 <?php
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
 ?>