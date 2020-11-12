<?php namespace testNameSpace\models\Draft\Queries\GetDraftList;

interface IGetDraftListQuery {

    function Execute();
    function GetDraftListByRound($roundNumber);
}
