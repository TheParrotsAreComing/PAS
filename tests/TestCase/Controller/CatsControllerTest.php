<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CatsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CatsController Test Case
 */
class CatsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cats',
        'app.litters',
        'app.adopters',
        'app.fosters',
        'app.files',
        'app.cat_histories',
        'app.adoption_events',
        'app.cats_adoption_events',
        'app.tags',
        'app.tags_cats'
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
