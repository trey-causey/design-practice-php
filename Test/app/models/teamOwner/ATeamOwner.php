<?php

namespace testNameSpace\models\teamOwner;

use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Object_;

abstract class ATeamOwner
{
    function setPointsBasedOnDriver(array $array){}
    function DeterminePointsBasedOnPosition (array $array) {}
}