<?php namespace Service\Scoring;

require __DIR__ . '/../../../app/models/teamOwner/teamOwner.php';
require __DIR__ . '/../../../app/utils/raceResults.php';
require __DIR__ . '/../../../app/libs/Receiver.php';
require __DIR__ . '/../../../app/libs/Invoker.php';
require __DIR__ . '/../../../app/utils/cacheFunction.php';
require __DIR__ . '/../../../app/models/Draft/Queries/GetDraftList/GetDraftListQuery.php';
require __DIR__ . '/../../../app/models/Qualifying/Queries/GetQualifyingList/GetQualifyingListQuery.php';

use testNameSpace\libs\Invoker;
use testNameSpace\models\Qualifying\Queries\GetQualifyingList\GetQualifyingListQuery;
use testNameSpace\models\teamOwner\TeamOwner;
use testNameSpace\utils\scoring\calculatePointsCommand;
use PHPUnit\Framework\TestCase;
use testNameSpace\models\Draft\Queries\GetDraftList\GetDraftListQuery;
use function testNameSpace\setCachedRaceResults;
use function testNameSpace\setRaceResultArray;

class calculatePointsCommandTest extends TestCase
{
    /**
     * @test
     * @dataProvider setDriverArrayProvider
     * @param array $theDriverStuff
     */
    public function testScoring_WithTeamOwnerRoundOne_ReturnPoints($theDriverStuff, $expected)
    {
        $teamOwnerObject = new TeamOwner();
        $teamOwnerObject->setDriverArray($theDriverStuff);
        $completeRaceResults = json_cached_api_results();
        $raceResultArray = setRaceResultArray($completeRaceResults);
        $treyRoundOneDraftPicks = $this->getOneDraftItemProvider();
        $treyRoundOneQualifyingResults = $this->getOneQualifyingItemProvider();
        $completeArray = [$raceResultArray, $treyRoundOneDraftPicks, $treyRoundOneQualifyingResults];
        $teamOwnerObject->setPointsBasedOnDriver($completeArray);
        $this->assertEquals($expected, $teamOwnerObject->points);
    }

    /**
     * @test
     * @dataProvider setDriverArrayProvider
     * @param $theDriverStuff
     */
    public function testCommandPattern($theDriverStuff, $expected)
    {
        $testTeamOwnerObject = new TeamOwner();
        $testTeamOwnerObject->setDriverArray($theDriverStuff);
        $exampleButtonPush = new Invoker();
        $completeRaceResults = json_cached_api_results();
        $raceResultArray = setRaceResultArray($completeRaceResults);
        $treyRoundOneDraftPicks = $this->getOneDraftItemProvider();
        $treyRoundOneQualifyingResults = $this->getOneQualifyingItemProvider();
        $completeArray = [$raceResultArray, $treyRoundOneDraftPicks, $treyRoundOneQualifyingResults];
        $exampleButtonPush->setCommandOne(new calculatePointsCommand($testTeamOwnerObject, $completeArray));
        $exampleButtonPush->run();
        $this->assertEquals($expected, $testTeamOwnerObject->points);

    }

    public function getOneDraftItemProvider()
    {
        $draftQueryObject = new GetDraftListQuery();
        $DraftArr = $draftQueryObject->GetDraftListByDraftId(1003);
        return $DraftArr;
    }

    public function getOneQualifyingItemProvider()
    {
        $qualifyingQueryObject = new GetQualifyingListQuery();
        $QualArr = $qualifyingQueryObject->GetQualifyingListByRaceID(1031);
        return $QualArr;
    }
    public function setDriverArrayProvider()
    {
        return [
       [["driver1" => 5,
        "driver2" => 55,
        "turboDriver" => 26,
        "constructor" => "ferrari"],61],
        [["driver1" => 77,
            "driver2" => 10,
            "turboDriver" => 26,
            "constructor" => "mercedes"],110]
        ]
    ;
    }

}
