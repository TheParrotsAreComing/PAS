<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CatMedicalHistoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CatMedicalHistoriesController Test Case
 */
class CatMedicalHistoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_medical_histories',
        'app.cats',
        'app.litters',
        'app.breeds',
        'app.adopters',
        'app.cat_histories',
        'app.fosters',
        'app.tags',
        'app.tags_fosters',
        'app.tags_adopters',
        'app.tags_cats',
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
