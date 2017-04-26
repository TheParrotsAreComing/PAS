<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersAdoptionEventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersAdoptionEventsTable Test Case
 */
class UsersAdoptionEventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersAdoptionEventsTable
     */
    public $UsersAdoptionEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_adoption_events',
        'app.users',
        'app.users_events',
        'app.adoption_events',
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
        'app.cats_adoption_events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersAdoptionEvents') ? [] : ['className' => 'App\Model\Table\UsersAdoptionEventsTable'];
        $this->UsersAdoptionEvents = TableRegistry::get('UsersAdoptionEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersAdoptionEvents);

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
