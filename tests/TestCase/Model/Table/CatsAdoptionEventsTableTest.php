<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatsAdoptionEventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatsAdoptionEventsTable Test Case
 */
class CatsAdoptionEventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatsAdoptionEventsTable
     */
    public $CatsAdoptionEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cats_adoption_events',
        'app.cats',
        'app.litters',
        'app.breeds',
        'app.adopters',
        'app.cat_histories',
        'app.fosters',
        'app.tags',
        'app.tags_adopters',
        'app.tags_cats',
        'app.tags_fosters',
        'app.phone_numbers',
        'app.files',
        'app.cat_medical_histories',
        'app.adoption_events',
        'app.users_events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatsAdoptionEvents') ? [] : ['className' => 'App\Model\Table\CatsAdoptionEventsTable'];
        $this->CatsAdoptionEvents = TableRegistry::get('CatsAdoptionEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatsAdoptionEvents);

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
