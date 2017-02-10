<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FostersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FostersTable Test Case
 */
class FostersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FostersTable
     */
    public $Fosters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fosters',
        'app.cat_histories',
        'app.cats',
        'app.litters',
        'app.adopters',
        'app.tags',
        'app.tags_adopters',
        'app.files',
        'app.adoption_events',
        'app.cats_adoption_events',
        'app.tags_cats',
        'app.tags_fosters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fosters') ? [] : ['className' => 'App\Model\Table\FostersTable'];
        $this->Fosters = TableRegistry::get('Fosters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fosters);

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
