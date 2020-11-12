<?php namespace testScoring;

include __DIR__ . '/../../app/libs/Receiver.php';
include __DIR__ . '/../../app/libs/Invoker.php';
include __DIR__ . '/../../app/models/teamOwner/teamOwner.php';
include __DIR__ . '/../../app/utils/raceResults.php';
include __DIR__ . '/../../app/utils/scoring/calculatePointsCommand.php';

use PHPUnit\Framework\TestCase;
use testNameSpace\models\teamOwner\teamOwner;
use testNameSpace\libs\Invoker;
use testNameSpace\libs\Receiver;

use function testNameSpace\setCachedRaceResults;
use function testNameSpace\setRaceResultArray;

class calculatePointsCommandTest extends TestCase
{
    /**
    * @test
    * @dataProvider populateItem()
     *
     */
    function testAnything()
    {
        //setup an invoker...like a buttonPush
        $exampleButtonPush = new Invoker();
        $t = $this->populateItem();
        var_dump($t);

    }

    public function populateItem()
    {
        $jsonObject = '{"DraftId":1001,"Draft":1,"Round":1,"Race":"Austria 1","Pick":5,"Date":"5-Jul","Owner":"Nick","Driver1":"Max_Verstappen","Driver2":"Ocon","TurboDriver":"Grosjean","Constructor":"Red Bull"}';
        $params = json_decode($jsonObject);
        return $params;
    }
}
