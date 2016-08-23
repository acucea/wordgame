<?php

function httpGetTitle($url)
{

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false);

    $output = curl_exec($ch);
    $counter = 0;
    curl_close($ch);

	for($i  = strpos($output,"<b>"); $i < strpos($output,"</b>"); ++$i){
			++$counter;

			if($output[$i] == ','){
				$output[$i] = ' ';
			}

			if($counter > 25 && $output[$i] == ' ')
				echo "\n";

			echo $output[$i];
		}

}

function httpGetContent($url){


	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

	$output = curl_exec($ch);

	for($i  = strpos($output,"</abbr>"); $i < strpos($output,"&#x2666;"); ++$i)
			echo $output[$i];

}

echo httpGetTitle("https://dexonline.ro/cuvantul-zilei/".date("Y/m/d"));
echo httpGetContent3("https://dexonline.ro/cuvantul-zilei/".date("Y/m/d"));

?>
