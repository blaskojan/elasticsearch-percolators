<?php
$data = file_get_contents($argv[1]);
if ($data === false) {
	echo 'Unable to load file ' . $argv[1];
	exit(0);
}
$data = json_decode($data, true);
$finalData = '';
$counter = 1;
foreach ($data as $item) {
	$finalData .= '{"index":{"_id":"' . $counter++ . '"}}' . PHP_EOL;	
	$finalData .= json_encode($item) . PHP_EOL;
}
$outputFileName = 'output_es_bulk.json'; 
file_put_contents($outputFileName, $finalData);
echo 'Bulk data has been saved to '. $outputFileName . PHP_EOL; 
