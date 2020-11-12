<?php namespace testNameSpace\models\Qualifying\Queries\GetQualifyingList;

interface IGetQualifyingListQuery
{
    function GetData();
    function GetQualifyingListByRaceID($raceId);
}
