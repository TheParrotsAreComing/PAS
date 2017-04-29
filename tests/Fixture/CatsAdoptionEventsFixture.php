<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatsAdoptionEventsFixture
 *
 */
class CatsAdoptionEventsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cat_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'adoption_event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'cat_ref' => ['type' => 'index', 'columns' => ['cat_id'], 'length' => []],
            'event_ref' => ['type' => 'index', 'columns' => ['adoption_event_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cats_adoption_events_ibfk_1' => ['type' => 'foreign', 'columns' => ['cat_id'], 'references' => ['cats', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cats_adoption_events_ibfk_2' => ['type' => 'foreign', 'columns' => ['adoption_event_id'], 'references' => ['adoption_events', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'cat_id' => 1,
            'adoption_event_id' => 1
        ],
    ];
}
