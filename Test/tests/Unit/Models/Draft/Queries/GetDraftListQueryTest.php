<?php namespace Unit\Models\Draft\Queries;

include __DIR__ . '/../../../../../app/models/Draft/Queries/GetDraftList/GetDraftListQuery.php';

use testNameSpace\models\Draft\Queries\GetDraftList\GetDraftListQuery;
use PHPUnit\Framework\TestCase;

class GetDraftListQueryTest extends TestCase
{
    /** @test */
    public function testExecute()
    {
        $draftObject = new GetDraftListQuery();

        $this->assertIsObject($draftObject->Execute());
    }

    /**
     * @test
     */
    public function testGetDraftListByRound()
    {
        $draftObject = new GetDraftListQuery();
        $draftData = $draftObject->GetDraftListByRound(1);
        $this->assertIsArray($draftData);
    }

    /** @test  */
    public function testGetDraftListByDraftId()
    {
        $draftObject = new GetDraftListQuery();
        $this->assertIsArray($draftObject->GetDraftListByDraftId(1003));
    }
    /** @test */
    public function testGetDraftListQuery()
    {

    }


}
