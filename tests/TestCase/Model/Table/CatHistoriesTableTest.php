<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatHistoriesTable Test Case
 */
class CatHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatHistoriesTable
     */
    public $CatHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_histories',
        'app.cats',
        'app.litters',
        'app.adopters',
        'app.tags',
        'app.tags_adopters',
        'app.fosters',
        'app.tags_fosters',
        'app.files',
        'app.adoption_events',
        'app.cats_adoption_events',
        'app.tags_cats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatHistories') ? [] : ['className' => 'App\Model\Table\CatHistoriesTable'];
        $this->CatHistories = TableRegistry::get('CatHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatHistories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
