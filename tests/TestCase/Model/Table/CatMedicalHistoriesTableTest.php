<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatMedicalHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatMedicalHistoriesTable Test Case
 */
class CatMedicalHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatMedicalHistoriesTable
     */
    public $CatMedicalHistories;

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
        $config = TableRegistry::exists('CatMedicalHistories') ? [] : ['className' => 'App\Model\Table\CatMedicalHistoriesTable'];
        $this->CatMedicalHistories = TableRegistry::get('CatMedicalHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatMedicalHistories);

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
