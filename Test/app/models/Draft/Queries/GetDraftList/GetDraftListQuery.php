<?php namespace testNameSpace\models\Draft\Queries\GetDraftList;

class GetDraftListQuery implements IGetDraftListQuery {

    function Execute()
    {
        // TODO: Implement Execute() method.
        $pickFile = __DIR__ . '/../../../../resources/jsonFiles/draftsFromSpreadsheet.json';
        $pickFileContents = file_get_contents($pickFile);
        $decodedJSONfromPickFile = json_decode($pickFileContents);
        return $decodedJSONfromPickFile;
    }

    function GetData()
    {
        $pickFile = __DIR__ . '/../../../../resources/jsonFiles/draftsFromSpreadsheet.json';
        $pickFileContents = file_get_contents($pickFile);
        $decodedJSONfromPickFile = json_decode($pickFileContents);
        $data = $decodedJSONfromPickFile->data;
        return $data;
    } //end GetData()

    function GetDraftListQuery()
    {

    }

    function GetDraftListByRound($roundNumber)
    {
        $data = $this->GetData();
        $arr = [];
        foreach ($data as $subData)
        {
            if($subData->Draft == $roundNumber) {
                array_push($arr, $subData);
            }
        } //end foreach
        return $arr;
    }

    function GetDraftListByDraftId($draftId)
    {
        $data = $this->GetData();
        $arr = [];
        foreach ($data as $subData)
        {
            if($subData->DraftId == $draftId)
            {
                array_push($arr, $subData);
            }
        } //end foreach
        return $arr;
    }
}