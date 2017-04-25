<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdoptionEventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdoptionEventsTable Test Case
 */
class AdoptionEventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdoptionEventsTable
     */
    public $AdoptionEvents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adoption_events',
        'app.users_events',
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
        $config = TableRegistry::exists('AdoptionEvents') ? [] : ['className' => 'App\Model\Table\AdoptionEventsTable'];
        $this->AdoptionEvents = TableRegistry::get('AdoptionEvents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdoptionEvents);

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
}
