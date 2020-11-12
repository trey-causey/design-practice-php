<?php
namespace testNameSpace\models\teamOwner;
//require_once __DIR__ . '/../../../app/utils/scoring/calculatePointsCommand.php';
require __DIR__ . '/ATeamOwner.php';

use testNameSpace\utils\scoring\Command;

class teamOwner extends ATeamOwner
    {
        public $points = 0;
        public $driver1, $driver2, $turboDriver;
        public $constructor;
        private $commandObject;

    function setPointsBasedOnDriver($completeArray) : void
    {
        //set points for each driver1, driver2, and turbodriver
        foreach ($completeArray[0] as $num) {
            if (($num->number == $this->driver1)
                || ($num->number == $this->driver2)) {
                $this->points += $this->determinePointsBasedOnRaceFinishPosition($num->position);
                $this->points += $this->determinePointsBasedOnGridPositionChange($num);
                $this->points += $this->DeterminePointsBasedOnFastestLap($num->FastestLap->rank);
            } elseif ($num->number == $this->turboDriver) {
                $this->points += ($this->determinePointsBasedOnRaceFinishPosition($num->position)*2);
                $this->points += ($this->determinePointsBasedOnGridPositionChange($num)*2);
                $this->points += ($this->DeterminePointsBasedOnFastestLap($num->FastestLap->rank)*2);
            }

            if($num->Constructor->constructorId == $this->constructor) {
                $this->points += $this->determinePointsBasedOnRaceFinishPosition($num->position);
            }
        }
        foreach ($completeArray[2] as $num) {
            if (($num->number == $this->driver1)
                || ($num->number == $this->driver2)) {
                $this->points += $this->determinePointsBasedOnQualifyingRound($num);
                $this->points += $this->determinePointsBasedOnQualifyingFinishPosition($num->position);
            } elseif ($num->number == $this->turboDriver) {
                $this->points += ($this->determinePointsBasedOnQualifyingRound($num)*2);
                $this->points += ($this->determinePointsBasedOnQualifyingFinishPosition($num->position)*2);
            }
        }

    }

    function DeterminePointsBasedOnFastestLap($rank)
    {
        $ans = 0;
        if($rank == 1) {
            $ans += 2;
        }
        return $ans;
    }

    function determinePointsBasedOnGridPositionChange($num)
    {
        $raceStartPosition = intval($num->grid);
        $raceFinishPosition = intval($num->position);
        return $raceStartPosition-$raceFinishPosition;
    }
    function determinePointsBasedOnQualifyingRound($num)
    {
        $bucketPoints = 0;
        if($num->q3 != null)
        {
            $bucketPoints += 10;
        } elseif ($num->q2 != null)
        {
            $bucketPoints += 5;
        }
        return $bucketPoints;
    }

    function determinePointsBasedOnQualifyingFinishPosition($num)
    {
        $val = intval($num);
        $driverPositionPointsValue = [
            1 => 10,
            2 => 8,
            3 => 6,
            4 => 4,
            5 => 2,
            6 => 1,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
            13 => 0,
            14 => 0,
            15 => 0,
            16 => 0,
            17 => 0,
            18 => 0,
            19 => 0,
            20 => 0,
            21 => 0,
            22 => 0
            ];
        return $driverPositionPointsValue[$val];
    }
    function determinePointsBasedOnRaceFinishPosition ($num) : int {
            $val = intval($num);
            $driverPositionPointsValue = [
                1 => 25,
                2 => 18,
                3 => 15,
                4 => 12,
                5 => 10,
                6 => 8,
                7 => 6,
                8 => 4,
                9 => 2,
                10 => 1,
                11 => 0,
                12 => 0,
                13 => 0,
                14 => 0,
                15 => 0,
                16 => 0,
                17 => 0,
                18 => 0,
                19 => 0,
                20 => 0,
                21 => 0,
                22 => 0
            ];
            return $driverPositionPointsValue[$val];

    }

    function setDriverArray($arrayObject) {
        $this->driver1 = $arrayObject['driver1'];
        $this->driver2 = $arrayObject['driver2'];
        $this->turboDriver = $arrayObject['turboDriver'];
        $this->constructor = $arrayObject['constructor'];
    }

}


