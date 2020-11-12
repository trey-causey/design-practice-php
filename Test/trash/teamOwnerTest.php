<?php
namespace testNameSpace;
require __DIR__ . '/../../app/utils/raceResults.php';
require __DIR__ . '/../../app/models/teamOwner/teamOwner.php';

use PHPUnit\Framework\TestCase;
use testNameSpace\models\teamOwner\teamOwner;

class teamOwnerTest extends TestCase
{

    public function testSetPointsBasedOnDriver()
    {
        $completeRaceResults = setCachedRaceResults();
        $raceResultArray = setRaceResultArray($completeRaceResults);
        $testTeamOwnerObject = new teamOwner(5,55, 26, "ferrari" );
        $testTeamOwnerObject->setPointsBasedOnDriver($raceResultArray);

        $this->assertEquals(11, $testTeamOwnerObject->points);

    }
}
