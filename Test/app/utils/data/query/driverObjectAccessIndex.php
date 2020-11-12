<?php

$pickFile = __DIR__ . '/../../../resources/jsonFiles/draftsFromSpreadsheet.json';
$cache_file = __DIR__ . '/../../../resources/jsonFiles/drivers.json';

$testData = file_get_contents($cache_file);
$pickFileContents = file_get_contents($pickFile);

$testOutput = json_decode($testData);
$decodedJSONfromPickFile = json_decode($pickFileContents);
$driverArray = array();
foreach (($testOutput[2]->data) as $driverObjects) {
    array_push($driverArray, $driverObjects);
}
$driverCodeMap = array("" => "No Pick");
foreach ($driverArray as $item) {
    if($item->code != NULL) {
        $driverCodeMap[$item->driverRef] = $item->code;
    }

}
$pickArray = array();

foreach ($decodedJSONfromPickFile->data as $item)
{
    array_push($pickArray, $item);
}

foreach ($pickArray as $i) {
    $owner = $i->Owner;
   $ownerDriverArray = [$i->Driver1, $i->Driver2, $i->TurboDriver ];
    foreach ($ownerDriverArray as $name) {
        $name = strtolower($name);
        echo "- DraftId: " . $i->DraftId . " - Draft: " .  $i->Draft . " - Owner: " . $i->Owner . " - Driver: " . $driverCodeMap[$name] . "\n";
    }
}

