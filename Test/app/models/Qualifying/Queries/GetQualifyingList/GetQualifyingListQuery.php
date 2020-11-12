<?php namespace testNameSpace\models\Qualifying\Queries\GetQualifyingList;

class GetQualifyingListQuery implements IGetQualifyingListQuery {

    function GetData()
    {
        $pickFile = __DIR__ . '/../../../../resources/jsonFiles/qualifying.json';
        $pickFileContents = file_get_contents($pickFile);
        $decodedJSONfromPickFile = json_decode($pickFileContents);
        $data = $decodedJSONfromPickFile[2]->data;
        return $data;
    } //end GetData()

    function GetQualifyingListByRaceID($raceId)
    {
        $data = $this->GetData();
        $arr = [];
        foreach ($data as $subData)
        {
            if($subData->raceId == $raceId)
            {
                array_push($arr, $subData);
            }
        } //end foreach
        return $arr;
    }
}


