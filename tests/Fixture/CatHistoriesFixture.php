<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatHistoriesFixture
 *
 */
class CatHistoriesFixture extends TestFixture
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
        'adopter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'foster_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'cat_ref' => ['type' => 'index', 'columns' => ['cat_id'], 'length' => []],
            'adopter_ref' => ['type' => 'index', 'columns' => ['adopter_id'], 'length' => []],
            'foster_ref' => ['type' => 'index', 'columns' => ['foster_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cat_histories_ibfk_1' => ['type' => 'foreign', 'columns' => ['cat_id'], 'references' => ['cats', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cat_histories_ibfk_2' => ['type' => 'foreign', 'columns' => ['adopter_id'], 'references' => ['adopters', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cat_histories_ibfk_3' => ['type' => 'foreign', 'columns' => ['foster_id'], 'references' => ['fosters', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'adopter_id' => 1,
            'foster_id' => 1,
            'start_date' => '2017-03-02',
            'end_date' => '2017-03-02'
        ],
    ];
}
