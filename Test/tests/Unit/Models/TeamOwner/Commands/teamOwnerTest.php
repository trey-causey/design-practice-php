<?php namespace Unit\Models\TeamOwner\Commands;

require __DIR__ . '/../../../../../app/models/teamOwner/teamOwner.php';

use testNameSpace\models\teamOwner\teamOwner;
use PHPUnit\Framework\TestCase;

class teamOwnerTest extends TestCase
{
    /** @test */
    public function test__construct()
    {
        $this->assertInstanceOf(teamOwner::class, new teamOwner());
    }

    public function testSetPointsBasedOnDriver()
    {

    }
    /** @test
     * @dataProvider placeProvider
     */
    public function testDeterminePointsBasedOnRaceFinishPosition($place, $expected)
    {
        $to = new teamOwner();
        $this->assertEquals($expected, $to->determinePointsBasedOnRaceFinishPosition($place));

    }

    /**
     * @test
     * @dataProvider fastestLapProvider
     */
    public function testdeterminePointsBasedOnFastestLap($position, $expected)
    {
        $to = new teamOwner();
        $this->assertEquals($expected, $to->DeterminePointsBasedOnFastestLap($position));
    }

    public function testAMock()
    {

    }

    public function driverArrayProvider()
    {

    }

    public function placeProvider()
    {
        return [
            [1, 25],
            [3, 15],
            [9, 2],
            [12, 0]
        ];
    }
    public function fastestLapProvider()
    {
        return [
            [1, 2],
            [2, 0],
            [3, 0]
        ];
    }




}
