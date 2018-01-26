<?php
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
       ?>