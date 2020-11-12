<?php namespace testNameSpace;

    require __DIR__ . '/vendor/autoload.php';
    include __DIR__ . '/libs/teamOwner.php';
    //include raceResults;
    include __DIR__ . '/src/raceResults.php';
//get complete race results;
    include __DIR__ . '/utils/cacheFunction.php';
    //$completeRaceResults = setRaceResults();
$completeRaceResults = json_cached_api_results();
//get array of driverResultObjects
    $raceResultArray = setRaceResultArray($completeRaceResults);
//get draft picks for current owner and add points to current points
//create two+ teamOwner objects...initializing with test params
    $trey = new TeamOwner(5,55, 26, "ferrari" );
    $nick = new TeamOwner(44, 31,8, "mercedes");
//Find points for each...**found position for Vettel in race 1
    $trey->setPointsBasedOnDriver($raceResultArray);
    $nick->setPointsBasedOnDriver($raceResultArray);
    var_dump($trey);
    var_dump($nick);

    print "\n\n\n------------------------------------------------------------------------------------------------";
    print "\n\n\n------------------------------------------------------------------------------------------------";


