<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagsAdoptersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagsAdoptersTable Test Case
 */
class TagsAdoptersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagsAdoptersTable
     */
    public $TagsAdopters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tags_adopters',
        'app.tags',
        'app.adopters',
        'app.cat_histories',
        'app.cats',
        'app.litters',
        'app.breeds',
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
        $config = TableRegistry::exists('TagsAdopters') ? [] : ['className' => 'App\Model\Table\TagsAdoptersTable'];
        $this->TagsAdopters = TableRegistry::get('TagsAdopters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TagsAdopters);

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
