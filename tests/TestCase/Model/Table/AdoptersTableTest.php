<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdoptersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdoptersTable Test Case
 */
class AdoptersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdoptersTable
     */
    public $Adopters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adopters',
        'app.cat_histories',
        'app.cats',
        'app.litters',
        'app.fosters',
        'app.files',
        'app.adoption_events',
        'app.cats_adoption_events',
        'app.tags',
        'app.tags_cats',
        'app.tags_adopters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Adopters') ? [] : ['className' => 'App\Model\Table\AdoptersTable'];
        $this->Adopters = TableRegistry::get('Adopters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adopters);

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
