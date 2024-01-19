<?php

date_default_timezone_set("America/New_York");

$root = str_replace("cron/wait-times.php", "", __FILE__);
$file =	$root."cache/waittimes.xml";

$xml = simplexml_load_file(stripslashes($file));
$rowData = json_decode(json_encode($xml),true);

$json_array = [];
$output = [];

foreach ($rowData['WaitTimes'] as $key => $attributes) {
  $json_array[$key] = $attributes['@attributes']; 
}

$output["updated"] = "as of <time>" . date("g:ia") . "</time>";
$output["waittimes"] = $json_array;

echo "<br>";
echo "Successfully updated wait-times.json " . $output["updated"];

file_put_contents($root."cache/wait-times.json", json_encode($output, JSON_PRETTY_PRINT |  JSON_UNESCAPED_SLASHES));

?>