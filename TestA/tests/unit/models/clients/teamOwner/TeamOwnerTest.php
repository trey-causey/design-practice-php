<?php

namespace unit\models\Clients\teamOwner;

include __DIR__ . '/../../../../../../TestA/src/models/teamOwner/TeamOwner.php';

use Models\TeamOwner\TeamOwner;
use PHPUnit\Framework\TestCase;

class TeamOwnerTest extends TestCase
{
    /** @test */
    public function testConstruct()
    {
        $this->assertInstanceOf(TeamOwner::class, new TeamOwner());
    }

    /** @test */
    public function testGetFirstName()
    {
        $name1 = $this->createMock(TeamOwner::class);
        $name1->method('GetFirstName')
            ->willReturn('Andrew');

        $this->assertSame('Andrew', $name1->GetFirstName());
    }
}
