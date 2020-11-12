<?php
namespace testNameSpace;

use GuzzleHttp\Client;

    function setRaceResults(): object {
        $client = new Client(['base_uri' => 'https://ergast.com/api/f1/']);
        $year = '2020';
        $round = '1';
        $endingURL = 'results.json';
        $queryString = $year . '/' . $round . '/' . $endingURL;
        $response = $client->get($queryString);
        $body = $response->getBody();
        $content = $body->getContents();
        return $decodedJSON = json_decode($content);
    }

    function setCachedRaceResults(): object {
        $client = new Client(['base_uri' => 'https://ergast.com/api/f1/']);
        $year = '2020';
        $round = '1';
        $endingURL = 'results.json';
        $queryString = $year . '/' . $round . '/' . $endingURL;
        $response = $client->get($queryString);
        $body = $response->getBody();
        $content = $body->getContents();
        return $decodedJSON = json_decode($content);
    }

    function setRaceResultArray($entireRaceResultObject): array {
        $raceResultArray = array();
        foreach (($entireRaceResultObject->MRData->RaceTable->Races[0]->Results) as $raceObject)
        {
            array_push($raceResultArray, $raceObject);
        }
        return $raceResultArray;

    }

    function createSubObjectsFromRaceObject() : array {

    }


