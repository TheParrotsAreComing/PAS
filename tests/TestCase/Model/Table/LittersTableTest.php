<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LittersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LittersTable Test Case
 */
class LittersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LittersTable
     */
    public $Litters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.litters',
        'app.kc_reves',
        'app.cats',
        'app.adopters',
        'app.cat_histories',
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
        $config = TableRegistry::exists('Litters') ? [] : ['className' => 'App\Model\Table\LittersTable'];
        $this->Litters = TableRegistry::get('Litters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Litters);

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
