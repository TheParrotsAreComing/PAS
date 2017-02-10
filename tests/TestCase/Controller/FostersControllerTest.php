<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FostersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FostersController Test Case
 */
class FostersControllerTest extends IntegrationTestCase
{

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
        'app.tags_cats',
        'app.tags_fosters',
        'app.files',
        'app.adoption_events',
        'app.cats_adoption_events'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
